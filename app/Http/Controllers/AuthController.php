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
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
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


    public function register_index()
    {
        return view('admin.register');
    }
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        $profilePicturePath = null;
    
        $profilePictureDirectory = storage_path('app/public/profile_pictures');
        if (!file_exists($profilePictureDirectory)) {
            mkdir($profilePictureDirectory, 0755, true);
        }
    
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'profile_picture' => $profilePicturePath,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registrasi berhasil!');
    }
    
    
    
}
