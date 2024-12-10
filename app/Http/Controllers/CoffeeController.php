<?php

namespace App\Http\Controllers;

use App\Models\Coffee;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class CoffeeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::all(); 
        return view('coffee', compact('coffees'));
    }

    public function admin_index()
    {
        $coffees = Coffee::all();
        return view('admin.index', compact('coffees'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $coffees = Coffee::where('name', 'like', "%{$search}%")
            ->get();

        return response()->json($coffees);
    }


    public function create_index()
    {
        return view('admin.coffee_create');
    }

    public function create(Request $request)
    {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

    
        $coffee = new Coffee;
        $coffee->name = $request->name;
        $coffee->price = $request->price;
        $coffee->description = $request->description;

      
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('images', 'public');
            $coffee->image_url = Storage::url($path);
        }

        $coffee->save();

        Alert::success('Berhasil!', 'Data kopi berhasil ditambahkan.');

        return redirect()->route('admin.coffee.index');
    }

    public function edit($id)
    {
        $coffee = Coffee::findOrFail($id);
        return view('admin.coffee-edit-admin', compact('coffee'));
    }

    public function update(Request $request, $id)
    {
        $coffee = Coffee::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'price' => 'required|numeric',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            // Hapus gambar lama jika ada
            if ($coffee->image_url) {
                Storage::delete('public/' . $coffee->image_url);
            }

            $validatedData['image_url'] = $request->file('image_url')->store('coffee_images', 'public');
        }

        $coffee->update($validatedData);

        return redirect()->route('admin.coffee.index')->with('success', 'Coffee updated successfully!');
    }


    public function destroy($id)
    {
        $coffee = Coffee::findOrFail($id);
        $coffee->delete();
        Alert::success('Berhasil!', 'Data kopi berhasil dihapus.');
        return redirect()->route('admin.coffee.index')->with('success', 'Coffee deleted successfully');
    }
}
