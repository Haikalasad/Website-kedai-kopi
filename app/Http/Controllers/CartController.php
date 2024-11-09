<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->first();
        $cartItems = $cart ? $cart->items()->with('coffee')->get() : collect();

       
        $cartItems = $cartItems->map(function ($item) {
            $itemTotal = $item->coffee->price * $item->quantity; 
            $item->itemTotal = $itemTotal; 
            return $item;
        });

        // Menghitung total keseluruhan
        $totalOverall = $cartItems->sum('itemTotal');

        return view('cart', compact('cartItems', 'totalOverall'));
    }

    public function addToCart(Request $request, $coffeeId)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);


        $cartItem = CartItem::where('cart_id', $cart->id)->where('coffee_id', $coffeeId)->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {

            $cartItem = new CartItem();
            $cartItem->cart_id = $cart->id;
            $cartItem->coffee_id = $coffeeId;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Item berhasil ditambahkan ke keranjang!');
    }


    public function updateQuantity(Request $request, $id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => true]);
    }

    public function remove($id)
    {
        $itemRemoved = CartItem::destroy($id);

        Log::info("Attempting to remove item with ID: $itemRemoved");
    
        if ($itemRemoved) {
            return response()->json(['status' => 'success']);
        }
    
        return response()->json(['status' => 'error'], 400);
    }
    

    // Checkout
    public function checkout(Request $request)
    {

        return redirect()->route('home')->with('success', 'Checkout berhasil!');
    }


    public function increaseQuantity($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->quantity += 1;
        $cartItem->save();

        $itemTotal = $cartItem->coffee->price * $cartItem->quantity;

        return response()->json([
            'status' => 'success',
            'newQuantity' => $cartItem->quantity,
            'itemTotal' => $itemTotal,
        ]);
    }


    public function decreaseQuantity($id)
    {
        $cartItem = CartItem::findOrFail($id);
        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();

            $itemTotal = $cartItem->coffee->price * $cartItem->quantity;
        }

        return response()->json([
            'status' => 'success',
            'newQuantity' => $cartItem->quantity,
            'itemTotal' => $itemTotal,
        ]);
    }


    
}
