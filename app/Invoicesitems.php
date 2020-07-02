<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoicesitems extends Model
{
    protected $fillable = [
        'invoices_id', 'products_id',
        'brand', 'type','description', 'quantity',
        'unit', 'price',
        'tax', 'discount',
    ];
}
