<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     // Tampilkan daftar kategori
     public function index()
     {
         $categories = Category::all();
         return view('categories.index', compact('categories'));
     }
 
     // Form untuk menambah kategori baru
     public function create()
     {
         return view('categories.create');
     }
 
     // Simpan kategori baru ke database
     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);
 
         Category::create($request->only('name', 'description'));
 
         return redirect()->route('categories.index')->with('success', 'Category created successfully.');
     }
 
     // Form untuk edit kategori
     public function edit(Category $category)
     {
         return view('categories.edit', compact('category'));
     }
 
     // Update kategori
     public function update(Request $request, Category $category)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);
 
         $category->update($request->only('name', 'description'));
 
         return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
     }
 
     // Hapus kategori
     public function destroy(Category $category)
     {
         $category->delete();
         return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
     }
}
