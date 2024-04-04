<div class="row">
    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="name" class="form-label">Nombre*</label>
            {{ Form::text('name', null, [
                    'id' => 'name', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba el nombre del proveedor',
                    'required' => true
            ]) }}
        </div>
    </div>

    <div class="col-md-6 col-12">
        <div class="form-group">
            <label for="tradename" class="form-label">Nombre Comercial*</label>
            {{ Form::text('tradename', null, [
                    'id' => 'tradename', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba el nombre comercial del proveedor',
                    'required' => true
            ]) }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-12">
        <div class="form-group">
            <label for="description" class="form-label">Descripción</label>
            {{ Form::text('description', null, [
                    'id' => 'description', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba alguna descripción',
                    'required' => true
            ]) }}
        </div>
    </div>
    <div class="col-md-4 col-12">
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