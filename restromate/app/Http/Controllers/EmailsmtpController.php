<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Emailsmtp;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class EmailsmtpController extends Controller
{
    public function index()
    {
        $ID= Auth::user()->id;
        $user = Emailsmtp::find($ID);
        return view('emailsmtp.index')->withsmtp($user);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $id = Auth::user()->id;

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'smtphost' => 'required',
            'smtpport' => 'required',
            'contenttype' => 'required',
            'smtpencryption' => 'required',
        ],
        [
            'email.required'=>'This field is required.',
            'password.required'=>'This field is required.',
            'smtphost.required'=>'This field is required.',
            'smtpport.required'=>'This field is required.',
            'contenttype.required'=>'This field is required.',
            'smtpencryption.required'=>'This field is required.',
        ]);

        if($request->id == null){
            $data = $request->all();
            $articledata = Emailsmtp::create([
                'email'           => $data['email'],
                'password'             => $data['password'],
                'smtphost'          => $data['smtphost'],
                'smtpport'            => $data['smtpport'],
                'user_id'          =>$id,
                'contenttype'            => $data['contenttype'],
                'smtpencryption'          => $data['smtpencryption'],
            ]);

            return redirect()->route('emailsmtp')->with('message', 'Emailsmtp Created Successfully.');
        }

        else{

        $firebase = DB::table("emailsmtp")
        ->where("id", $request->id)
        ->update([
            'email' => $request->email,
            'password' => $request->password,
            'smtphost' => $request->smtphost,
            'smtpport' => $request->smtpport,
            'contenttype' => $request->contenttype,
            'user_id' => $id,
            'smtpencryption' =>  $request->smtpencryption
        ]);

        return redirect()->route('emailsmtp')->with('message', 'Emailsmtp Setting Updated Successfully.');
    }
    }

}
