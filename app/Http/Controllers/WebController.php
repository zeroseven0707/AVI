<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\News;
use App\Models\SubCategories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Snap;

class WebController extends Controller
{
    public function index()
    {
        $data['articles'] = News::take(4)->get();
        $data['programs'] = Campaign::where('status','active')->take(2)->get();
        return view('web.index',$data);
    }
    public function tentang()
    {
        return view('web.tentang-kami');
    }
    public function berita(Request $request)
    {
        if ($request->search) {
            $data['news'] = News::where('title', 'like', '%' . $request->search . '%')->get();
            $data['last_news'] = News::where('title', 'like', '%' . $request->search . '%')
                ->orderBy('created_at', 'desc')
                ->get();
        }else{
            $data['last_news'] = News::take(6)->orderBy('created_at', 'desc')->get();
            $data['news'] = News::take(4)->get();
        }
        return view('web.berita',$data);
    }
    public function kontak()
    {
        return view('web.kontak');
    }
    public function program($id)
    {
        $data['programs'] = SubCategories::where('category_id',$id)->with('campaigns')->get();
        return view('web.program',$data);
    }
    public function detail_program($id)
    {
        $data['program'] = Campaign::find($id);
        $data['donations'] = Donation::where('campaign_id',$id)->get();
        return view('web.detail-program',$data);
    }
    public function detail_berita($id)
    {
        $data['news'] = News::find($id);
        return view('web.detail-berita',$data);
    }
    public function pembayaran(Request $request, $id)
    {
        session()->put('price',$request->price);
        session()->put('campaign_id',$id);
        return view('web.pembayaran');
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'address' => 'required|string',
        ]);
        
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        // Simpan data donasi ke database
        $donation = Donation::create([
            'campaign_id'=>session()->get('campaign_id'),
            'midtrans_order_id' => Str::random(12),
            'donation_date' => Carbon::now(),
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'address' => $request->address,
            'amount' => session()->get('price')
        ]);

        // Data untuk dikirim ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => 'DON-' . $donation->midtrans_order_id,
                'gross_amount' => $donation->amount,
            ],
            'customer_details' => [
                'first_name' => $donation->name,
                'email' => $donation->email,
                'phone' => $donation->no_telp,
                'address' => $donation->address,
            ],
        ];

        // Buat transaksi Snap dan dapatkan token
        $snapToken = Snap::getSnapToken($params);

        // Simpan order_id Midtrans di database
        $donation->update(['midtrans_order_id' => $params['transaction_details']['order_id']]);

        // Kembalikan token Snap ke view
        return response()->json(['snap_token' => $snapToken]);
    }
}
