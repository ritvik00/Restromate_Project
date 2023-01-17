<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Auth;

class SystemUserController extends Controller
{
    





    public function validator(array $data)
    {
        return Validator::make($data, [
            'user_name' => ['required', 'string', 'max:255'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phoneno' => ['required', 'numeric','digits:10', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }



    protected function store(Request $request)
    {   
        // dd($request->all());
        if ($request->id == null) 
        {

        $request->validate([
            'user_name'=>'required',
            'full_name'=>'required',
            'email' => 'required|unique:users',
            // 'phoneno' => 'required|numeric|digits:10',
            'photo'=>'required',
            'is_active'=>'required',
            'role_id'=>'required',
            'address' => 'required',
            'password' => 'required',
            ],
            [
                'user_name.required'=>'This field is required.',
                'full_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'phoneno.required' =>'This field is required.',
                'photo.required' =>'This field is required.',
                'is_active.required' =>'This field is required.',
                'role_id.required' =>'This field is required.',
                'address.required' =>'This field is required.',
                'password.required' =>'This field is required.',
            ]);
        }
        else{
            // dd($request->all());
            $request->validate([
            'user_name'=>'required',
            'full_name'=>'required',
             'email' => 'required',
             'phoneno' => 'required|numeric|digits:10',
            //  'oldphoto'=>'required', 
             'is_active'=>'required',
             'role_id'=>'required',
             'address' => 'required',
            ],
            [
                'user_name.required'=>'This field is required.',
                'full_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'This field is required.',
                'phoneno.required' =>'This field is required.',
                // 'oldphoto.required' =>'This field is required.',
                'is_active.required' =>'This field is required.',
                'role_id.required' =>'This field is required.',
                'address.required' =>'This field is required.',
            ]);

        }

        $photo = null;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/user');
            $image->move($destinationPath, $name);
            $photo = $name;
        }
        else 
        {
            $photo = $request->oldphoto;

        }

        $data = $request->all();
        if ($request->id == null) 
        {

        

        User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'password' => Hash::make($data['password']),
            'is_active' => $data['is_active'],
            'address' => $data['address'],
            'photo'=>$photo,
            'role_id' => $data['role_id']
        ]);
            return redirect()->route('systemuser')->with('message', 'Systemuser Created Successfully.');
        }
        else{

            $promocode =  User::find($request->id);

           if ($request->hasFile('photo')) {
            $image_path = public_path().'/uploads/user/'.$promocode->photo;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }



            $promocode->update([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            // 'password' => Hash::make($data['password']),
            'is_active' => $data['is_active'],
            'address' => $data['address'],
            'photo'=>$photo,
            'role_id' => $data['role_id']
            ]);
            return redirect()->route('systemuser')->with('message', 'Systemuser Updated Successfully.');

        }
        
    }


    public function index()
    {
        $promo = User::all();
        return view('systemuser.list')->withpromo($promo);
    }

    public function create()
    {
        return view("systemuser.create");
    }

    public function edit($id){

        $promo = User::find($id);
        return view('systemuser.create')->withpromo($promo);

    }
    public function delete($id){

        $promo = User::find($id);

        $image_path = public_path().'/uploads/user/'.$promo->photo;
        // dd($image_path);
    
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        
        $promo->delete();
        return redirect()->route('systemuser')->with('message', 'Systemuser Deleted Successfully.');

    }
}
