<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offers_Management;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class Offers_ManagementController extends Controller
{
    
    public function index()
    {
        $offer = Offers_Management::all();
        return view('offer.list')->withoffer($offer);
    }

    public function create()
    {
        return view("offer.create");
    }

    public function active($id,$active)
    {
      

        $user = Offers_Management::find($id);

        if (empty($user)) {
            return redirect()->route('offer')->with('message', 'Offer Id Not Found.');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('offer')->with('message', 'Offer Status Updated Successfully. ');

    }


    public function delete($id){

        $offer = Offers_Management::find($id);
        $image_path = public_path().'/images/offer/'.$offer->image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        

        $image_path = public_path().'/images/offer/'.$offer->banner_image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $offer->delete();
        return redirect()->route('offer')->with('message', 'Offer Deleted Successfully.');

    }

    public function edit($id){

        $offer = Offers_Management::find($id);
        return view('offer.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->id);

        if($request->id == null){
            $request->validate([
            'type' => 'required',
            'type_id' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'banner_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'type.required'=>'This field is required.',
            'type_id.required'=>'This field is required.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'banner_image.required'=>'This field is required.',
            'banner_image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'banner_image.max'=>'You can upload maximim 2mb size.',
            'banner_image.uploaded'=>'You can upload maximim 2mb size.',
        ]);
        }
        else{
        $request->validate([
            'type' => 'required',
            'type_id' => 'required',
            // 'old_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'old_banner_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'type.required'=>'This field is required.',
            'type_id.required'=>'This field is required.',
            // 'old_image.required'=>'This field is required.',
            // 'old_image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'old_image.max'=>'You can upload maximim 2mb size.',
            // 'old_image.uploaded'=>'You can upload maximim 2mb size.',
            // 'old_banner_image.required'=>'This field is required.',
            // 'old_banner_image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'old_banner_image.max'=>'You can upload maximim 2mb size.',
            // 'old_banner_image.uploaded'=>'You can upload maximim 2mb size.',
        ]);

        }

        $offerimage = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/offer');
            $image->move($destinationPath, $name);
            $offerimage = $name;
        }
        else 
        {
            $offerimage = $request->old_image;
        }

        $banner_image = null;

        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/offer');
            $image->move($destinationPath, $name);
            $banner_image = $name;
        }
        else 
        {
            $banner_image = $request->old_banner_image;
        }
        $id = Auth::user()->id;
        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Offers_Management::create([
            'type'           => $data['type'],
            'type_id'        => $data['type_id'],
            'banner_image'   => $banner_image,
            'image'          => $offerimage,
            'user_id'        => $id,
        ]);

        return redirect()->route('offer')->with('message', 'Offer Created Successfully.');
        }

        else
        {
            $slider =  Offers_Management::find($request->id);

            if ($request->hasFile('image')) {
             $image_path = public_path().'/images/offer/'.$slider->image;
             if (File::exists($image_path)) {
                 unlink($image_path);
             }
             }
             
             if ($request->hasFile('banner_image')) {
                 $image_path = public_path().'/images/offer/'.$slider->banner_image;
                 if (File::exists($image_path)) {
                     unlink($image_path);
                 }
                 }


                $slider->update([
                    'type' => $request->type,
                    'type_id' => $request->type_id,
                    'banner_image' => $banner_image,
                    'image' => $offerimage,
                    'user_id' => $id,
                   
                ]);
                return redirect()->route('offer')->with('message', 'Offer Updated Successfully.');

        }

    }

}
