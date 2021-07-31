<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use shipping_adress;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'shipping_adresses_id'
    ];
}
