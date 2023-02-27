<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\CotiExport;
use App\Exports\PreciExport;
use App\Exports\ProdExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Http;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Maatwebsite\Excel\Concerns\Exportable;


class ExportController extends Controller 
{ 
   use Exportable;
   
     public function exportExcel(){
   
      return Excel::download( new UsersExport, 'Cobranzas.xlsx');
     }

     public function exportCoti(){
   
      return Excel::download( new CotiExport, 'Cotizaciones.xlsx');
     }
     public function exportPrecios(){
   
      return Excel::download( new PreciExport, 'Lista-Precios.xlsx');
     }
}
