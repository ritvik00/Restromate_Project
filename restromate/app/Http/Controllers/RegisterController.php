<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class RegisterController extends Controller
{

    public function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneno' => ['required', 'numeric','digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



    protected function registercompany(Request $request)
    {

        $request->validate([
            'user_name'=>'required',
            'full_name'=>'required',
             'email' => 'required|unique:users',
             'phoneno' => 'required|numeric|digits:10',
            ],
            [
                'user_name.required'=>'This field is required.',
                'full_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'phoneno.required' =>'This field is required.',
            ]);


            $data = $request->all();

        User::create([
             'user_name' => $data['user_name'],
             'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'is_active' => '0',
            'role_id' => 3
        ]);
        return redirect()->route('login')->with('message', 'company created  Successfully .. please check you mail ... ');
        
    }
}
