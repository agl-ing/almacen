<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coppel | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
  </head>
  <body>
        <div class="d-flex p-2 justify-content-center align-items-center">
            <div>
                {!! Form::open(['route' => ['auth'], 'id' => 'form-login', 'class' => 'form-login' ,'method'=> 'POST']) !!}
                    <h2>Bienvenido</h2>
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
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Correo</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                {!! Form::close() !!}
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>