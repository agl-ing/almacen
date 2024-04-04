@extends('layouts.admin')
@section('title', 'Proveedores')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Productos</h1>
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
                    Lista de productos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>SKU</th>
                                    <th>Nombre</th>
                                    <th>Proveedor</th>
                                    <th>Estatus</th>
                                    <th>Descripcion</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->provider->name }}</td>
                                    <td>{{ $product->status == 0 ? 'Inactivo' : 'Activo '}}</td>
                                    <td>{{ $product->description }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning margin-r">Editar</a>
                                        {!! Form::open(['route' => ['products.destroy', $product->id], 'method'=> 'DELETE' ]) !!}
                                            <input type="submit" @class([
                                                'btn' => 1,
                                                'btn-danger' => $product->status,
                                                'btn-success' => !$product->status,
                                                'mr-2' => true
                                            ]) 
                                            value="{{ ($product->status == 1)? 'Eliminar' : 'Activar' }}">
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