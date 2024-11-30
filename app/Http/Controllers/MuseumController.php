<?php

namespace App\Http\Controllers;

use App\Models\Museum;
use App\Models\Category;
use Illuminate\Http\Request;

class MuseumController extends Controller
{
    public function index()
    {
        $museums = Museum::all();
        return view('museums.index', compact('museums'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('museums.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Museum::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'category_id' => $request->category_id,
            'image' => isset($imagePath) ? $imagePath : null,
        ]);

        return redirect()->route('museums.index')->with('success', 'Museum created successfully.');
    }

    // Menambahkan method untuk menampilkan form Edit
    public function edit($id)
    {
        $museum = Museum::findOrFail($id);
        $categories = Category::all();
        return view('museums.edit', compact('museum', 'categories'));
    }

    // Menambahkan method untuk Update data museum
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $museum = Museum::findOrFail($id);

        // Proses update jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($museum->image) {
                \Storage::delete('public/' . $museum->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $museum->image = $imagePath;
        }

        // Update data museum
        $museum->update([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('museums.index')->with('success', 'Museum updated successfully.');
    }

    // Menambahkan method untuk menghapus museum
    public function destroy($id)
    {
        $museum = Museum::findOrFail($id);

        // Menghapus gambar jika ada
        if ($museum->image) {
            \Storage::delete('public/' . $museum->image);
        }

        // Menghapus museum
        $museum->delete();

        return redirect()->route('museums.index')->with('success', 'Museum deleted successfully.');
    }
}
