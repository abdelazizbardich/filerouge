<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Media;
use  App\Models\Material;

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
        return $this->belongsToMany(Material::class, 'products_has_materials', 'products_id', 'materials_id');
    }


    /**
     * Get all of the medias for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medias(){
        return $this->belongsToMany(Media::class, 'products_has_medias', 'products_id', 'medias_id');
    }
}
