<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estrutura extends Model
{
    protected $fillable = [
        'dt_estrutura', 'num_incubadora', 'num_rns', 'num_oximetro', 'num_enfermeiro',
    ];

    protected $hidden = [
        //
    ];
}
