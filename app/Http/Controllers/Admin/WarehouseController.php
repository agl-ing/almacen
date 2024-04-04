<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Warehouse;
use App\Http\Requests\StoreWarehouseRequest;
use App\Http\Requests\UpdateWarehouseRequest;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = Warehouse::get();

        return view(
            'admin.warehouses.index',
            [
                'warehouses' => $warehouses
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "admin.warehouses.create",
            [
                'action'    => true
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouseRequest $request)
    {
        $warehouse = Warehouse::create($request->all());

        return redirect()->route('warehouses.edit', $warehouse->id)
        ->with('info', '**Almacen creado con éxito**');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse)
    {
        return view(
            "admin.warehouses.edit",
            [
                'action'    => false,
                'warehouse' => $warehouse
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->fill($request->all())->save();

        return redirect()->route('warehouses.edit', $warehouse->id)
        ->with('info', '**Almacen actualizado con éxito**');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        if($warehouse->status == 1){
            $warehouse->status = 0;
            $messageStatus = 'desactivado';
        }else{
            $warehouse->status = 1;
            $messageStatus = 'activado';
        }

        $warehouse->fill([$warehouse->status])->save();

        return redirect()->route('warehouses.index')
        ->with('info', '**Almacen '.$messageStatus.' con éxito');
    }
}
