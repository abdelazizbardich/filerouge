<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'name',
        'price',
        'description',
        'thumbnail',
        'dimentions',
        'good_to_know',
        'stock',
        'full_description'
    ];

    public function categories()
    {
        return $this->belongsTo(category::class);
    }

    public function materials(){
        return $this->belongsTo(material::class);
    }
}
