<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
     // Menampilkan daftar berita
     public function index()
     {
         $news = News::all();
         return view('news.index', compact('news'));
     }
 
     // Form untuk menambah berita baru
     public function create()
     {
         return view('news.create');
     }
 
     // Simpan berita baru ke database
     public function store(Request $request)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required',
             'images' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'date' => 'required|date',
         ]);
 
         // Menyimpan gambar ke direktori storage/app/public/images
         $imagePath = $request->file('images')->store('images', 'public');
 
         News::create([
             'title' => $request->title,
             'description' => $request->description,
             'images' => $imagePath, // Menyimpan path gambar
             'date' => $request->date,
         ]);
 
         return redirect()->route('news.index')->with('success', 'News created successfully.');
     }
 
     // Form edit berita
     public function edit(News $news)
     {
         return view('news.edit', compact('news'));
     }
 
     // Update berita di database
     public function update(Request $request, News $news)
     {
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required',
             'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'date' => 'required|date',
         ]);
 
         // Update gambar jika ada gambar baru
         if ($request->hasFile('images')) {
             // Hapus gambar lama
             if ($news->images) {
                 Storage::disk('public')->delete($news->images);
             }
 
             // Upload gambar baru
             $imagePath = $request->file('images')->store('images', 'public');
         } else {
             $imagePath = $news->images;
         }
 
         $news->update([
             'title' => $request->title,
             'description' => $request->description,
             'images' => $imagePath,
             'date' => $request->date,
         ]);
 
         return redirect()->route('news.index')->with('success', 'News updated successfully.');
     }
 
     // Hapus berita
     public function destroy(News $news)
     {
         if ($news->images) {
             Storage::disk('public')->delete($news->images);
         }
         
         $news->delete();
         return redirect()->route('news.index')->with('success', 'News deleted successfully.');
     }
}
