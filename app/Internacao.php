<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internacao extends Model
{
    protected $fillable = [
        'nome', 'mae', 'sexo','tipo_parto', 'tmp_gestacao', 'peso', 'leito', 'tamanho', 'dt_internacao','peso',
    ];
}
