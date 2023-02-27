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
                            <h3 class="page__heading">Datasets Cotizaciones</h3>
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
                                            <th style= "color: #fff;">numcot</th>
                                            <th style= "color: #fff;">ejecutivo</th>
                                            <th style= "color: #fff;">equipo_coti</th>
                                            <th style= "color: #fff;">codven</th>
                                            <th style= "color: #fff;">activa</th>
                                            <th style= "color: #fff;">cencos</th>
                                            <th style= "color: #fff;">fecemi</th>
                                            <th style= "color: #fff;">rutcli</th>
                                            <th style= "color: #fff;">id</th>
                                            <th style= "color: #fff;">razons</th>
                                            <th style= "color: #fff;">negocio_eerr</th>
                                            <th style= "color: #fff;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id='tabla'>
                                    </tbody>
                                    <tfoot>
                                        
                                    </tfoot>
                                </table>
                                
                            </div>
                            <br>
                            <div class="pull-right">
                                <a id="Descargar" class="btn btn-danger" href="{{ url('/export/cotizaciones')}}">Descargar</a>
                            </div>
                        </div>
                        <div class="modal" id="ModalDetalle" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-xl modal-dialog-scrollable">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detalle Cotizacion</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead style="background-color: #6777ef">
                                                <tr>
                                                    <th style= "color: #fff;">numcot</th>
                                                    <th style= "color: #fff;">fecven</th>
                                                    <th style= "color: #fff;">cantidad</th>
                                                    <th style= "color: #fff;">precio</th>
                                                    <th style= "color: #fff;">prelis</th>
                                                    <th style= "color: #fff;">q_analisis</th>
                                                    <th style= "color: #fff;">codpro</th>
                                                    <th style= "color: #fff;">despro</th>
                                                    <th style= "color: #fff;">linea_principal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tablaMo">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary actualizar">Actualizar</button>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <script>
                      $(function(){
                        tabla();    
                        });           

                      function tabla() {
                        $.ajax({
                            url: '{{route('api-coti')}}',
                            type: 'GET',
                            datatype:'json',
                            async: true,
                            success: function(response){
                                var js = JSON.parse(response);
                                js = js.data;
                                $data=js;
                                var tabla;
                                
                                for (var i=0; i < js.length; i++){
                                    tabla+=`<tr><td>`+js[i].numcot+`</td><td>`+js[i].ejecutivo+`</td><td>`+js[i].equipo_coti+`</td><td>`
                                    +js[i].codven+`</td><td>`+js[i].activa+`</td><td>`+js[i].cencos+`</td><td>`+js[i].fecemi+`</td><td>`
                                    +js[i].rutcli+`</td><td>`+js[i].id+`</td><td>`+js[i].razons+`</td><td>`+js[i].negocio_eerr+`</td><td>`
                                    +`<button type="button" class="btn btn-info boton-modal"  data-toggle="modal" data-target="#ModalDetalle" onClick="tabla('js[i].numcot')"><i class="fa fa-table"></i></button>`
                                    +`</td></tr>`;
                                    

                                }
                               
                                $('#tabla').html(tabla);
                                
                            }
                            
                        });
                      }
                      $('#actu').click(function(){
                        tabla();
                        });
                        
                    $('#ModalDetalle').on('show.bs.modal', function (event) {
                        var button = $(event.relatedTarget)
                        $(function(){
                        tablaModal();    
                        });     
                    
                      function tablaModal() {
                        $.ajax({
                            url: '{{route('api-coti')}}',
                            type: 'GET',
                            datatype:'json',
                            async: true,
                            success: function(response){
                                var ja = JSON.parse(response);
                                jr = ja.data;
                                var jj;
                                var tablaModal;
                                for (var f=0; f < jr.length; f++){
                                    tablaModal+=`<tr><td>`+jr[f].numcot+`</td><td>`;

                                    for(var j=0; j< jr[f].detalle_cotizacion.length; j++){
                                        jj = jr[f].detalle_cotizacion[j];
                                        tablaModal+=jj.fecven+`</td><td>`+jj.cantid+`</td><td>`+jj.precio+`</td><td>`+
                                        jj.prelis+`</td><td>`+jj.q_analisis+`</td><td>`+jj.codpro+`</td><td>`+jj.despro+`</td><td>`+
                                        jj.linea_principal+`</td><td>`
                                    }
                                    tablaModal+=`</td><tr>`;
                                }
                                $('#tablaMo').html(tablaModal);
                                
                            }
                            
                        });
                        }
                    });
                        
                   
                    
                        /*
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
                        } );*/
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection