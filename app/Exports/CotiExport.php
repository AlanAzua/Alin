<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CotiExport implements FromArray, WithHeadings
{ 
    use Exportable;

    public function headings(): array
    {
        return [
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
            'numcot',
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
    public function array(): array {
        $url= env('URL_SERVER_API','http://localhost:8080');
        $response=HTTP::get($url.'/cotizaciones?desde=2022-12-22&hasta=2023-02-22');
        $datasetsArray= $response->json();
        return $datasetsArray['data'];
    }
    
}
