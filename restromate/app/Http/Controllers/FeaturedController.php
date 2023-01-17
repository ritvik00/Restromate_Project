<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Featured;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

class FeaturedController extends Controller
{

    public function index()
    {
            $product = Featured::leftjoin('category','featured.category','category.id')
                                ->select('featured.*','category.name as category' )
                                ->get();
                                // $product = Featured::get();
                                // $cat =  Category::all();

        return view('featured.list')->withproduct($product);
    }

    public function active($id,$active)
    {
      

        $user = Featured::find($id);

        if (empty($user)) {
            return redirect()->route('featured')->with('message', 'Featured Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('featured')->with('message', 'Featured Status Updated Successfully.');

    }

    public function delete($id){

        $promo = Featured::find($id);
        $promo->delete();
        return redirect()->route('featured')->with('message', 'Featured Deleted Successfully.');

    }

    public function create()
    {
       $cat =  Category::all();
       return view('featured.create')->withcat($cat);
    }

    public function edit($id)
    {
            $promo = Featured::find($id);
            $cat =  Category::all();
            return view('featured.create')->withcat($cat)->withpromo($promo);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $tag_id = implode(',', $data['category']);
        
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'product_type' => 'required',
        ],
        [
            'title.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'category.required'=>'This field is required.',
            'product_type.required'=>'This field is required.',
        ]);

        $id = Auth::guard()->user()->id;

        if ($request->id == null) 
        {

        $articledata = Featured::create([
            'title'           => $data['title'],
            'description'             => $data['description'],
            'category'          => $tag_id,
            'product_type'            => $data['product_type'],
            'user_id'             =>$id,
        ]);

        return redirect()->route('featured')->with('message', 'Featured Created Successfully.');
        }
        else
        {
            // dd($request->all());
        
            $promocode = DB::table("featured")
                ->where("id", $request->id)
                ->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'category' => $tag_id,
                    'product_type' => $request->product_type,
                    'user_id' =>$id,
                ]);
                return redirect()->route('featured')->with('message', 'Featured Updated Successfully.');

        }

    }

}
