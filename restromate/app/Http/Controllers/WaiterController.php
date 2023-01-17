<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waiter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class WaiterController extends Controller
{
    public function index()
    {   
        $waiter = Waiter::all();
        return view("waiter.list")->withwaiter($waiter);
    }

    public function active($id,$active)
    {
      

        $user = Waiter::find($id);

        if (empty($user)) {
            return redirect()->route('waiter')->with('message', 'Waiter Id Not Found.');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('waiter')->with('message', 'Waiter Status Updated Successfully. ');

    }

    public function create()
    {
        return view("waiter.create");
    }

    public function edit($id){

        $editgroup = Waiter::find($id);
        return view('waiter.create')->withwaiter($editgroup);

    }

    public function store(Request $request)
    {
        // dd($request->id);

        
        if ($request->id == null) 
        {
            // dd($request->id);
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:waiter',
            'phone' =>  'required|numeric|digits:10',
            'restaurant_name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'start_date' => 'required',
        ],
        [
            'name.required'=>'This field is required.',
            'email.required'=>'This field is required.',
            'email.unique'=>'The waiter email has already been taken.',
            'phone.required'=>'This field is required.',
            'phone.digits' =>'Please Enter 10 Digits Number.',
            'restaurant_name.required'=>'This field is required.',
            'start_date.required'=>'This field is required.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
        ]);

        }else{
            // dd($request->id);

        $request->validate([
            'name' => 'required',
            // 'email' => 'required',
            'phone' =>  'required|numeric|digits:10',
            'restaurant_name' => 'required',
            // 'oldimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'start_date' => 'required',
        ],
        [
            'name.required'=>'This field is required.',
            // 'email.required'=>'This field is required.',
            // 'email.unique'=>'The waiter email has already been taken.',
            'phone.required'=>'This field is required.',
            'phone.digits' =>'Please Enter 10 Digits Number.',
            'restaurant_name.required'=>'This field is required.',
            'start_date.required'=>'This field is required.',
            // 'oldimage.required'=>'This field is required.',
            // 'oldimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'oldimage.max'=>'You can upload maximim 2mb size.',
            // 'oldimage.uploaded'=>'You can upload maximim 2mb size.',
        ]);

        }


        $photo = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/waiter');
            $image->move($destinationPath, $name);
            $photo = $name;
        }
        else 
        {
            $photo = $request->oldimage;

        }

        $data = $request->all();
        if ($request->id == null) 
        {

       
            // dd($data);

        $articledata = Waiter::create([
            'name'              => $data['name'],
            'email'             => $data['email'],
            'phone'             => $data['phone'],
            'restaurant_name'   => $data['restaurant_name'],
            'start_date'        => $data['start_date'],
            'image'             => $photo,
        ]);

        return redirect()->route('waiter')->with('message', 'Waiter Created Successfully.');
        }
        else
        {
            $slider =  Waiter::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/waiter/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

                $slider->update([
                    'name'              => $data['name'],
                    'email'             => $data['email'],
                    'phone'             => $data['phone'],
                    'restaurant_name'   => $data['restaurant_name'],
                    'start_date'        => $data['start_date'],
                    'image'             => $photo,
                ]);
                return redirect()->route('waiter')->with('message', 'Waiter Updated Successfully.');

        }
       
    }

    public function delete($id){

        $slider = Waiter::find($id);
        $image_path = public_path().'/images/waiter/'.$slider->image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $slider->delete();
        return redirect()->route('waiter')->with('message', 'Waiter Deleted Successfully.');

    }

}
