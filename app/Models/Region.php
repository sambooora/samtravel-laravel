<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory, SoftDeletes;  
   protected $table = 'regions';
   protected $fillable = [
      'name',
   ];
   public function locations()
   {
      return $this->hasMany(Locations::class);
   }
}
