@extends('layouts.admin')
@section('title', 'Almacene-Producto')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Almacen - Producto</h1>
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
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Crear almacen - producto
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                        {!! Form::open(['route' => ['warehouses-products.store'], 'method' => 'POST']) !!}
                            @include('admin.warehouses-products.partial.form')
                        {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection