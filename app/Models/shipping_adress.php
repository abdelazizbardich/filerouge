<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipping_adress extends Model
{
    use HasFactory;

    protected $fillable = [
        'country',
        'region',
        'city',
        'street',
        'zip_code'
    ];
}
