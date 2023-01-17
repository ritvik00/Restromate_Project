<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addons;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class AddonsController extends Controller
{
    public function index()
    {
        $offer = Addons::all();
        return view('addons.list')->withoffer($offer);
    }

    public function create()
    {
        return view("addons.create");
    }

    public function active($id,$active)
    {
      

        $user = Addons::find($id);

        if (empty($user)) {
            return redirect()->route('addons')->with('message', 'Addons Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('addons')->with('message', 'Addons Status Updated Successfully. ');

    }


    public function delete($id){

        $offer = Addons::find($id);


        $image_path = public_path().'/images/product/'.$offer->image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        
        
        $offer->delete();
        return redirect()->route('addons')->with('message', 'Addons Deleted Successfully.');

    }

    public function edit($id){

        $offer = Addons::find($id);
        return view('addons.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->all());

        if($request->id == null){
            $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'calories' => 'required',
            'price' => 'required',
        ],
        [
            'title.required'=>'This field is required.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'calories.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'price.required'=>'This field is required.',
        ]);
        }
        else{
        $request->validate([
            'title' => 'required',
            // 'old_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'description' => 'required',
            'calories' => 'required',
            'price' => 'required',
        ],
        [
            'title.required'=>'This field is required.',
            // 'old_image.required'=>'This field is required.',
            // 'old_image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'old_image.max'=>'You can upload maximim 2mb size.',
            // 'old_image.uploaded'=>'You can upload maximim 2mb size.',
            'calories.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'price.required'=>'This field is required.',
           
        ]);

        }

        $offerimage = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $name);
            $offerimage = $name;
        }
        else 
        {
            $offerimage = $request->old_image;
        }

        $banner_image = null;

        $id = Auth::user()->id;
        $data = $request->all();
        if ($request->id == null) 
        {

      


        $articledata = Addons::create([
            'title'           => $data['title'],
            'description'           => $data['description'],
            'calories'           => $data['calories'],
            'price'           => $data['price'],
            'image'          => $offerimage,
            'user_id'        => $id,
        ]);

        return redirect()->route('addons')->with('message', 'Addons Created  Successfully.');
        }

        else
        {

            $slider =  Addons::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/product/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }
        

            $slider->update([
                    'title'           => $data['title'],
                    'description'           => $data['description'],
                    'calories'           => $data['calories'],
                    'price'           => $data['price'],
                    'image'          => $offerimage,
                    'user_id'        => $id,
                   
                ]);
                return redirect()->route('addons')->with('message', 'Addons Updated  Successfully.');

        }

    }
}
