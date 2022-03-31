<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome','crm_coren', 'telefone', 'email', 'senha'
    ];
}
