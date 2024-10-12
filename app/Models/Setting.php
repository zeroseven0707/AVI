<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'favicon',
        'logo',
        'title',
        'meta_description',
        'email',
        'no_telp',
        'address',
        'copyright',
        'social_medias'
    ];

    // Mengubah field 'social_medias' dari JSON ke array
    protected $casts = [
        'social_medias' => 'array',
    ];
}
