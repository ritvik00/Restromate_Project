<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attributes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class AttributesController extends Controller
{
    public function index()
    {
        $offer = Attributes::all();
        return view('attributes.list')->withoffer($offer);
    }

    public function create()
    {
        return view("attributes.create");
    }

    public function active($id,$active)
    {
      

        $user = Attributes::find($id);

        if (empty($user)) {
            return redirect()->route('attributes')->with('message', 'Attributes id not found ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('attributes')->with('message', 'Attributes Status Updated Successfully. ');

    }


    public function delete($id){

        $offer = Attributes::find($id);
        $offer->delete();
        return redirect()->route('attributes')->with('message', 'Attributes Deleted Successfully.');

    }

    public function edit($id){

        $offer = Attributes::find($id);
        return view('attributes.create')->withoffer($offer);

    }

    public function store(Request $request)
    {
        // dd($request->all());
            $request->validate([
            'name' => 'required',
            'values' => 'required',
        ],
        [
            'name.required'=>'This field is required.',
            'values.required'=>'This field is required.',
        ]);
        

        if ($request->id == null) 
        {

        $data = $request->all();


        $articledata = Attributes::create([
            'name'           => $data['name'],
            'values'   => $data['values']
        ]);

        return redirect()->route('attributes')->with('message', 'Attributes created  Successfully.');
        }

        else
        {
        
            $offer = DB::table("attributes")
                ->where("id", $request->id)
                ->update([
                    'name' => $request->name,
                    'values' => $request->values
                   
                ]);
                return redirect()->route('attributes')->with('message', 'Attributes Updated Successfully.');

        }

    }
}
