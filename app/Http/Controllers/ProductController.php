<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product=Product::get();
return view('products.index',['products'=>$product]);
    }
    public function create(Request $request)
    {
        return view('products.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png,gif|max:10000'
        ]);
//dd($request->all());
$imageName=time().'.'.$request->image->extension();
$request->image->move(public_path('products'),  $imageName);
//dd($imageName);
$product=new Product;
$product->image=$imageName;
$product->name=$request->name;
$product->description=$request->description;
$product->save();
return back()->withSuccess('Product created!!');
    }
    public function edit($id)
    {
        //dd($id);
        $product=Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request, $id)
    {
//dd($request->all());
$request->validate([
    'name'=>'required',
    'description'=>'required',
    'image'=>'nullable|mimes:jpg,jpeg,png,gif|max:10000'
]);
//dd($request->all());
$product=Product::where('id',$id)->first();
if(isset($request->image))
{
    //update image
    $imageName=time().'.'.$request->image->extension();
$request->image->move(public_path('products'),  $imageName);
$product->image=$imageName;
}

//dd($imageName);


$product->name=$request->name;
$product->description=$request->description;
$product->save();
return back()->withSuccess('Product Updated!!');
    }
    public function destroy($id)
    {
$product = Product::where('id',$id)->first();
$product->delete();
return back()->withSuccess('Product Deleted!!');
    }
}
