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
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Museum::create($request->all());

        return redirect()->route('museums.index')->with('success', 'Museum created successfully.');
    }
}
