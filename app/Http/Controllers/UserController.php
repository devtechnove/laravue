<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
         /**
     * Create a new controller instance.
     *
     * @return void
     */



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        return      $users;

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\UserRequest  $request
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $user = User::create([
            'name' => $request['name'],
            'status' => $request['status'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'type' => $request['roles'],
        ]);

        return json_encode(['success' => true, 'user_id' => $user->id]);
    }

    /**
     * Update the resource in storage
     *
     * @param  \App\Http\Requests\Users\UserRequest  $request
     * @param $id
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        //dd($request->roles);

        $user = User::findOrFail($id);
        $user->update($request->except('roles'));

        if (!empty($request->password)) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        if ($request->has('roles'))
        {
            $user->syncRoles($request->roles);
        }

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->type = $request->roles;
        $user->status = $request->status;
        $user->save();

        return json_encode(['success' => true, 'user_id' => $user->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //$this->authorize('isAdmin');

        $user = User::findOrFail($id);
        // delete the user

        $user->delete();

        return json_encode(['success' => true]);
    }
}
