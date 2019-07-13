<?php

namespace App\Http\Controllers;

use \App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user))
            return ['status' => 'User Not Found'];
        else
            return $user;
    }

    public function store(Request $request)
    {
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user))
            return ['status' => 'User Not Found'];
        else
            $user->update($request->all());

        return $user;
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user))
            return ['status' => 'User Not Found'];
        else
            $user->delete();

        return $user;
    }

}
