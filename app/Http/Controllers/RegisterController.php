<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //
     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        //return "false";

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        $user = User::create([
            'name' => $request->input('name'),
            'email' =>  $request->input('email'),
            'password' => Hash::make( $request->input('password')),
        ]);

         $response=[
            "success"=>true,
            "msg"=>"Usuário Registrado!",
            "data"=>$user
        ];
        
        return $response;
    }
}
