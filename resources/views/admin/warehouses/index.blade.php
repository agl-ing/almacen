@extends('layouts.admin')
@section('title', 'Almacenes')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Almacenes</h1>
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
                    Lista de Almacenes
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
                                    <th>Maxima cantidad</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouses as $warehouse)
                                <tr>
                                    <td>{{ $warehouse->id }}</td>
                                    <td>{{ $warehouse->code }}</td>
                                    <td>{{ $warehouse->name }}</td>
                                    <td>{{ $warehouse->maximum_quantity }}</td>
                                    <td>{{ $warehouse->status == 0 ? 'Inactivo' : 'Activo '}}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('warehouses.edit', $warehouse->id) }}" class="btn btn-warning margin-r">Editar</a>
                                        {!! Form::open(['route' => ['warehouses.destroy', $warehouse->id], 'method'=> 'DELETE' ]) !!}
                                            <input type="submit" @class([
                                                'btn' => 1,
                                                'btn-danger' => $warehouse->status,
                                                'btn-success' => !$warehouse->status,
                                                'mr-2' => true
                                            ]) 
                                            value="{{ ($warehouse->status == 1)? 'Eliminar' : 'Activar' }}">
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