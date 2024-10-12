<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = ['donation_id', 'transaction_code', 'amount', 'payment_status', 'midtrans_order_id', 'midtrans_status', 'payment_date'];

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }
}
