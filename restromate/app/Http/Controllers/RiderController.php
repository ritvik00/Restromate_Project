<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Auth;

class RiderController extends Controller
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
             'phoneno' => 'required|numeric|digits:10',
             'photo'=>'required',
             'commision_method'=>'required',
             'serviceble_city' => 'required',
             'is_active'=>'required',
             'address' => 'required',
             'password' => 'required',
            ],
            [
                'user_name.required'=>'This field is required.',
                'full_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'The company email has already been taken.',
                'commision_method.required' =>'This field is required.',
                'serviceble_city.required' =>'This field is required.',
                'phoneno.required' =>'This field is required.',
                'photo.required' =>'This field is required.',
                'is_active.required' =>'This field is required.',
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
             'commision_method'=>'required',
             'serviceble_city' => 'required',
            //  'oldphoto'=>'required', 
             'is_active'=>'required',
             'address' => 'required',
            ],
            [
                'user_name.required'=>'This field is required.',
                'full_name.required'=>'This field is required.',
                'email.required'=>'This field is required.',
                'email.unique'=>'This field is required.',
                'phoneno.required' =>'This field is required.',
                'commision_method.required' =>'This field is required.',
                'serviceble_city.required' =>'This field is required.',
                // 'oldphoto.required' =>'This field is required.',
                'is_active.required' =>'This field is required.',
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

    
        // dd($data);

        User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'password' => Hash::make($data['password']),
            'is_active' => $data['is_active'],
            'address' => $data['address'],
            'commision_method' => $data['commision_method'],
            'serviceble_city' => $data['serviceble_city'],
            'photo'=>$photo,
            'role_id' => '4'
        ]);
            return redirect()->route('rider')->with('message', 'Delivery Boy Created  Successfully.');
        }
        else{
            $slider =  User::find($request->id);

           if ($request->hasFile('photo')) {
            $image_path = public_path().'/uploads/user/'.$slider->photo;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

            
            $slider->update([
                'user_name' => $data['user_name'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phoneno' => $data['phoneno'],
                // 'password' => Hash::make($data['password']),
                'is_active' => $data['is_active'],
                'address' => $data['address'],
                'commision_method' => $data['commision_method'],
                'serviceble_city' => $data['serviceble_city'],
                'photo'=>$photo,
                'role_id' => '4'
            ]);
            return redirect()->route('rider')->with('message', 'Delivery Boy Updated Successfully.');

        }
        
    }

    public function index()
    {
        $promo = User::all();
        return view('rider.list')->withpromo($promo);
    }

    public function create()
    {
        return view("rider.create");
    }

    public function edit($id)
    {
        $promo = User::find($id);
        return view('rider.create')->withpromo($promo);
    }

    public function delete($id){

        $promo = User::find($id);
        $image_path = public_path().'/uploads/user/'.$offer->photo;
        // dd($image_path);
    
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $promo->delete();
        return redirect()->route('rider')->with('message', 'Delivery Boy Deleted Successfully.');

    }
}
