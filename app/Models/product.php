<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\media;
use  App\Models\material;

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
        'points',
        'on_sale',
        'in_slider',
        'full_description'
    ];

    public function categories()
    {
        return $this->belongsTo(category::class);
    }

    public function materials(){
        return $this->belongsToMany(material::class, 'products_has_materials', 'products_id', 'materials_id');
    }


    /**
     * Get all of the medias for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medias(){
        return $this->belongsToMany(media::class, 'products_has_medias', 'products_id', 'medias_id');
    }
}
