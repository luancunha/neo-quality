<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosInternacao extends Model
{
    protected $fillable = [
        'data', 'peso', 'tamanho','sufarctante', 'antibiotico',
    ];

    protected $hidden = [
        'cod_internacao',
    ];
}
