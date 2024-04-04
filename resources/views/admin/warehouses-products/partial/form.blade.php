<div class="row">
    <div class="col-md-4 col-12">
        <div class="form-group">
            <label for="estatus" class="form-label">Almacen*</label>
            {{ Form::select('warehouse_id', [$warehouse->id => $warehouse->name],null, 
                [
                    'class'=> 'form-control'
            ]) }}
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="form-group">
            <label for="product_id" class="form-label">Productos*</label>
            {{ Form::select('product_id', $products,null, 
                [
                    'class'=> 'form-control'
            ]) }}
        </div>
    </div>
    <div class="col-md-4 col-12">
        <div class="form-group">
            <label for="name" class="form-label">Cantidad*</label>
            {{ Form::text('qty', null, [
                    'id' => 'qty', 
                    'class'=> 'form-control',
                    'placeholder' => 'Escriba el stock',
                    'required' => true
            ]) }}
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">
    @if($action) Guardar @else Actualizar @endif
</button>