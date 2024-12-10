<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();

        return view('blog', compact('blogs'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blog::where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->get();

        return response()->json($blogs);
    }


    public function indexAdmin()
    {
        $blogs = Blog::all();
        return view('admin.blog-admin', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog-add-admin');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image_url' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $request->file('image_url')->store('blogs', 'public');

        Blog::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog-edit-admin', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if ($request->hasFile('image_url')) {

            if (!Storage::disk('public')->exists('blog_images')) {
                Storage::disk('public')->makeDirectory('blog_images');
            }

            if ($blog->image_url) {
                Storage::disk('public')->delete($blog->image_url);
            }

            $validatedData['image_url'] = $request->file('image_url')->store('blog_images', 'public');
        }

        $blog->update($validatedData);

        return redirect()->route('admin.blog.index')->with('success', 'Blog updated successfully!');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Blog deleted successfully.');
    }
}
