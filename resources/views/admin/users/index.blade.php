@extends('layouts.admin')
@section('title', 'Usuarios')

@section('content')
    <div class="row">   
        <div class="col-lg-12">
            <h1 class="page-header">Usuarios</h1>
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
                    Lista de Usuarios
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->status == 0 ? 'Inactivo' : 'Activo '}}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning margin-r">Editar</a>
                                        {!! Form::open(['route' => ['users.destroy', $user->id], 'method'=> 'DELETE' ]) !!}
                                            <input type="submit" @class([
                                                'btn' => 1,
                                                'btn-danger' => $user->status,
                                                'btn-success' => !$user->status,
                                                'mr-2' => true
                                            ]) 
                                            value="{{ ($user->status == 1)? 'Eliminar' : 'Activar' }}">
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