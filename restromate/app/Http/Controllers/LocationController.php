<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $location = Location::leftjoin('users','locations.CompanyId','users.id')
                             ->select('locations.*','users.user_name as CompanyId')   
                               ->get();
        // $department = department::where('users.role_id', 2)
        //             ->get();

        return view('location.list')->withlocation($location);
    }
    public function create()
    {

        $company =   User::where('role_id',2)->where('is_active', 1)->get();
        return view('location.create')->withcompany($company);
    }
    public function store(Request $request)
    {
       

        $request->validate([
            'location_name'=>'required|unique:locations',
            'companyid'=>'required',
            ],
            [
                'location_name.required'=>'This field is required.',
                'companyid.required'=>'This field is required.',
                'location_name.unique'=>'The company name has already been taken.'
            ]);

            $ID= Auth::guard()->user()->id;


            $data = $request->all();


            $articledata = Location::create([
                'location_name'         => $data['location_name'],
                'is_active'             =>$data['is_active'],
                'createdby'             => $ID,
                'modifiedby'            => $ID,
                'companyid'             =>$data['CompanyId'],
            ]);

            return redirect()->route('location')->with('message', 'company create  Successfully .. please check you mail ... ');
    }
    public function edit($id)
    {
        $location = Location::find($id);
        $company =   User::where('role_id',2)->where('is_active', 1)->get();
        
        return view('location.update')->withlocation($location)->withcompany($company);
       
    }



    public function update(Request $request)
    {

        $request->validate([
            'location_name'=>'required|unique:locations,location_name,'.$request->id,
            //  'email' => 'required|unique:users,email,'.$request->id,
            //  'phoneno' => 'required|numeric|digits:10'
            ],
            [
                'location_name.required'=>'This field is required.',
                'location_name.unique'=>'The location name has already been taken.',
                // 'email.required'=>'This field is required.',
                // 'email.unique'=>'The company email has already been taken.',
                // 'phoneno.required' =>'This field is required.'
                
            ]);


            $ID= Auth::guard()->user()->id;


            $data = $request->all();


            $data = $request->all();
            $location = Location::find($request->id);
            $location->update([
                'location_name'            => $data['location_name'],
                'is_active'              => $data['is_active'],
                'modifiedby'             => $ID,
                'updated_at'           => date("Y-m-d h:i:s")
            ]);


        return redirect()->route('location')->with('message', 'location update Successfully ');

    }


    public function delete($id)
    {
        $id = $id;
        $location = Location::find($id);
        if (empty($location)) {
            return redirect()->route('location')->with('message', 'location id not found ');
        }

        $location->delete();

        return redirect()->route('location')->with('message', 'location deleted Successfully ');


    }

}
