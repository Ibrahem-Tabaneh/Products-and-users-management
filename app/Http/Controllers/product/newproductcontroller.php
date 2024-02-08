<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\search_req;
use App\Http\Requests\req_create;
use App\Models\Product;
use App\Models\User;


class newproductcontroller extends Controller
{
    public  function create()
    {
        return view('design.create');
    }

    public function store(req_create $request)
    {
       
    $data = $request->validated();
    
    //Product::create($data);
    $data['name']=$request->name;
    $data['price']=$request->price;
    $data['description']=$request->description;
    if($request->has('photo'))
    {
        $image=$request->photo;
        $extention=strtolower( $image->extension());
        $filename=time().rand(1,1000).'.'. $extention;
       
       $image->move(public_path('uploads'), $filename);
        $data['photo']=   $filename;

    }
     Product::create($data);

    return redirect()->route('index_products')->with('success','create product successfuly');

    }

    public function index()
    {
        $data=Product::select('*')->latest()->get();
        return view('design.index',['data'=>$data]);
    }


    public function delete_product($id)
    {
      /*  $product = Product::find($id);
        $product->delete();
        return redirect()->route('index_products')->with('success','delete product successfuly');*/
  
        $product = Product::findOrFail($id);

        if ($product) {
            $product->delete();
            return redirect()->route('index_products')->with('success', 'The product has been successfully deleted');
        } else {
            return redirect()->route('index_products')->with('error', 'The product was not found');
        }
    }

    public function edit_product($id)
    {
        $data = Product::where('id', $id)->first();

        return view('design.edit',['data'=>$data]);
    }

    public function store_update($id,req_create $request)
    {

      
   $data['name']=$request->name;
   $data['price']=$request->price;
   $data['description']=$request->description;

   if($request->has('photo'))
   {
       $image=$request->photo;
       $extention=strtolower( $image->extension());
       $filename=time().rand(1,1000).'.'. $extention;
      
      $image->move(public_path('uploads'), $filename);
       $data['photo']=   $filename;


   }
 

   Product::where(['id' => $id])->update($data);
   
   return redirect()->route('index_products')->with('success', 'The product has been modified successfully');
    
    }

    public function  show_product($id)
    {
        $data = Product::where('id', $id)->first();

        return view('design.show_details',['data'=>$data]);
    }

    //في وحدة التحكم (Controller) أو أي مكان آخر يعتمد على منطق تطبيقك
public function addProductToWishlist($productId)
{
    $user = auth()->user();
    $user->interestedProducts()->attach($productId);

    return redirect()->route('show_product',['id'=>$productId])->with('message', 'The product has been successfully added to your interests');
}

//في وحدة التحكم (Controller) أو أي مكان آخر يعتمد على منطق تطبيقك
public function showInterestedUsers($productId)
{
    $product = Product::find($productId);
    $interestedUsers = $product->interestedUsers;

    return view('design.showInterestedUsers',['data'=>  $interestedUsers] );
}

public function removeProductFromWishlist($productId)
{
    $user = auth()->user();

    // إزالة المنتج من قائمة الرغبات
    $user->interestedProducts()->detach($productId);

    return redirect()->route('show_product',['id'=>$productId])->with('message', 'The product has been successfully removed from your interests');
}


public function search_name(search_req $request)
{
     $request->validated();
   $data=Product::select('*')->where('name',$request->search_name)->get();

    return view('design.search',['data'=>$data]);
}

}
