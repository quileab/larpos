<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'barcode','brand','type','description','unit_id',
        'price','tax','profit1','profit2',
        'salesprice1','salesprice2','discount'
    ];
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

    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }

    public function quantity()
    {
        return $this->belongsTo('App\Whprodquantity');
    }
}
