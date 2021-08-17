<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_has_material extends Model
{
    use HasFactory;

    public $table = "products_has_materials";

    protected $fillable=[
        'products_id',
        'materials_id'
    ];
}
