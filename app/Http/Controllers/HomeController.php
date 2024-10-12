<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Data lokasi yang ingin diambil cuacanya (Jakarta)
        $latitude = -6.2088;
        $longitude = 106.8456;
    
        // Memanggil API Open-Meteo
        $response = Http::get("https://api.open-meteo.com/v1/forecast", [
            'latitude' => $latitude,
            'longitude' => $longitude,
            'current_weather' => true,
        ]);
    
        // Mengecek apakah request berhasil
        if ($response->successful()) {
            $weatherData = $response->json();
            $temperature = $weatherData['current_weather']['temperature']; // Suhu
            $weatherCondition = $weatherData['current_weather']['weathercode']; // Kode kondisi cuaca
        } else {
            $temperature = 'N/A'; // Default jika gagal mengambil data
            $weatherCondition = 'N/A';
        }
    
        // Mengambil data real dari database berdasarkan model yang kamu miliki
        
        // Nilai total transaksi
        $transactionValue = Transaction::sum('amount'); 
    
        // Jumlah transaksi
        $transactions = Transaction::count(); 
    
        // Jumlah pengguna aktif
        $users = User::count(); 
    
        // Total kategori produk
        $categories = Category::count(); 
    
        // Data penjualan atau donasi per bulan (misalnya berdasarkan transaksi per bulan untuk 5 bulan terakhir)
        $salesData = [
            'labels' => ['January', 'February', 'March', 'April', 'May'],
            'data' => [
                Transaction::whereMonth('created_at', '01')->sum('amount'),
                Transaction::whereMonth('created_at', '02')->sum('amount'),
                Transaction::whereMonth('created_at', '03')->sum('amount'),
                Transaction::whereMonth('created_at', '04')->sum('amount'),
                Transaction::whereMonth('created_at', '05')->sum('amount')
            ]
        ];
    
        // Data donasi hari ini
        $todaysDonations = Donation::whereDate('created_at', now())->sum('amount');
    
        // Total donasi
        $totalDonations = Donation::sum('amount');
        
        // Kampanye aktif (ongoing campaigns)
        $activeCampaigns = Campaign::where('status', 'ongoing')->count();
        
        // Total kampanye
        $totalCampaigns = Campaign::count();
        // List Donation
        $donations = Donation::take(10)->get();
    
        // Mengirim semua data ke view
        return view('home', compact(
            'temperature', 
            'weatherCondition', 
            'todaysDonations', 
            'totalDonations', 
            'activeCampaigns', 
            'totalCampaigns',
            'transactionValue',
            'transactions',
            'users',
            'categories',
            'donations',
            'salesData'
        ));
    }
    
}
