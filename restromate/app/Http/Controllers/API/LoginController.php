<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController as BaseController;

class LoginController extends BaseController
{
    public function login(Request $request)
    {


        // dd("login");
    
        $login=DB::table('users')->where("email",$request->email)->first();

        if($login == null)
        {
             return response()->json(["success"=>false,"error"=>"Email don't match "]);
        }
        else
        {
            
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($data)) {							
                // if(token($request->token) == "false")
                // {
                //     return response()->json(["success"=>false,"error"=>"token  don't match"]);
                // }
                $userdata = [
                    'ID' => $login->id,
                    'Token' => $login->remember_token
                ];

                    return response()->json(["success"=>true,"messege"=>"User login Successfully.", "data"=>$userdata]);
              }
              else
              {
                  return response()->json(["success"=>false,"error"=>"password don't match"]);
              }
            }      
    }  


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phoneno' => 'required|numeric|digits:10|regex:/^([0-9\s\-\+\(\)]*)$/',
        ]);
        if($validator->fails()){
            return response()->json(["success"=>false,"error"=>$validator->errors()]);      
        }

        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'full_name' => $request->full_name,
            'phoneno' => $request->phoneno,
            'is_active' => '0',
            'role_id' => 3
        
        ]);
        
       return response()->json(["success"=>true,"messege"=>"User Register Successful.", "User"=>$user]);


    }
}
