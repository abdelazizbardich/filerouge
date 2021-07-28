<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_has_product extends Model
{
    use HasFactory;

    protected $table = 'orders_has_products';

    protected $fillable = [
        'orders_id',
        'products_id',
        'qte'
    ];
}
