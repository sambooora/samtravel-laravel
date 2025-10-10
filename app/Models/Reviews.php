<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $table = 'reviews';
   protected $fillable = [
       'user_id',
      'location_id',
      'transaction_id',
      'review',
      'rate_kebersihan',
      'rate_keakuratan',
      'rate_checkin',
      'rate_komunikasi',
      'rate_lokasi',
      'rate_nilaiekonomis'
   ];

   public function user()
   {
    //ini function yang menghubungkan tabel reviews dengan tabel users
      return $this->belongsTo(Users::class, 'user_id');
   }

   public function location()
   {
    //ini function yang menghubungkan tabel reviews dengan tabel locations
      return $this->belongsTo(Locations::class, 'location_id');
   }

   public function transaction()
   {
    //ini function yang menghubungkan tabel reviews dengan tabel transactions
      return $this->belongsTo(Transactions::class, 'transaction_id');
   }
}
