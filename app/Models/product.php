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
        'dimentions',
        'good_to_know',
        'stock',
        'full_description'
    ];
}
