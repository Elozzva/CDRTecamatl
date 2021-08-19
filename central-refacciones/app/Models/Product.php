<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function cars() {
        return $this->belongsToMany(Car::class, 'car_products', 'Product_id', 'Car_id')->withTimestamps();
    }
    /**
     * Get the user that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trademark()
    {
        return $this->belongsTo(Trademark::class, 'Trademark_id')->orderBy("name");
    }
    public function line()
    {
        return $this->belongsTo(Line::class, 'Line_id')->orderBy("line");
    }
    /**
     * Get the elemenType that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function elementType()
    {
        return $this->belongsTo(ElementType::class, 'Element_type_id');
    }
}
