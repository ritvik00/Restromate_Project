<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use Illuminate\Support\Facades\Hash;



class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view("slider.list")->withslider($slider);
    }

    public function create()
    {
        $cat =  Category::all();
        $pct =  Product::all();
        return view("slider.create")->withcat($cat)->withpct($pct);
    }

    public function edit($id){

        $editgroup = Slider::find($id);
        $cat =  Category::all();
        $pct =  Product::all();
        return view('slider.create')->withslider($editgroup)->withcat($cat)->withpct($pct);

    }   
    

    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->id == null) 
        {
        
        $request->validate([
            'type' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
        [
            'type.required'=>'This field is required.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(jpeg,png,jpg,gif,svg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'image.image'=>'Image Upload Only This Format(jpeg,png,jpg,gif,svg).',
        ]);

        }else{
        // dd($request->all());
        $request->validate([
            'type' => 'required',
            'oldimage' => 'required',
            
        ],
        [
            'type.required'=>'This field is required.',
            'oldimage.required'=>'This field is required.',
           
        ]);

        }

        $photo = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/slider');
            $image->move($destinationPath, $name);
            $photo = $name;
        }
        else 
        {
            $photo = $request->oldimage;

        }
        $data = $request->all();


        if($request->type == 'category'){
            $cat = $request->category_id;
        }
        else {
            $cat = null;
        }

        if($request->type == 'product'){
            $pro = $request->product_id;
        }
        else {
            $pro = null;
        }


        $id = Auth::guard()->user()->id;


        if ($request->id == null) 
        {

        $articledata = Slider::create([
            'type'           => $data['type'],
            'category_id'    =>$cat,
            'product_id'     =>$pro,
            'image'          => $photo,
            'createdby'      =>$id,
        ]);

        return redirect()->route('slider')->with('message', 'Slider Created  Successfully.');
        }
        else
        {
           $slider =  Slider::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/slider/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

            $slider->update([
                    'type'           => $data['type'],
                    'category_id'    =>$cat,
                    'product_id'     =>$pro,
                    'image'          => $photo, 
                    'modifiedby'     =>$id,
                ]);
                return redirect()->route('slider')->with('message', 'Slider Updated  Successfully.');
        }
    }

    public function delete($id){
        
        $news = Slider::findOrFail($id);
        $image_path = public_path().'/images/slider/'.$news->image;
        // dd($image_path);
    
        if (File::exists($image_path)) {
            unlink($image_path);
        }  
             
        $news->delete();
        return redirect()->route('slider')->with('message', 'Slider Deleted Successfully.');
    }

}
