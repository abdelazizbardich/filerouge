<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorys_id',
        'name',
        'price',
        'description',
        'dimentions',
        'Good to know',
        'stock',
        'full_description'
    ];
}
