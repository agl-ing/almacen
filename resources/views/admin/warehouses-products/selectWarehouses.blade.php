@extends('layouts.admin')

@section('title', 'Dashboard')

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
     <!-- /.row -->
     <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Selecione un almacen para agregar productos
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                @foreach ($warehouses as $warehouse)
                                    <div class="col-md-2 col-12">
                                        <a href="{{  route('warehouses-products.validate-warehouse', $warehouse->id) }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-warehouse"></i> {{ $warehouse->name}}</a>
                                    </div>
                                @endforeach
                            </div>

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