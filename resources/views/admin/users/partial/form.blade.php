<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="name" class="form-label">Nombre*</label>
            {{ Form::text('name', null, [
                    'id' => 'name', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba el nombre del usuario',
                    'required' => true
            ]) }}
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="tradename" class="form-label">Email*</label>
            {{ Form::text('email', null, [
                    'id' => 'email', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba el correo eléctronica',
                    'required' => true
            ]) }}
        </div>
    </div>
</div>

<div class="row">
    @if($action)
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="name" class="form-label">Password*</label>
            {{ Form::password('password',[
                    'id' => 'password', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba la contraseña',
                    'required' => true
            ]) }}
        </div>
    </div>
    @endif
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="estatus" class="form-label">Estatus*</label>
            {{ Form::select('status', ['1' => 'Activo', '0' => 'Inactivo'],null, 
                [
                    'class'=> 'form-control'
            ]) }}
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary">
    @if($action) Guardar @else Actualizar @endif
</button>