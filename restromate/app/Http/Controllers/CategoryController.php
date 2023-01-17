<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class CategoryController extends Controller
{
    public function index()
    {
        $offer = Category::all();
        return view('category.list')->withoffer($offer);
    }

    public function create()
    {
        return view("category.create");
    }

    public function active($id,$active)
    {
      

        $user = Category::find($id);

        if (empty($user)) {
            return redirect()->route('category')->with('message', 'Category Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('category')->with('message', 'Category Status Updated Successfully. ');

    }


    public function delete($id){

        $offer = Category::find($id);


        $image_path = public_path().'/images/category/'.$offer->image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        

        $image_path = public_path().'/images/category/'.$offer->banner_image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        
        
        $offer->delete();
        return redirect()->route('category')->with('message', 'Category Deleted Successfully.');

    }

    public function edit($id){

        $offer = Category::find($id);
        return view('category.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->all());

        if($request->id == null){
            $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'banner_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'name.required'=>'This field is required.',
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
            'name' => 'required',
            // 'old_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'old_banner_image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'name.required'=>'This field is required.',
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
            $destinationPath = public_path('/images/category');
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
            $destinationPath = public_path('/images/category');
            $image->move($destinationPath, $name);
            $banner_image = $name;
        }
        else 
        {
            $banner_image = $request->old_banner_image;
        }
        $data = $request->all();
        $id = Auth::user()->id;
        if ($request->id == null) 
        {

       


        $articledata = Category::create([
            'name'           => $data['name'],
            'banner_image'   => $banner_image,
            'image'          => $offerimage,
            'user_id'        => $id,
        ]);

        return redirect()->route('category')->with('message', 'Category Created Successfully.');
        }

        else
        {


            $slider =  Category::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/category/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }
            
            if ($request->hasFile('banner_image')) {
                $image_path = public_path().'/images/category/'.$slider->banner_image;
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
                }
        

            $slider->update([
                'name'           => $data['name'],
                'banner_image'   => $banner_image,
                'image'          => $offerimage,
                'user_id'        => $id,
                   
                ]);
                return redirect()->route('category')->with('message', 'Category Updated Successfully.');

        }

    }
}
