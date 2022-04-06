<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DadosInternacao extends Model
{
    protected $fillable = [
        'cod_internacao','data', 'peso', 'tamanho', 'boo_sufarctante', 'sufarctante', 'antibiotico', 'infec_bacte', 'infec_noso', 'infec_fung', 'hemo_intra', 'entero_necro',
    ];

    protected $hidden = [
        //
    ];
}
