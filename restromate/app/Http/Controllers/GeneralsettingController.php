<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class GeneralsettingController extends Controller
{
    public function index()
    {
        $ID= Auth::user()->id;
        $user = Generalsetting::find($ID);
        return view('generalsetting.index')->withsetting($user)->with('message', 'GeneralSetting Updated Successfully.');
        
    }

    public function create()
    {
        return view("generalsetting.create");
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        if($request->id == null){
            $request->validate([
            'sitetitle' => 'required',
            'email' => 'required',
            'number' =>  'required|numeric|digits:10',
            'copyright' => 'required',
            'siteimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'faviconimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'address' => 'required',
            'description' => 'required',
            'mapiframe' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ],
        [
            'sitetitle.required'=>'This field is required.',
            'email.required'=>'This field is required.',
            'number.required'=>'This field is required.',
            'number.digits' =>'Please Enter 10 Digits Number.',
            'copyright.required'=>'This field is required.',
            'address.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'mapiframe.required'=>'This field is required.',
            'metakeywords.required'=>'This field is required.',
            'metadescription.required'=>'This field is required.',
            'facebook.required'=>'This field is required.',
            'twitter.required'=>'This field is required.',
            'youtube.required'=>'This field is required.',
            'instagram.required'=>'This field is required.',
            'siteimage.required'=>'This field is required.',
            'siteimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'siteimage.max'=>'You can upload maximim 2mb size.',
            'siteimage.uploaded'=>'You can upload maximim 2mb size.',
            'faviconimage.required'=>'This field is required.',
            'faviconimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'faviconimage.max'=>'You can upload maximim 2mb size.',
            'faviconimage.uploaded'=>'You can upload maximim 2mb size.',
        ]);
        }else{
        $request->validate([
            'sitetitle' => 'required',
            'email' => 'required',
            'number' =>  'required|numeric|digits:10',
            'copyright' => 'required',
            // 'old_siteimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            // 'old_faviconimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'address' => 'required',
            'description' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
            'youtube' => 'required',
            'mapiframe' => 'required',
            'metakeywords' => 'required',
            'metadescription' => 'required',
        ],
        [
            'sitetitle.required'=>'This field is required.',
            'email.required'=>'This field is required.',
            'number.required'=>'This field is required.',
            'number.digits' =>'Please Enter 10 Digits Number.',
            'copyright.required'=>'This field is required.',
            'address.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'mapiframe.required'=>'This field is required.',
            'metakeywords.required'=>'This field is required.',
            'facebook.required'=>'This field is required.',
            'twitter.required'=>'This field is required.',
            'instagram.required'=>'This field is required.',
            'youtube.required'=>'This field is required.',
            'metadescription.required'=>'This field is required.',
            // 'old_faviconimage.required'=>'This field is required.',
            // // 'old_faviconimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg)1.',
            // 'old_faviconimage.max'=>'You can upload maximim 2mb size.',
            // 'old_faviconimage.uploaded'=>'You can upload maximim 2mb size.',
            // 'old_siteimage.required'=>'This field is required.',
            // // 'old_siteimage.mimes'=>'Image Upload Only This Format(png,jpg,jpeg)2.',
            // 'old_siteimage.max'=>'You can upload maximim 2mb size.',
            // 'old_siteimage.uploaded'=>'You can upload maximim 2mb size.',
        ]);

        }

        $siteimage = null;

        if ($request->hasFile('siteimage')) {
            $image = $request->file('siteimage');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/site');
            $image->move($destinationPath, $name);
            $siteimage = $name;
        }
        else 
        {
            $siteimage = $request->old_siteimage;
        }

        $faviconimage = null;

        if ($request->hasFile('faviconimage')) {
            $image = $request->file('faviconimage');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/site');
            $image->move($destinationPath, $name);
            $faviconimage = $name;
        }
        else 
        {
            $faviconimage = $request->old_faviconimage;
        }

        $data = $request->all();
        if($request->id == null){
          
            $articledata = Generalsetting::create([
                'sitetitle'             => $data['sitetitle'],
                'email'                 => $data['email'],
                'number'                => $data['number'],
                'copyright'             => $data['copyright'],
                'user_id'               =>$id,
                'address'               => $data['address'],
                'description'           => $data['description'],
                'mapiframe'             => $data['mapiframe'],
                'metakeywords'          => $data['metakeywords'],
                'metadescription'       => $data['metadescription'],
                'facebook'              => $data['facebook'],
                'twitter'               => $data['twitter'],
                'instagram'             => $data['instagram'],
                'youtube'               => $data['youtube'],
                'siteimage'             => $siteimage,
                'faviconimage'          => $faviconimage,
            ]);

            return redirect()->route('generalsetting')->with('message', 'Generalsetting Created Successfully.');
        }

        else{
            $slider =  Generalsetting::find($request->id);

           if ($request->hasFile('siteimage')) {
            $image_path = public_path().'/images/site/'.$slider->siteimage;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }
            if ($request->hasFile('faviconimage')) {
                $image_path = public_path().'/images/site/'.$slider->faviconimage;
                if (File::exists($image_path)) {
                    unlink($image_path);
                }
                }



            $slider->update([
                'sitetitle'           => $data['sitetitle'],
                'email'             => $data['email'],
                'number'          => $data['number'],
                'copyright'            => $data['copyright'],
                'user_id'          =>$id,
                'address'            => $data['address'],
                'description'       => $data['description'],
                'mapiframe'          => $data['mapiframe'],
                'metakeywords'          => $data['metakeywords'],
                'metadescription'          => $data['metadescription'],
                'facebook'          => $data['facebook'],
                'twitter'          => $data['twitter'],
                'instagram'          => $data['instagram'],
                'youtube'          => $data['youtube'],
                'siteimage'               => $siteimage,
                'faviconimage'               => $faviconimage
        ]);
        return redirect()->route('generalsetting')->with('message', 'General Setting Updated Successfully.');
        }

    }
}
