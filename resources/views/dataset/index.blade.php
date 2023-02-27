@extends('layouts.plantillaBase')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
@section('contenido')
<section class="section">
    <div class="container body">
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="body">
                    <div class="left">
                        <div class="header">
                            <h3 class="page__heading">Datasets</h3>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="pull-right">
                            <div class="left">
                                <button id="buscar" class="btn btn-info"  type="button"><i class="fa fa-search" style="width:30px; height:20px"></i></button>
                            </div>    
                            <input  id="txtSearch" style="width: 500px" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar" >
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-body">
                                 <button type="button" id="actu" class="btn btn-warning">Actualizar</button>  
                                <div class="table-responsive">
                                <table id="datasets" class="table table-bordered">
                                    <thead style="background-color: #6777ef">
                                        <tr>
                                            <th style= "color: #fff;">fecha_proceso</th>
                                            <th style= "color: #fff;">numfac</th>
                                            <th style= "color: #fff;">equipo</th>
                                            <th style= "color: #fff;">vendedor</th>
                                            <th style= "color: #fff;">negocio_eerr</th>
                                            <th style= "color: #fff;">rutcli</th>
                                            <th style= "color: #fff;">cencos</th>
                                            <th style= "color: #fff;">codemp</th>
                                            <th style= "color: #fff;">razons</th>
                                            <th style= "color: #fff;">estado</th>
                                            <th style= "color: #fff;">forma_pago</th>
                                            <th style= "color: #fff;">plazo_pago</th>
                                            <th style= "color: #fff;">codven</th>
                                            <th style= "color: #fff;">fecemi</th>
                                            <th style= "color: #fff;">fecven</th>
                                            <th style= "color: #fff;">totgen</th>
                                            <th style= "color: #fff;">totsal</th>
                                            <th style= "color: #fff;">dias_calc</th>
                                            <th style= "color: #fff;">dias</th>
                                            <th style= "color: #fff;">cobrador</th>
                                            <th style= "color: #fff;">asegurado</th>
                                            <th style= "color: #fff;">ciaseg</th>
                                            <th style= "color: #fff;">clasifica</th>
                                            <th style= "color: #fff;">codestado</th>
                                            <th style= "color: #fff;">clase</th>
                                            <th style= "color: #fff;">rendida</th>
                                            <th style= "color: #fff;">doc_financiero</th>
                                            <th style= "color: #fff;">cia_seg_sap</th>
                                            <th style= "color: #fff;">viapag</th>
                                            <th style= "color: #fff;">debe_haber</th>
                                            <th style= "color: #fff;">cme</th>
                                            <th style= "color: #fff;">asignacion</th>
                                            <th style= "color: #fff;">ctacontable</th>
                                            <th style= "color: #fff;">feccontable</th>
                                            <th style= "color: #fff;">fecha_base</th>
                                            <th style= "color: #fff;">moneda</th>
                                            <th style= "color: #fff;">plapag</th>
                                            <th style= "color: #fff;">fecha_reg</th>
                                            <th style= "color: #fff;">archivo</th>
                                            <th style= "color: #fff;">texto_pos</th>
                                            <th style= "color: #fff;">fecha_compensacion</th>
                                            <th style= "color: #fff;">docto_compensacion</th>
                                            <th style= "color: #fff;">bloqueo_gestion</th>
                                            <th style= "color: #fff;">motivo_bloqueo</th>
                                            <th style= "color: #fff;">cod_sociedad</th>
                                            <th style= "color: #fff;">id_sap_cliente</th>
                                            <th style= "color: #fff;">id_sap_cencos</th>
                                            <th style= "color: #fff;">observacion_adicional</th>
                                            <th style= "color: #fff;">dias_ven</th>
                                            <th style= "color: #fff;">provision</th>
                                            <th style= "color: #fff;">rango_morosidad</th>
                                            <th style= "color: #fff;">status</th>
                                            <th style= "color: #fff;">considerar</th>
                                            <th style= "color: #fff;">documento</th>
                                            <th style= "color: #fff;">factura_asociada</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tabla'>
                                    </tbody>
                                    <tfoot>
                                        <th><input type="text" ></th>
                                        <th><input type="text" ></th>
                                        <th><input type="text" ></th>
                                        <th><input type="text" ></th>
                                        <th></th>
                                        <th><input type="text" ></th>
                                        <th></th>
                                    </tfoot>
                                </table>
                            </div>
                            <br>
                            <div class="pull-right">
                                <a id="Descargar" class="btn btn-danger" href="{{ url('/export')}}">Descargar</a>
                            </div>
                        </div>
                    </div>
                    <script>
                      $(function(){
                        tabla();    
                        });           

                      function tabla() {
                        $.ajax({
                            url: '{{route('api-lala')}}',
                            type: 'GET',
                            datatype:'json',
                            async: true,
                            success: function(response){
                                var js = JSON.parse(response);
                                js = js.data;
                                var tabla;
                                for (var i=0; i < js.length; i++){
                                    tabla+=`<tr><td>`+js[i].fecha_proceso+`</td><td>`+js[i].numfac+`</td><td>`+js[i].equipo+`</td><td>`
                                    +js[i].vendedor+`</td><td>`+js[i].negocio_eerr+`</td><td>`+js[i].rutcli+`</td><td>`+js[i].cencos+`</td><td>`
                                    +js[i].codemp+`</td><td>`+js[i].razons+`</td><td>`+js[i].estado+`</td><td>`+js[i].forma_pago+`</td><td>`
                                    +js[i].plazo_pago+`</td><td>`+js[i].codven+`</td><td>`+js[i].fecemi+`</td><td>`+js[i].fecven+`</td><td>`
                                    +js[i].totgen+`</td><td>`+js[i].totsal+`</td><td>`+js[i].dias_calc+`</td><td>`+js[i].dias+`</td><td>`
                                    +js[i].cobrador+`</td><td>`+js[i].asegurado+`</td><td>`+js[i].ciaseg+`</td><td>`+js[i].clasifica+`</td><td>`
                                    +js[i].codestado+`</td><td>`+js[i].clase+`</td><td>`+js[i].rendida+`</td><td>`+js[i].doc_financiero+`</td><td>`
                                    +js[i].cia_seg_sap+`</td><td>`+js[i].viapag+`</td><td>`+js[i].debe_haber+`</td><td>`+js[i].cme
                                    +`</td><td>`+js[i].asignacion+`</td><td>`+js[i].ctacontable+`</td><td>`+js[i].feccontable+`</td><td>`
                                    +js[i].fecha_base+`</td><td>`+js[i].moneda+`</td><td>`+js[i].plapag+`</td><td>`+js[i].fecha_reg+`</td><td>`
                                    +js[i].archivo+`</td><td>`+js[i].texto_pos+`</td><td>`+js[i].fecha_compensacion+`</td><td>`
                                    +js[i].docto_compensacion+`</td><td>`+js[i].bloqueo_gestion+`</td><td>`+js[i].motivo_bloqueo+`</td><td>`+js[i].cod_sociedad
                                    +`</td><td>`+js[i].id_sap_cliente+`</td><td>`+js[i].id_sap_cencos+`</td><td>`+js[i].observacion_adicional+`</td><td>`
                                    +js[i].dias_ven+`</td><td>` +js[i].provision+`</td><td>`+js[i].rango_morosidad+`</td><td>`+js[i].status+`</td><td>`
                                    +js[i].considerar+`</td><td>`+js[i].documento+`</td><td>`+js[i].factura_asociada+`</td><tr>`;
                                }
                                $('#tabla').html(tabla);
                                
                            }
                            
                        });
                      }
                      $('#actu').click(function(){
                        tabla();
                        });
                        // Setup - add a text input to each footer cell
                        $('#datasets tfoot th').each( function () {
                            var title = $('#datasets thead th').eq( $(this).index() ).text();
                            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                        } );

                        // DataTable
                        var table = $('#datasets').DataTable();

                        // Apply the filter
                        table.columns().every( function () {
                            var column = this;
                        
                            $( 'input', this.footer() ).on( 'keyup change', function () {
                                column
                                    .search( this.value )
                                    .draw();
                            } );
                        } );
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection