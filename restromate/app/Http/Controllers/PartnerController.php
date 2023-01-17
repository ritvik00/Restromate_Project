<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    public function index()
    {
        $partner = Partner::all();
        return view('partner.list')->withpartner($partner);
    }

    public function create()
    {
        return view("partner.create");
    }

    public function edit($id){

        $partner = Partner::find($id);
        return view('partner.create')->withpartner($partner);

    }

    public function active($id,$active)
    {
      

        $user = Partner::find($id);

        if (empty($user)) {
            return redirect()->route('partner')->with('message', 'Partner Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('partner')->with('message', 'Partner Status Updated Successfully. ');

    }

    public function delete($id){

        $offer = Partner::find($id);
        $image_path = public_path().'/images/partner/'.$offer->profile;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $offer->delete();
        return redirect()->route('partner')->with('message', 'Partner Deleted Successfully.');

    }

    protected function store(Request $request)
    { 
        // dd($request->not_working_days);
        $jsonData = $request->not_working_days;
        $time = json_encode($jsonData);
        // dd($time);

        if ($request->id == null) 
        {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
            'profile' => 'required',
            // 'workingdays' => 'required',
            'description'=>'required',
            'city'=>'required',
            'cookingtime'=>'required',
            'address' => 'required',
            'addressproof' => 'required',
            // 'latitude' => 'required',
            // 'longitude' => 'required',
            'owner_name' => 'required',
            'owner_mobile' => 'required|numeric|digits:10',
            'owner_email' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
            'owner_identity' => 'required',
            'licence_name' => 'required',
            'licence_code' => 'required',
            'licence_proof' => 'required',
            'tax_name' => 'required',
            'tax_number' => 'required',
            'account_number' => 'required',
            'account_name' => 'required',
            'bank_code' => 'required',
            'bank_name' => 'required',

            ],
            [
                'name.required'=>'This field is required.',
                'type.required'=>'This field is required.',
                'profile.required'=>'This field is required.',
                // 'workingdays.required' =>'This field is required.',
                'description.required' =>'This field is required.',
                'city.required' =>'This field is required.',
                'cookingtime.required' =>'This field is required.',
                'address.required' =>'This field is required.',
                'addressproof.required' =>'This field is required.',
                // 'latitude.required' =>'This field is required.',
                // 'longitude.required' =>'This field is required.',
                'owner_name.required' =>'This field is required.',
                'owner_mobile.required' =>'This field is required.',
                'owner_email.required' =>'This field is required.',
                'password.required' =>'This field is required.',
                'password_confirmation.required' =>'This field is required.',
                'owner_identity.required' =>'This field is required.',
                'licence_name.required' =>'This field is required.',
                'licence_code.required' =>'This field is required.',
                'licence_proof.required' =>'This field is required.',
                'tax_name.required' =>'This field is required.',
                'tax_number.required' =>'This field is required.',
                'account_number.required' =>'This field is required.',
                'account_name.required' =>'This field is required.',
                'bank_code.required' =>'This field is required.',
                'bank_name.required' =>'This field is required.',

            ]);
        }
        else{
            $request->validate([
                'name'=>'required',
                'type'=>'required',
                'oldprofile' => 'required',
                // 'workingdays' => 'required',
                'description'=>'required',
                'city'=>'required',
                'cookingtime'=>'required',
                'address' => 'required',
                'oldaddressproof' => 'required',
                // 'latitude' => 'required',
                // 'longitude' => 'required',
                'owner_name' => 'required',
                'owner_mobile' => 'required|numeric|digits:10',
                'owner_email' => 'required',
                // 'password' => 'required|confirmed',
                // 'password_confirmation' => 'required',
                'oldowner_identity' => 'required',
                'licence_name' => 'required',
                'licence_code' => 'required',
                'oldlicence_proof' => 'required',
                'tax_name' => 'required',
                'tax_number' => 'required',
                'account_number' => 'required',
                'account_name' => 'required',
                'bank_code' => 'required',
                'bank_name' => 'required',
    
                ],
                [
                    'name.required'=>'This field is required.',
                    'type.required'=>'This field is required.',
                    'oldprofile.required'=>'This field is required.',
                    // 'workingdays.required' =>'This field is required.',
                    'description.required' =>'This field is required.',
                    'city.required' =>'This field is required.',
                    'cookingtime.required' =>'This field is required.',
                    'address.required' =>'This field is required.',
                    'oldaddressproof.required' =>'This field is required.',
                    // 'latitude.required' =>'This field is required.',
                    // 'longitude.required' =>'This field is required.',
                    'owner_name.required' =>'This field is required.',
                    'owner_mobile.required' =>'This field is required.',
                    'owner_email.required' =>'This field is required.',
                    // 'password.required' =>'This field is required.',
                    // 'password_confirmation.required' =>'This field is required.',
                    'oldowner_identity.required' =>'This field is required.',
                    'licence_name.required' =>'This field is required.',
                    'licence_code.required' =>'This field is required.',
                    'oldlicence_proof.required' =>'This field is required.',
                    'tax_name.required' =>'This field is required.',
                    'tax_number.required' =>'This field is required.',
                    'account_number.required' =>'This field is required.',
                    'account_name.required' =>'This field is required.',
                    'bank_code.required' =>'This field is required.',
                    'bank_name.required' =>'This field is required.',
    
                ]);
        }
            $photo = null;

            if ($request->hasFile('profile')) {
                $image = $request->file('profile');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/partner');
                $image->move($destinationPath, $name);
                $photo = $name;
            }
            else 
        {
            $photo = $request->oldprofile;
        }

            $addressproof = null;

            if ($request->hasFile('addressproof')) {
                $image = $request->file('addressproof');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/partner');
                $image->move($destinationPath, $name);
                $addressproof = $name;
            }
            else 
        {
            $addressproof = $request->oldaddressproof;
        }

            $owner_identity = null;

            if ($request->hasFile('owner_identity')) {
                $image = $request->file('owner_identity');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/partner');
                $image->move($destinationPath, $name);
                $owner_identity = $name;
            }
            else 
            {
                $owner_identity = $request->oldowner_identity;
            }
            
            $licence_proof = null;

            if ($request->hasFile('licence_proof')) {
                $image = $request->file('licence_proof');
                $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/images/partner');
                $image->move($destinationPath, $name);
                $licence_proof = $name;
            }
            else 
            {
                $licence_proof = $request->oldlicence_proof;
            }


        
        $id = Auth::user()->id;

       
        if ($request->id == null) 
        {
        $data = $request->all();
        Partner::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'workingdays' => $time,
            'description' => $data['description'],
            'city' => $data['city'],
            'cookingtime' => $data['cookingtime'],
            'address' => $data['address'],
            'addressproof' => $addressproof,
            // 'latitude' => $data['latitude'],
            // 'longitude' => $data['longitude'],
            'owner_name' => $data['owner_name'],
            'owner_mobile' => $data['owner_mobile'],
            'owner_email' => $data['owner_email'],
            'owner_identity' => $owner_identity,
            'licence_name' => $data['licence_name'],
            'licence_code' => $data['licence_code'],
            'licence_proof' => $licence_proof,
            'tax_name' => $data['tax_name'],
            'tax_number' => $data['tax_number'],
            'account_number' => $data['account_number'],
            'account_name' => $data['account_name'],
            'bank_code' => $data['bank_code'],
            'bank_name' => $data['bank_name'],
            'password' => Hash::make($data['password']),
            'profile'=>$photo,
            'user_id' => $id
        ]);
            return redirect()->route('partner')->with('message', 'Partner Created  Successfully.');
    }
    else{
        $slider =  Partner::find($request->id);

           if ($request->hasFile('profile')) {
            $image_path = public_path().'/images/partner/'.$slider->profile;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

            $slider->update([
                'name' => $data['name'],
                'type' => $data['type'],
                'workingdays' => $time,
                'description' => $data['description'],
                'city' => $data['city'],
                'cookingtime' => $data['cookingtime'],
                'address' => $data['address'],
                'addressproof' => $addressproof,
                // 'latitude' => $data['latitude'],
                // 'longitude' => $data['longitude'],
                'owner_name' => $data['owner_name'],
                'owner_mobile' => $data['owner_mobile'],
                'owner_email' => $data['owner_email'],
                'owner_identity' => $owner_identity,
                'licence_name' => $data['licence_name'],
                'licence_code' => $data['licence_code'],
                'licence_proof' => $licence_proof,
                'tax_name' => $data['tax_name'],
                'tax_number' => $data['tax_number'],
                'account_number' => $data['account_number'],
                'account_name' => $data['account_name'],
                'bank_code' => $data['bank_code'],
                'bank_name' => $data['bank_name'],
                'password' => Hash::make($data['password']),
                'profile'=>$photo,
                'user_id' => $id
            ]);
            return redirect()->route('partner')->with('message', 'Partner Updated Successfully.');
    }

    }

    public function approved($id,$approved)
    {
      

        $user = Partner::find($id);

        if (empty($user)) {
            return redirect()->route('partner')->with('message', 'Partner Id Not Found. ');
        }

        $user->update([
            'licence_approval'  => $approved
        ]);


        return redirect()->route('partner')->with('message', 'Partner Licence Status Updated Successfully. ');

    }
}
