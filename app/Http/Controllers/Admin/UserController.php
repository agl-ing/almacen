<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();

        return view(
            'admin.users.index',
            [
                'users' => $users
            ]
        );
    }

    /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       return view(
           "admin.users.create",
           [
               'action' => true
           ]
       );
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->all());

        return redirect()->route('users.edit', $user->id)
        ->with('info', '**Usuario creado con éxito**');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view(
            "admin.users.edit",
            [
                'user' => $user,
                'action'   => false
            ]
        );
    }


     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->all())->save();

        return redirect()->route('users.edit', $user->id)
        ->with('info', '**Usuario actualizado con éxito**');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if($user->status == 1){
            $user->status = 0;
            $messageStatus = 'desactivado';
        }else{
            $user->status = 1;
            $messageStatus = 'activado';
        }

        $user->fill([$user->status])->save();

        return redirect()->route('users.index')
        ->with('info', '**Usuario '.$messageStatus.' con éxito');
    }
}
