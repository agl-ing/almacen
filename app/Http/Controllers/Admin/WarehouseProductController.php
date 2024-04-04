<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Warehouse_Product;
use App\Http\Requests\StoreWarehouse_ProductRequest;
use App\Http\Requests\UpdateWarehouse_ProductRequest;

use Illuminate\Http\Request;

class WarehouseProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouse_Products = Warehouse_Product::get();

        return view(
            'admin.warehouses-products.index',
            [
                'warehouse_Products' => $warehouse_Products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $exist = Warehouse_Product::where('warehouse_id', $request->input('whId'))->first();

        if($exist == null){
            $products  = Product::where('status', 1)->get()->pluck('name', 'id');
        }else{
            $products  = Product::where([
                ['status', '=', 1],
                ['id', '=', $exist->product_id]
            ])->get()->pluck('name', 'id');
        }
    
        $warehouse = Warehouse::find($request->input('whId'));

        return view(
            "admin.warehouses-products.create",
            [
                'action'    => true,
                'products'  => $products,
                'warehouse' => $warehouse
            ]
        );
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWarehouse_ProductRequest $request)
    {
        $warehouse_Product = Warehouse_Product::create($request->all());

        return redirect()->route('warehouses-products.edit', $warehouse_Product->id)
        ->with('info', '**Almacen - Producto creado con éxito**');
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse_Product $warehouse_Product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $warehouses_product)
    {
        $warehouses_Product = Warehouse_Product::find($warehouses_product);
        $products  = Product::where('status', 1)->get()->pluck('name', 'id');
        $warehouse = Warehouse::find($warehouses_Product->warehouse_id);
        
        return view(
            "admin.warehouses-products.edit",
            [
                'action'            => false,
                'products'          => $products,
                'warehouse'         => $warehouse,
                'warehouse_Product' => $warehouses_Product
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWarehouse_ProductRequest $request, String $warehouses_product)
    {
    
        $warehouses_Product = Warehouse_Product::find($warehouses_product);
        $warehouses_Product->fill($request->all())->save();

        return redirect()->route('warehouses-products.edit', $warehouses_Product->id)
        ->with('info', '**Almacen - Producto actualizado con éxito**');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse_Product $warehouse_Product)
    {
        //
    }

    public function selectWarehouses(){
        $warehouses = Warehouse::get();

        return view(
            "admin.warehouses-products.selectWarehouses",
            [
                'warehouses' => $warehouses
            ]
        );
    }

    public function validateWarehouse(string $id){
        $exist = Warehouse_Product::where('warehouse_id', $id)->first();

        return redirect()->route('warehouses-products.create', ['whId' => $id])
            ->with('info', '**Agrega un producto al almacen**');

        /**if($exist == null){
            return redirect()->route('warehouses-products.create', ['whId' => $id])
            ->with('info', '**Agrega un producto al almacen**');
        }else{
            return redirect()->route('warehouses-products.edit', $exist->id)
            ->with('info', '**Actualiza tu stock**');
        }**/

    }
}
