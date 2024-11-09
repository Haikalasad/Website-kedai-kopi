<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Transaction;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Exception;

class CheckoutController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Buat Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');
    }

    public function checkout(Request $request)
    {
        Log::info('Checkout started', $request->all());

        $request->validate([
            'selected_items' => 'required|array',
            'total_amount' => 'required|numeric',
        ]);

        Log::info('Validation passed');
    
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $request->total_amount,
            'status' => 'pending',
        ]);
    
        Log::info('Order created', ['order_id' => $order->id]);
   
        $cart = Cart::where('user_id', Auth::id())->first();
        if (!$cart) {
            return response()->json(['error' => 'Cart tidak ditemukan.'], 404);
        }
    
        $items = $cart->items()
            ->whereIn('id', $request->selected_items)
            ->with('coffee')
            ->get();
    
        if ($items->isEmpty()) {
            return response()->json(['error' => 'Tidak ada item yang ditemukan.'], 404);
        }
    
        $transactionDetails = [
            'order_id' => $order->id,
            'gross_amount' => $order->total_amount,
        ];

        Log::info('Transaction Details:', $transactionDetails);
    
        $customerDetails = [
            'first_name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];
    
        $itemDetails = $items->map(function ($item) {
            return [
                'id' => $item->coffee->id, 
                'price' => $item->coffee->price, 
                'quantity' => $item->quantity,
                'name' => $item->coffee->name,
            ];
        })->toArray();
        
    
        Log::info('Item Details:', $itemDetails);
        if (empty($itemDetails)) {
            return response()->json(['error' => 'Tidak ada item yang dipilih.'], 422);
        }
    
        $params = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details'=> $itemDetails
        ];

        Log::info('Params sent to Snap:', $params);

        
        // Snap Token
        $snapToken = Snap::getSnapToken($params);
        Log::info('Snap Token:', ['snapToken' => $snapToken]);
        
        Transaction::create([
            'order_id' => $order->id,
            'amount' => $order->total_amount,
            'payment_method' => null,
            'status' => 'pending',
            'payment_details' => null,
            'snap_token' => $snapToken,
        ]);

        foreach ($items as $item) {
            DB::table('order_items')->insert([
                'order_id' => $order->id,
                'coffee_id' => $item->coffee->id,
                'quantity' => $item->quantity,
                'price' => $item->coffee->price,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        return response()->json(['snapToken' => $snapToken]);
        
    }


    public function callback(Request $request)
    {

        $paymentResponse = $request->all();

        Log::info('Midtrans Callback:', $paymentResponse);

    
        $orderId = $paymentResponse['order_id'];
        $transactionStatus = $paymentResponse['transaction_status'];
        $paymentMethod = $paymentResponse['payment_type']; 
        $paymentDetails = json_encode($paymentResponse); 


        $transaction = Transaction::where('snap_token', $paymentResponse['transaction_id'])
                                   ->where('order_id', $orderId)
                                   ->first();

        if ($transaction) {
            $transaction->update([
                'payment_method' => $paymentMethod,
                'payment_details' => $paymentDetails,
                'status' => $transactionStatus,
            ]);

            Log::info('Transaction updated', ['transaction_id' => $transaction->id, 'payment_method' => $paymentMethod]);
        } else {
            Log::error('Transaction not found for callback', ['order_id' => $orderId]);
            return response()->json(['error' => 'Transaction not found'], 404);
        }

     


        // Return response
        return response()->json(['status' => 'success']);
    }
    
}
