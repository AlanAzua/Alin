@extends('layouts.plantillaBase')

@section('contenido')
<section class="section">
    <div class="container body">
        <div class="main_container">
            <div class="right_col" role="main">
                <div class="header">
                    <h3 class="page__heading">Usuarios</h3>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    @can('crear-usuario')
                                    <a class="btn btn-warning" href="{{ route('usuarios.create')}}">Nuevo</a> 
                                    @endcan
                                    <table class ="table table-striped mt-2">
                                        <thead style="background-color: #6777ef;">
                                            <th style= "display: none;"> ID</th>
                                            <th style= "color: #fff;"> Nombre</th>
                                            <th style= "color: #fff;"> E-mail</th>
                                            <th style= "color: #fff;"> Rol</th>
                                            <th style= "color: #fff;"> Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $usuario)
                                                <tr>
                                                <td style= "display: none;"> {{$usuario->id}}</td>
                                                    <td>{{$usuario->name}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>
                                                        @if(!empty($usuario->getRoleNames()))
                                                            @foreach($usuario->getRoleNames() as $rolName)
                                                            <h5><span class= "badge badge-dark">{{$rolName}}</span></h5>
                                                            @endforeach
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @can('editar-usuario')
                                                        <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id)}}"> Editar</a>
                                                        @endcan
                                                        @can('borrar-usuario')
                                                        {!! Form::open(['method' => 'DELETE', 'route'=> ['usuarios.destroy', $usuario->id, 'style'=> 'display:inline']]) !!}
                                                        {!! form::submit('Borrar', ['class'=> 'btn btn-danger'])!!}
                                                        {!! Form::close() !!}
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    <div class=" Pagination justify-content-end">
                                        {!! $usuarios->links()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection