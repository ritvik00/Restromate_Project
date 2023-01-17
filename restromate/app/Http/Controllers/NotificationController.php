<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class NotificationController extends Controller
{
    public function index()
    {
        $product = Notification::leftjoin('category','notification.category_id','category.id')
        ->select('notification.*','category.name as category_id')
        ->get();

        return view('notification.list')->withproduct($product);
    }

    public function create()
    {
       $cat =  Category::all();
       return view('notification.create')->withcat($cat);
    }

    public function delete($id)
    {

        $offer = Notification::find($id);
        $image_path = public_path().'/images/notification/'.$offer->image;
        // dd($image_path);
    
        if (File::exists($image_path)) {
            unlink($image_path);
        }
      
        $offer->delete();
        return redirect()->route('notification')->with('message', 'Notification Deleted Successfully.');

    }

    public function edit($id){

        $cat =  Category::all();
        $promo = Notification::find($id);
        return view('notification.create')->withpromo($promo)->withcat($cat);

    }

    public function store(Request $request)
    {
        
        if($request->id == null){
            $request->validate([
            'type' => 'required',
            // 'category_id' => 'required',
            'title' => 'required',
            'message' => 'required',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'type.required'=>'This field is required.',
            // 'category_id.required'=>'This field is required.',
            'title.required'=>'This field is required.',
            // 'image.required'=>'This field is required111.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'message.required'=>'This field is required.',
        ]);

        }
        else{

        $request->validate([
            'type' => 'required',
            // 'category_id' => 'required',
            'title' => 'required',
            'message' => 'required',
            // 'old_image' => 'mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'type.required'=>'This field is required.',
            // 'category_id.required'=>'This field is required.',
            'title.required'=>'This field is required.',
            'message.required'=>'This field is required.',
            // 'old_image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            // 'old_image.max'=>'You can upload maximim 2mb size.',
            // 'old_image.uploaded'=>'You can upload maximim 2mb size.',
        ]);

        }

        $offerimage = null;

        if ($request->hasFile('image')) {   
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/notification');
            $image->move($destinationPath, $name);
            $offerimage = $name;
        }
        else 
        {
            $offerimage = $request->old_image;
        }

        $id = Auth::user()->id;
        $data = $request->all();

        if($request->type == 'category'){
            $cat = $request->category_id;
        }
        else {
            $cat = null;
        }

        if ($request->id == null) 
        {

        $articledata = Notification::create([
            'type'           => $data['type'],
            'category_id'    => $cat,
            'title'          => $data['title'],
            'message'        => $data['message'],
            'image'          => $offerimage,
            'user_id'        => $id,
        ]);

        return redirect()->route('notification')->with('message', 'Notification Created Successfully.');
        }

        else
        {
            $slider =  Notification::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/notification/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

                $slider->update([
                    'type'           => $data['type'],
                    'category_id'    => $cat,
                    'title'          => $data['title'],
                    'message'        => $data['message'],
                    'image'          => $offerimage,
                    'user_id'        => $id,
                   
                ]);
                return redirect()->route('notification')->with('message', 'Notification Updated Successfully.');
        }
    }
}
