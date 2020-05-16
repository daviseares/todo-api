<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $email = $request->input('email');
        $validation =  User::where('email','=',$email)->get();

        if(count($validation) > 0){
            $response =[
                'success'=>false,
                "msg"=>"Já existe um usuário cadastrado com esse email",
            ];

        }else{
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255','unique:users,email'],
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
        }
        
        return  $response;
    }

    /**
     * Get All Users;
     *
     * @return $response
     */

    public function index(){
        $response =[
            'succes'=>true,
            'data'=>User::all()
        ];
        return  $response;
    }

    /**
     * Update User;
     *
     * @param Request $request
     * @param User $user
     * @return $response
     */
    public function update(Request $request){
        $id = $request->input('id');

        $email = $request->input('email');
        $validation =  User::where('email','=',$email)->get();

        if(count($validation) > 0){
            $response =[
                'success'=>false,
                "msg"=>"Já existe um usuário cadastrado com esse email",
            ];
            return $response;
        } else {
            $user = User::find($id);

            $request->validate([
                'name'=>'required|max:255',
                    
            ]);

            $user->name = $request -> input('name');
            $user->email = $request -> input('email');
            $user->save();
            
            $response=[
                "success"=>true,
                "msg"=>"Tarefa atualizada!",
                "data"=>$user
            ];
            
            return $response;
        } 
    }

    /**
     * Delete User
     *
     * @param User $user
     * @return $response
     */
    public function destroy(User $user){
        $user->delete();

        $response=[
            "success"=>true,
            "msg"=>"Usuário excluído!"
        ];
        
        return $response; 
    }
}
