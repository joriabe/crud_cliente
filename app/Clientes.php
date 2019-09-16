<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'id', 'nombre_1', 'nombre_2', 'apellido_1', 'apellido_2', 'email', 'fecha_n'
    ];
}
