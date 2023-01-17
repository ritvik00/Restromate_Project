<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $roleid= Auth::user()->role_id;

        if($roleid == 1)
        {

            return view('superadmin');
        }

        else if($roleid == 2)
        {
            return view('admin');
        }
        else if($roleid == 3)
        {
                    return view('restaurant');
        }

        else if($roleid == 4)
        {
            return view('deliveryboy');
        }
        
    }



    public function updateuseredit(Request $request)
    {
        $id= Auth::user()->id;
        $user = User::findOrFail($id);
        return view('profile.updateprofile')->withuserdata($user);
    }

    public function updateprofile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_name' => 'required',
            'photo' =>'image | mimes:jpg,jpeg,png,gif | max:2048',

        ], [
            'user_name.required' => 'This field is required.',
            // 'image.required'=>'This field is required.',
            'photo.image'=>'This field is must be an image',
            'image.mimes'=>'The image must be a file of type: jpg, jpeg, png .'
        ]
        );

     
        if ($file = $request->file('photo')){
            $photo_name = Str::random(5)."_".$request->file('photo')->getClientOriginalName();
            $file->move('public/uploads/user/',$photo_name);
            $filepath = 'public/uploads/user/'. $photo_name;
            $image = $photo_name;
            $filepathin=$filepath;
        }
        else
        {
            // dd("update in");
            $image = $request->showimg;
            $filepathin='public/uploads/students/'. $request->showimg;
        }


        $ID = Auth::user()->id;


        User::where('id', $ID)->update([
            'user_name' => $request->user_name,
            'photo'=>$image
        ]);

        return redirect()->route('updateuseredit')->with('message', 'User Updated Successfully.');


    }


    public function updatepassword()
    {
        return view('profile.updatepassword');
    }

    public function chnagepassword_update(Request $request)
    {
        $request->validate([

            'old' => 'required',
            'password' => 'required | min:8 | confirmed ',
            'password_confirmation' => 'required | min:8',

        ], [

            'old.required' => 'This field is required.',
            'password.required' => 'This field is required.',
            'password_confirmation.required' => 'This field is required.',
            'password.confirmed' => 'The new password and  retype password does not match.',
            'password.min' => 'The New password must be at least 8 characters.',
            'password_confirmation.min' => 'The Retype password must be at least 8 characters.'
            
            ]
        );

        $email = Auth::user()->email;

        $ID = Auth::user()->id;
        $user = User::findOrFail($ID);

        if (Hash::check($request->old, $user->password)) {

            User::where('id', $ID)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('updatepassword')->with('message', 'User Password Change Successfully.');
        } else {
            return redirect()->route('updatepassword')->with('error', 'User Old Password Does Not Match.');
        }
    }


    


}