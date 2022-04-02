<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosInternacao extends Model
{
    protected $fillable = [
        'cod_internacao','data', 'peso', 'tamanho', 'boo_sufarctante', 'sufarctante', 'boo_antibiotico', 'antibiotico',
    ];

    protected $hidden = [
        //
    ];
}
