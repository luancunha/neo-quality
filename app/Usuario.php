<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome', 'email', 'senha'
    ];

    protected $hidden = [
        'crm_coren', 'telefone',
    ];
}
