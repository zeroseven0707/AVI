<?php

use App\Models\Category;
use App\Models\Setting;

if (!function_exists('getAllCategories')) {
    /**
     * Get all categories from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function getAllCategories()
    {
        // Mengambil semua kategori dari database
        return Category::all();
    }
}

if (!function_exists('settings')) {
    /**
     * Get settings from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    function settings()
    {
        // Mengambil semua kategori dari database
        return Setting::first();
    }
}
