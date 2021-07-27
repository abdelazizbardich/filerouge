<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = "medias";

     /**
      * The products that belong to the media
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function products(){
         return $this->belongsToMany(Product::class, 'products_has_medias', 'medias_id', 'products_id');
     }
}
