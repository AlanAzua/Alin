<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $fillable = [
            'numcot',
            'ejecutivo',
            'equipo',
            'codven',
            'activa',
            'cencos',
            'fecemi',
            'fecven',
            'rutcli',
            'id',
            'razons',
            'negocio_eerr',
            'NUMCOT',
            'fecven',
            'cantidad',
            'precio',
            'prelis',
            'q_analisis',
            'codpro',
            'despro',
            'linea_principal',
    ];
}
