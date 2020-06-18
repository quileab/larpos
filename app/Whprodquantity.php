<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Whprodquantity extends Model
{
    //
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function warehouse()
    {
        return $this->belongsTo('App\Warehouse');
    }
}