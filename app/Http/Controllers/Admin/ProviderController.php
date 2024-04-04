<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $providers = Provider::get();

        return view(
            'admin.providers.index',
            [
                'providers' => $providers
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            "admin.providers.create",
            [
                'action' => true
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProviderRequest $request)
    {
        $provider = Provider::create($request->all());

        return redirect()->route('providers.edit', $provider->id)
        ->with('info', '**Proveedor creado con éxito**');
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        return view(
            "admin.providers.edit",
            [
                'provider' => $provider,
                'action'   => false
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        $provider->fill($request->all())->save();

        return redirect()->route('providers.edit', $provider->id)
        ->with('info', '**Proveedor actualizado con éxito**');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        if($provider->status == 1){
            $provider->status = 0;
            $messageStatus = 'desactivado';
        }else{
            $provider->status = 1;
            $messageStatus = 'activado';
        }

        $provider->fill([$provider->status])->save();

        return redirect()->route('providers.index')
        ->with('info', '**Proveedor '.$messageStatus.' con éxito');
    }
}
