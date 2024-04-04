@extends('layouts.admin')
@section('title', 'Almacene-Producto')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Almacene-Producto</h1>
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
                    Lista de Almacene-Producto
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
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouse_Products as $warehouse_Product)
                                <tr>
                                    <td>{{ $warehouse_Product->id }}</td>
                                    <td>{{ $warehouse_Product->warehouse->code }}</td>
                                    <td>{{ $warehouse_Product->warehouse->name }}</td>
                                    <td>{{ $warehouse_Product->product->name }}</td>
                                    <td>{{ $warehouse_Product->qty }}</td>
                                    <td>{{ $warehouse_Product->status == 0 ? 'Inactivo' : 'Activo '}}</td>
                                    <td><a href="{{ route('warehouses-products.edit', $warehouse_Product->id) }}" class="btn btn-warning margin-r">Editar</a></td>
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