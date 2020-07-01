<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'letter','serial','date','salecondition',
        'deliverynoteserial','deliverynotenumber',
        'seller','discount',
        'client_ID','client_ID_type','client_ID_number',
        'client_Name','client_City','client_address',
        'client_tax_Cond','client_phone','client_email',
        'flag'
];

}
