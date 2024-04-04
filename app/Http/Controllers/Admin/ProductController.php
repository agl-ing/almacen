<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Provider;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();

        return view(
            'admin.products.index',
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = Provider::pluck('name', 'id');
        return view(
            "admin.products.create",
            [
                'action'    => true,
                'providers' => $providers
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('products.edit', $product->id)
        ->with('info', '**Producto creado con éxito**');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $providers = Provider::pluck('name', 'id');

        return view(
            "admin.products.edit",
            [
                'product'  => $product,
                'providers' => $providers,
                'action'   => false
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->all())->save();

        return redirect()->route('products.edit', $product->id)
        ->with('info', '**Producto actualizado con éxito**');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->status == 1){
            $product->status = 0;
            $messageStatus = 'desactivado';
        }else{
            $product->status = 1;
            $messageStatus = 'activado';
        }

        $product->fill([$product->status])->save();

        return redirect()->route('products.index')
        ->with('info', '**Producto '.$messageStatus.' con éxito');
    }
}
