<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $fillable = [
        'id', 'rua', 'bairro', 'cidade', 'estado','complemento'
    ];
}