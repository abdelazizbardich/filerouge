<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\shipping_adress;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'shipping_adresses_id'
    ];



    /**
     * Get the user that owns the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    /**
     * Get the shipping_adress associated with the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shipping_adress()
    {
        return $this->hasOne(shipping_adress::class, 'id', 'shipping_adresses_id');
    }


    /**
     * Get all of the product for the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        // return $this->hasMany(product::class, 'orders_has_products', 'odrders_id', 'products_id');
        return $this->belongsToMany(Product::class, 'orders_has_products', 'orders_id', 'products_id');
    }
}
