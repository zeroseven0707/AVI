<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * The subcategories that belong to the Campaign
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(subcategories::class, 'subcategories_id', 'id');
    }

   // Relasi dengan model Donation
   public function donations()
   {
       return $this->hasMany(Donation::class);
   }

   // Fungsi untuk menghitung total amount donation
   public function totalDonations()
   {
       return $this->donations()->sum('amount');
   }

   // Fungsi untuk menghitung persentase donasi terkumpul
   public function donationPercentage()
   {
       $totalDonations = $this->totalDonations();
       return $this->goal_amount > 0 ? ($totalDonations / $this->goal_amount) * 100 : 0;
   }

}
