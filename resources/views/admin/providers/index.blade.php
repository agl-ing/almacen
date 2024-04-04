@extends('layouts.admin')
@section('title', 'Proveedores')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Proveedores</h1>
        </div>
    </div>

    @if(session('info'))
        <div class="alert alert-success" role="alert">
            {{ session('info')}}
        </div>
    @endif

    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{ $error}}
        </div>
    @endforeach
    
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Lista de proveedores
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Nombre comercial</th>
                                    <th>Estatus</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                <tr>
                                    <td>{{ $provider->id }}</td>
                                    <td>{{ $provider->code }}</td>
                                    <td>{{ $provider->name }}</td>
                                    <td>{{ $provider->tradename }}</td>
                                    <td>{{ $provider->status == 0 ? 'Inactivo' : 'Activo '}}</td>
                                    <td>{{ $provider->description }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('providers.edit', $provider->id) }}" class="btn btn-warning margin-r">Editar</a>
                                        {!! Form::open(['route' => ['providers.destroy', $provider->id], 'method'=> 'DELETE' ]) !!}
                                            <input type="submit" @class([
                                                'btn' => 1,
                                                'btn-danger' => $provider->status,
                                                'btn-success' => !$provider->status,
                                                'mr-2' => true
                                            ]) 
                                            value="{{ ($provider->status == 1)? 'Eliminar' : 'Activar' }}">
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
@endsection