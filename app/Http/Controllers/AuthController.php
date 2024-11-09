<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = User::where('name', $request->name)->first();
    
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
    
            if ($user->role === 'admin') {
                Alert::success('Berhasil!', 'Login berhasil! Anda masuk sebagai admin.');
                return redirect()->intended(route('admin.coffee.index'));
            } else {
                Alert::success('Berhasil!', 'Login berhasil! Selamat datang.');
                return redirect()->intended(route('home'));
            }
        }else{
            Alert::error('Login Gagal', 'Pastikan nama dan password sudah sesuai');
        }
    
        return back()->with('error_message', 'Nama atau password salah.');
    }
}
