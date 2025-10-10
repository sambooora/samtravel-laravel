<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
   use HasFactory;  
   protected $table = 'locations';
   protected $fillable = [
      'image',
      'title',
      'description',
      'officehours',
      'category_id',
      'region_id',
      'address',
      'phone',
      'latitude',
      'longitude',
   ];
   protected $appends = ['image_url'];
   
   public function getImageUrlAttribute()
   {
      // Jika tidak ada gambar, kembalikan array kosong
    if($this->image) {
        return[];
    }
    // Jika ada gambar, kembalikan array URL gambar dengan di gabung dan di pisah dengan '|'
    return array_map(function($image) {
        return asset('storage/' . $image);
      }, explode('|', $this->image));
   }

   public function category()
   {
      return $this->belongsTo(Categories::class, 'category_id');
   }

   public function ticket()
   {
      return $this->belongsToMany(Tickets::class, 'location_ticket', 'location_id', 'ticket_id')
      ->withPivot('ticket_category_id')
      ->withTimestamps();
   }

   public function review()
   {
      return $this->hasMany(Reviews::class, 'location_id');
   }

   public function region()
   {
      return $this->belongsTo(Regions::class);
   }

   public function getTicketGroupByCategory()
   {
      return $this->ticket->groupBy(function($ticket) {
         return $ticket->pivot->ticket_category_id;
      });
   }
}
