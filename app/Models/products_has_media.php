<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products_has_media extends Model
{
    use HasFactory;

    public $table = "products_has_medias";

    protected $fillable = [
        'products_id',
        'medias_id'
    ];
}
