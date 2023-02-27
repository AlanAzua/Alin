<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Http;


class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $url= env('URL_SERVER_API','http://localhost:8080');
     $response=HTTP::get($url.'/cobranzas');
     $datasetsArray= $response->json();
      return json_encode($datasetsArray);
      
    }

    public function cotizaciones()
    {
    $url= env('URL_SERVER_API','http://localhost:8080');
     $response=HTTP::get($url.'/cotizaciones?desde=2022-12-22&hasta=2023-02-22');
     $datasetsArray= $response->json();
     return json_encode($datasetsArray);
      
    }
    public function precios() {
      $url= env('URL_SERVER_API','http://localhost:8080');
      $response=HTTP::get($url.'/productos');
      $datasetsArray= $response->json();
      return json_encode($datasetsArray);
      
  }
    

   

}
