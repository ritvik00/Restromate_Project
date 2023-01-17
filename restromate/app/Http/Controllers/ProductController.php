<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Addons;
use App\Models\Tax;
use App\Models\Partner;
use App\Models\Tag;
use App\Models\Attributes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
            $product = Product::leftjoin('category','products.category_id','category.id')
                                  ->leftjoin('addons','products.addons_id','addons.id')
                                  ->leftjoin('tax','products.tax_id','tax.id')
                                  ->leftjoin('attributes','products.attributes_id','attributes.id')
                                  ->select('products.*','category.name as category_id', 'addons.title as addons_id',
                                           'tax.name as tax_id', 'attributes.name as attributes_id')
                                  ->get();
                                  

            return view('product.list')->withproduct($product);
    }

    public function active($id,$active)
    {
      

        $user = Product::find($id);

        if (empty($user)) {
            return redirect()->route('product')->with('message', 'Product Id Not Found. ');
        }

        $user->update([
            'verified'  => $active
        ]);


        return redirect()->route('product')->with('message', 'Product Status Updated Successfully. ');

    }

    public function cod($id,$active)
    {
      

        $user = Product::find($id);

        if (empty($user)) {
            return redirect()->route('product')->with('message', 'Product Id Not Found. ');
        }

        $user->update([
            'cod'  => $active
        ]);


        return redirect()->route('product')->with('message', 'Product Cod Updated Successfully.');

    }

    public function cancelable($id,$active)
    {
      

        $user = Product::find($id);

        if (empty($user)) {
            return redirect()->route('product')->with('message', 'Product Id Not Found. ');
        }

        $user->update([
            'cancelable'  => $active
        ]);


        return redirect()->route('product')->with('message', 'Product Cancelable Updated Successfully.');

    }

    public function delete($id)
    {
        $promo = Product::find($id);
        $image_path = public_path().'/images/product/'.$promo->image;
        // dd($image_path);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        
        $promo->delete();
        return redirect()->route('product')->with('message', 'Product Deleted Successfully.');
    }

    public function create()
    {
       $cat =  Category::all();
       $add = Addons::all();
       $tag = Tag::all();
       $tax = Tax::all();
       $pat = Partner::all();
       $att = Attributes::all();
       return view('product.create')->withcat($cat)->withadd($add)->withtax($tax)->withatt($att)->withtag($tag)->withpat($pat);
    }

    public function edit($id)
    {
        $promo = Product::find($id);
        $cat =  Category::all();
        $add = Addons::all();
        $tax = Tax::all();
        $att = Attributes::all();
        $pat = Partner::all();
        $tag = Tag::all();
        // dd($promo);
        return view('product.create')->withcat($cat)->withadd($add)->withtax($tax)->withatt($att,)->withtag($tag)->withpat($pat)->withpromo($promo);
    }

    public function store(Request $request)
    {
        
        // $jsonData = $request->tag_id;
        // $tag = json_encode($jsonData);

        if ($request->id == null) 
        {
        
        
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'calories' => 'required',
            'price' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'tax_id' => 'required',
            'addons_id' => 'required',
            'attributes_id' => 'required',
            'indicator' => 'required',
            // 'partner' => 'required',
            'highlight' => 'required',
            'allowedorderquantity' => 'required',
            'minimumorderquantity' => 'required',
        ],
        [
            'name.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            'image.required'=>'This field is required.',
            'image.mimes'=>'Image Upload Only This Format(png,jpg,jpeg).',
            'image.max'=>'You can upload maximim 2mb size.',
            'image.uploaded'=>'You can upload maximim 2mb size.',
            'tag_id.required'=>'This field is required.',
            'calories.required'=>'This field is required.',
            'price.required'=>'This field is required.',
            'attributes_id.required'=>'This field is required.',
            'category_id.required'=>'This field is required.',
            'tax_id.required'=>'This field is required.',
            'addons_id.required'=>'This field is required.',
            'indicator.required'=>'This field is required.',
            // 'partner.required'=>'This field is required.',
            'highlight.required'=>'This field is required.',
            'allowedorderquantity.required'=>'This field is required.',
            'minimumorderquantity.required'=>'This field is required.',
        ]);

        }
        else
        {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            // 'oldimage' => 'required|mimes:png,jpg,jpeg|max:2048',
            'calories' => 'required',
            'price' => 'required',
            'tag_id' => 'required',
            'category_id' => 'required',
            'tax_id' => 'required',
            'addons_id' => 'required',
            'attributes_id' => 'required',
            'indicator' => 'required',
            // 'partner' => 'required',
            'highlight' => 'required',
            'allowedorderquantity' => 'required',
            'minimumorderquantity' => 'required', 
        ],
        [
            'name.required'=>'This field is required.',
            'description.required'=>'This field is required.',
            // 'oldimage.required'=>'This field is required.',
            'calories.required'=>'This field is required.',
            'price.required'=>'This field is required.',
            'attributes_id.required'=>'This field is required.',
            'category_id.required'=>'This field is required.',
            'tag_id.required'=>'This field is required.',
            'tax_id.required'=>'This field is required.',
            'addons_id.required'=>'This field is required.',
            'indicator.required'=>'This field is required.',
            // 'partner.required'=>'This field is required.',
            'highlight.required'=>'This field is required.',
            'allowedorderquantity.required'=>'This field is required.',
            'minimumorderquantity.required'=>'This field is required.',
        ]);
        }

        $photo = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = Str::random(5).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images/product');
            $image->move($destinationPath, $name);
            $photo = $name;
        }
        else 
        {
            $photo = $request->oldimage;
        }

                                            // @php $selected = explode(",", @$users->location_id); @endphp
                                            // <select class="select2" multiple="multiple" name="location_id[]" data-placeholder="Choose Option"  style="width: 100%;">
                                            //     @forelse(@$location as $de)
                                            //         <option value='{{ @$de->id }}'  @if(in_array(@$de->
                                            //             id, $selected)) selected
                                            //             @endif>{{ @$de->location_name }}
                                            //         </option>
                                            //     @empty
                                            //     @endforelse

        $id = Auth::guard()->user()->id;

        $data = $request->all();

        $tag_id = implode(',', $data['tag_id']);
        

        // dd($tag_id);

        if ($request->id == null) 
        {

        $articledata = Product::create([
            'name'                      => $data['name'],
            'description'               => $data['description'],
            'calories'                  => $data['calories'],
            'price'                     => $data['price'],
            'category_id'               => $data['category_id'],
            'tag_id'                    => $tag_id,
            'producttype'               => $data['producttype'],
            'addionalprice'             => $data['addionalprice'],
            'addionalspecialprice'      => $data['addionalspecialprice'],
            'tax_id'                    => $data['tax_id'],
            'addons_id'                 => $data['addons_id'],
            'attributes_id'             => $data['attributes_id'],
            'indicator'                 => $data['indicator'],
            // 'partner'                   => $data['partner'],
            'highlight'                 => $data['highlight'],
            'allowedorderquantity'      => $data['allowedorderquantity'],
            'minimumorderquantity'      => $data['minimumorderquantity'],
            'image'                     => $photo,
            'user_id'                   => $id,
        ]);

        return redirect()->route('product')->with('message', 'Product Created Successfully.');
        }
        else
        {
            $slider =  Product::find($request->id);

           if ($request->hasFile('image')) {
            $image_path = public_path().'/images/product/'.$slider->image;
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            }

            $slider->update([
                            'name'                      => $data['name'],
                            'description'               => $data['description'],
                            'calories'                  => $data['calories'],
                            'price'                     => $data['price'],
                            'category_id'               => $data['category_id'],
                            'tag_id'                    => $tag_id,
                            'tax_id'                    => $data['tax_id'],
                            'producttype'               => $data['producttype'],
                            'addionalprice'             => $data['addionalprice'],
                            'addionalspecialprice'      => $data['addionalspecialprice'],
                            'addons_id'                 => $data['addons_id'],
                            'attributes_id'             => $data['attributes_id'],
                            'indicator'                 => $data['indicator'],
                            // 'partner'                   => $data['partner'],
                            'highlight'                 => $data['highlight'],
                            'allowedorderquantity'      => $data['allowedorderquantity'],
                            'minimumorderquantity'      => $data['minimumorderquantity'],
                            'image'                     => $photo,
                            'user_id'                   =>$id,
                        ]);
            return redirect()->route('product')->with('message', 'Product Updated Successfully.');
        }

    }
}
