<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = ['idtype', 'idnumber', 'fullname', 'city',
    'address', 'taxcond', 'phones', 'group', 'taxid', 'email'];
}
