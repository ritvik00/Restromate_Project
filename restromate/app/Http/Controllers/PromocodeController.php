<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocode;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class PromocodeController extends Controller
{
    public function index()
    {
        $promo = Promocode::all();
        return view('promocode.list')->withpromo($promo);
    }


    public function active($id,$active)
    {
      

        $user = Promocode::find($id);

        if (empty($user)) {
            return redirect()->route('promocode')->with('message', 'Promocode Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('promocode')->with('message', 'Promocode Status Updated Successfully. ');

    }

    public function create()
    {
        return view("promocode.create");
    }

    public function edit($id){

        $promo = Promocode::find($id);
        return view('promocode.create')->withpromo($promo);

    }


    public function store(Request $request)
    {


        if ($request->id == null) 
        {
        
        
        $request->validate([
            'promocode' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',
            'discount' => 'required',
            'discount_type' => 'required',
            'repeat_use' => 'required',
        ],
        [
            'promocode.required'=>'This field is required.',
            'start_date.required'=>'This field is required.',
            'end_date.after_or_equal'=>'Please Select After Start Date.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'end_date.required'=>'This field is required.',
            'discount.required'=>'This field is required.',
            'discount_type.required'=>'This field is required.',
            'repeat_use.required'=>'This field is required.',
        ]);

        }
        else
        {


        $request->validate([
            'promocode' => 'required',
            'start_date' => 'required|date_format:Y-m-d',
            // 'oldimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'end_date' => 'required|date_format:Y-m-d|after_or_equal:start_date',   
            'discount' => 'required',
            'discount_type' => 'required',
            'repeat_use' => 'required',
            
        ],
        [
            'promocode.required'=>'This field is required.',
            'start_date.required'=>'This field is required.',
            'end_date.after_or_equal'=>'Please Select After Start Date.',
            // 'oldimage.required'=>'This field is required.',
            // 'oldimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'oldimage.max'=>'You can upload maximim 2mb size.',
            // 'oldimage.uploaded'=>'You can upload maximim 2mb size.',
            'end_date.required'=>'This field is required.',
            'discount.required'=>'This field is required.',
            'discount_type.required'=>'This field is required.',
            'repeat_use.required'=>'This field is required.',
        ]);
        // dd("hello");

        }

        $photo = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/promocode');
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

      


        $articledata = Promocode::create([
            'promocode'           => $data['promocode'],
            'message'             => $data['message'],
            'start_date'          => $data['start_date'],
            'end_date'            => $data['end_date'],
            'discount'            => $data['discount'],
            'discount_type'       => $data['discount_type'],
            'repeat_use'          => $data['repeat_use'],
            'image'               => $photo,
        ]);

        return redirect()->route('promocode')->with('message', 'Promocode Created  Successfully.');
        }
        else
        {
            $slider =  Promocode::find($request->id);

            if ($request->hasFile('image')) {
             $image_path = public_path().'/images/promocode/'.$slider->image;
             if (File::exists($image_path)) {
                 unlink($image_path);
             }
             }
        
                $slider->update([
                    'promocode' => $request->promocode,
                    'message' => $request->message,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'discount' => $request->discount,
                    'discount_type' => $request->discount_type,
                    'repeat_use' => $request->repeat_use,
                    'image' => $photo
                ]);
                return redirect()->route('promocode')->with('message', 'Promocode Updated  Successfully.');

        }

    }

    public function delete($id){

        $promo = Promocode::find($id);
        $promo->delete();
        return redirect()->route('promocode')->with('message', 'Promocode Deleted Successfully.');

    }

}
