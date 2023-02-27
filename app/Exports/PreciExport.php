<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PreciExport implements FromArray, WithHeadings
{ 
    use Exportable;

    public function headings(): array
    {
        return [
            'rn',
            'codpro',
            'despro',
            'estado',
            'cosprom',
            'costo',
            'codpro',
            'lista',
            'tipo_lista',
            'margen',
            'precio',
            'precio_minimo',
            'mg_minimo',

        ];
    }
    public function array(): array {
        $url= env('URL_SERVER_API','http://localhost:8080');
        $response=HTTP::get($url.'/productos');
        $datasetsArray= $response->json();
        return $datasetsArray['data'];
        
    }
    
}
