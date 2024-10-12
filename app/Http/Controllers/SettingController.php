<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
// Tampilkan halaman setting
public function index()
{
    // Mengambil pengaturan pertama, atau membuat data baru jika tidak ada
    $setting = Setting::first() ?? new Setting();
    return view('settings.index', compact('setting'));
}

// Buat atau update setting
public function storeOrUpdate(Request $request)
{
    $request->validate([
        'favicon' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'email' => 'nullable|email',
        'no_telp' => 'nullable|string|max:20',
        'address' => 'nullable|string',
        'copyright' => 'nullable|string',
        'social_medias.*.logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
        'social_medias.*.name' => 'nullable|string',
        'social_medias.*.link' => 'nullable|url',
    ]);

    // Ambil setting yang pertama atau buat yang baru jika tidak ada
    $setting = Setting::first() ?? new Setting();

    // Handle favicon upload
    if ($request->hasFile('favicon')) {
        if ($setting->favicon) {
            Storage::disk('public')->delete($setting->favicon);
        }
        $faviconPath = $request->file('favicon')->store('settings', 'public');
    } else {
        $faviconPath = $setting->favicon;
    }

    // Handle logo upload
    if ($request->hasFile('logo')) {
        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }
        $logoPath = $request->file('logo')->store('settings', 'public');
    } else {
        $logoPath = $setting->logo;
    }

    // Isi data setting
    $setting->favicon = $faviconPath;
    $setting->logo = $logoPath;
    $setting->title = $request->title;
    $setting->meta_description = $request->meta_description;
    $setting->email = $request->email;
    $setting->no_telp = $request->no_telp;
    $setting->address = $request->address;
    $setting->copyright = $request->copyright;
    $setting->social_medias = json_encode($request->social_medias);

    // Simpan ke database (create or update)
    $setting->save();

    return redirect()->route('settings.index')->with('success', 'Settings saved successfully.');
}
}
