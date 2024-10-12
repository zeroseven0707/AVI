<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Midtrans\Notification;
class CallbackMidtransController extends Controller
{
    public function handleMidtransCallback(Request $request)
{
    // Tangkap notifikasi dari Midtrans
    $notification = new Notification();

    // Ambil tipe pembayaran dan status transaksi
    $transactionStatus = $notification->transaction_status;
    $paymentType = $notification->payment_type;
    $orderId = $notification->order_id;
    $fraudStatus = $notification->fraud_status;

    // Log data callback untuk debugging
    Log::info('Midtrans Callback:', [
        'order_id' => $orderId,
        'transaction_status' => $transactionStatus,
        'payment_type' => $paymentType,
        'fraud_status' => $fraudStatus
    ]);

    // Cari donasi berdasarkan order_id dari callback
    $donation = Donation::where('midtrans_order_id', $orderId)->first();

    if (!$donation) {
        return response()->json(['error' => 'Donation not found'], 404);
    }

    // Update status berdasarkan status transaksi dari Midtrans
    if ($transactionStatus == 'capture') {
        if ($paymentType == 'credit_card') {
            if ($fraudStatus == 'accept') {
                $donation->status = 'success'; // Transaksi berhasil
            } else {
                $donation->status = 'failed'; // Transaksi gagal (fraud)
            }
        }
    } elseif ($transactionStatus == 'settlement') {
        $donation->status = 'success'; // Transaksi berhasil
    } elseif ($transactionStatus == 'pending') {
        $donation->status = 'pending'; // Transaksi menunggu pembayaran
    } elseif ($transactionStatus == 'deny') {
        $donation->status = 'failed'; // Transaksi ditolak
    } elseif ($transactionStatus == 'expire') {
        $donation->status = 'expired'; // Transaksi kadaluarsa
    } elseif ($transactionStatus == 'cancel') {
        $donation->status = 'failed'; // Transaksi dibatalkan
    }

    // Simpan perubahan status ke database
    $donation->save();

    // Kembalikan respons sukses ke Midtrans
    return response()->json(['message' => 'Donation status updated successfully'], 200);
}
}
