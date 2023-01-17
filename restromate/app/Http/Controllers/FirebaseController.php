<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Firebase;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class FirebaseController extends Controller
{
    public function index()
    {
        $ID= Auth::user()->id;
        $user = Firebase::find($ID);
        return view('firebase.index')->withfirebase($user)->with('message', 'GeneralSetting Updated Successfully.');
    }

    public function store(Request $request)
    {

        $id = Auth::user()->id;

        $request->validate([
            'apikey' => 'required',
            'authdomain' => 'required',
            'databaseurl' => 'required',
            'projectid' => 'required',
            'storagebucket' => 'required',
            'messagingsenderid' => 'required',
            'appid' => 'required',
            'measurementid' => 'required',
        ],
        [
            'apikey.required'=>'This field is required.',
            'authdomain.required'=>'This field is required.',
            'databaseurl.required'=>'This field is required.',
            'storagebucket.required'=>'This field is required.',
            'projectid.required'=>'This field is required.',
            'messagingsenderid.required'=>'This field is required.',
            'appid.required'=>'This field is required.',
            'measurementid.required'=>'This field is required.',
        ]);

        if($request->id == null){
            $data = $request->all();
            $articledata = Firebase::create([
                'apikey'           => $data['apikey'],
                'authdomain'             => $data['authdomain'],
                'databaseurl'          => $data['databaseurl'],
                'messagingsenderid'            => $data['messagingsenderid'],
                'user_id'          =>$id,
                'appid'            => $data['appid'],
                'measurementid'       => $data['measurementid'],
                'projectid'          => $data['projectid'],
                'storagebucket'          => $data['storagebucket'],
            ]);

            return redirect()->route('firebase')->with('message', 'Firebase Created Successfully.');
        }

        else{

        $firebase = DB::table("firebase")
        ->where("id", $request->id)
        ->update([
            'apikey' => $request->apikey,
            'authdomain' => $request->authdomain,
            'databaseurl' => $request->databaseurl,
            'messagingsenderid' => $request->messagingsenderid,
            'appid' => $request->appid,
            'user_id' => $id,
            'measurementid' => $request->measurementid,
            'projectid' =>  $request->projectid,
            'storagebucket' =>  $request->storagebucket
        ]);

        return redirect()->route('firebase')->with('message', 'Firebase Setting Updated Successfully.');
    }
    }

}
