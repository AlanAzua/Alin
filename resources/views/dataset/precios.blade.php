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
                            <h3 class="page__heading">Datasets Productos</h3>
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
                                            <th style= "color: #fff;">Rn</th>
                                            <th style= "color: #fff;">Codpro</th>
                                            <th style= "color: #fff;">Despro</th>
                                            <th style= "color: #fff;">Estado</th>
                                            <th style= "color: #fff;">Cosprom</th>
                                            <th style= "color: #fff;">Costo</th>
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
                                <a id="Descargar" class="btn btn-danger" href="{{ url('/export/precios')}}">Descargar</a>
                            </div>
                        </div>
                        <div class="modal" id="ModalDetalle" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-xl modal-dialog-scrollable ">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Detalle Productos</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead style="background-color: #6777ef">
                                                <tr>
                                                <th style= "color: #fff;">Codpro</th>
                                                <th style= "color: #fff;">Lista</th>
                                                <th style= "color: #fff;">Tipo_lista</th>
                                                <th style= "color: #fff;">Margen</th>
                                                <th style= "color: #fff;">Precio</th>
                                                <th style= "color: #fff;">Precio_minimo</th>
                                                <th style= "color: #fff;">Mg_minimo</th>
                                                
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
          url: '{{route('api-precios')}}',
          type: 'GET',
          datatype:'json',
          async: true,
          success: function(response){
              var js = JSON.parse(response);
              js = js.data;
              var jj;
              var tabla;
              for (var i=0; i < js.length; i++){
                  tabla+=`<tr><td>`+js[i].rn+`</td><td>`+js[i].codpro+`</td><td>`+js[i].despro+`</td><td>`
                  +js[i].estado+`</td><td>`+js[i].cosprom+`</td><td>`+js[i].costo+`</td><td>`
                  +`<button type="button" class="btn btn-info boton-modal" data-toggle="modal" data-target="#ModalDetalle" onClick="tablaModal(`+js[i].codpro+`)"><i class="fa fa-table"></i></button>`
                  +`</td><tr>`;
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
        });
        function tablaModal(codpro) {
            $.ajax({
                url: '{{route('api-precios')}}'+'/'+codpro,
                type: 'GET',
                datatype:'json',
                async: true,
                success: function(response){
                    var js = JSON.parse(response);
                    js = js.data;
                    var jj;
                    var tablaModal;
                    for (var i=0; i < js.length; i++){
                        for(var j=0; j< js[i].detalle_producto.length; j++){
                          jj = js[i].detalle_producto[j];
                          tablaModal+=`<tr><td>`+jj.codpro+`</td><td>`+jj.lista+`</td><td>`
                          +jj.tipo_lista+`</td><td>`+jj.margen+`</td><td>`+
                          jj.precio+`</td><td>`+jj.precio_minimo+`</td><td>`+jj.mg_minimo+`</td><tr>`;
                        }
                       
                    }
                    $('#tablaMo').html(tablaModal);

                }

            });
        }
        $('#actualizar').click(function(){
        tablaModal();
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
</section>
@endsection