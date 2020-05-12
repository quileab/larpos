<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users()
    {
        //Este modelo de 'Role' pertenece a Muchos Usuarios
        return $this->belongsToMany('App\User');
    }
}
