@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!--<div class="row">

    <div class="col-md-12 col-12">
        <img class="img-fluid" src="{{ asset('img/almacenes-dos.png') }}" usemap="#image_map" >
        <map name="image_map">
            @foreach ($warehouses as $warehouse)
                <area id="{{ $warehouse->id }}" alt="{{ $warehouse->name }}" title="{{ $warehouse->name }}" href="{{ route('warehouses-products.validate-warehouse', $warehouse->id) }}" coords="{{ $warehouse->coordinates }}" shape="rect" title="{{ $warehouse->name }}">
            @endforeach
        </map>
    </div>

</div>-->
@endsection