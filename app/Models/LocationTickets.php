<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationTickets extends Model
{
    use HasFactory;  
   protected $table = 'location_ticket';
   protected $fillable = [
      'location_id',
      'ticket_id',
      'ticket_category_id',
   ];

   public function ticket()
   {
      return $this->belongsTo(Tickets::class);
   }

   public function location()
   {
      return $this->belongsTo(Locations::class);
   }

   public function category()
   {
      return $this->belongsTo(TicketCategories::class, 'ticket_category_id');
   }
//    protected $appends = ['image_url'];
   
//    public function getImageUrlAttribute()
//    {
//       return $this->image ? asset('storage/' . $this->image) : null;
//    }
     
}
