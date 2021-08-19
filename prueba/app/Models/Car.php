<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\Shipowner;
Use App\Models\Product;


class Car extends Model
{
    use HasFactory;
    public function products() {
        return $this->belongsToMany(Product::class, 'car_products', 'Car_id', 'Product_id')->withTimestamps();
    }
    /**
     * Get the user that owns the Car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shipowner()
    {
        return $this->belongsTo(Shipowner::class, 'Shipowner_id')->orderBy("name");
    }
}
