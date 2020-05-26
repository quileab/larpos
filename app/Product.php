<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * El Producto es SOLO un producto la relación
     * la hago después con Deposito y Cantidad
     */
    /*
     public function warehouse()
    {
        return $this->belongsToMany(Warehouse::class);
    }
    */
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }
    /*
    public function quantity()
    {
        return $this->belongsTo('App\product_quantity');
    }
    */
}
