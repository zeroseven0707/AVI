<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class SubCategoriesController extends Controller
{
     // Tampilkan daftar kategori
     public function index()
     {
         $subcategories = SubCategories::all();
         return view('subcategories.index', compact('subcategories'));
     }
 
     // Form untuk menambah kategori baru
     public function create()
     {
        $data['category'] = Category::all();
         return view('subcategories.create',$data);
     }
 
     // Simpan kategori baru ke database
     public function store(Request $request)
     {
         $request->validate([
             'category_id' => 'required',
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);
 
         SubCategories::create($request->only('category_id', 'name', 'description'));
 
         return redirect()->route('subcategories.index')->with('success', 'Category created successfully.');
     }
 
     // Form untuk edit kategori
     public function edit(SubCategories $subcategories)
     {
        $category = Category::all();
         return view('subcategories.edit', compact(['subcategories','category']));
     }
 
     // Update kategori
     public function update(Request $request, SubCategories $subcategories)
     {
         $request->validate([
             'category_id' => 'required',
             'name' => 'required|string|max:255',
             'description' => 'nullable|string',
         ]);
 
         $subcategories->update($request->only('category_id', 'name', 'description'));
 
         return redirect()->route('subcategories.index')->with('success', 'Category updated successfully.');
     }
 
     // Hapus kategori
     public function destroy(SubCategories $subcategories)
     {
         $subcategories->delete();
         return redirect()->route('subcategories.index')->with('success', 'Category deleted successfully.');
     }
     public function getSubCategories($category_id)
     {
         $subcategories = SubCategories::where('category_id', $category_id)->get();
         return response()->json($subcategories);
     }

}
