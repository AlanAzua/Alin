<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromArray, WithHeadings
{ 
    use Exportable;

    public function headings(): array
    {
        return [
            'Fecha_proceso',
            'Numfac',
            'Equipo',
            'Vendedor',
            'Negocio_eerr',
            'Rutcli',
            'Cencos',
            'Codemp',
            'Razons',
            'Estado',
            'Forma_pago',
            'Plazo_pago',
            'Codven',
            'Fecemi',
            'Fecven',
            'Totgen',
            'Totsal',
            'Dias_calc',
            'Dias',
            'Cobrador',
            'Asegurado',
            'Ciaseg',
            'Clasifica',
            'Codestado',
            'Clase',
            'Rendida',
            'Doc_financiero',
            'Cia_seg_sap',
            'Viapag',
            'Debe_haber',
            'Cme',
            'Asignacion',
            'Ctacontable',
            'Feccontable',
            'Fecha_base',
            'Moneda',
            'Plapag',
            'Fecha_reg',
            'Archivo',
            'Texto_pos',
            'Fecha_compensacion',
            'Docto_compensacion',
            'Bloqueo_gestion',
            'Motivo_bloqueo',
            'Cod_sociedad',
            'Id_sap_cliente',
            'Id_sap_cencos',
            'Observacion_adicional',
            'Dias_ven',
            'Provision',
            'Rango_morosidad',
            'Status',
            'Considerar',
            'Documento',
            'Factura_asociada',

        ];
    }
    public function array(): array {
        $url= env('URL_SERVER_API','http://localhost:8080');
        $response=HTTP::get($url.'/cobranzas');
        $datasetsArray= $response->json();
        return $datasetsArray['data'];
        
    }
    
}
