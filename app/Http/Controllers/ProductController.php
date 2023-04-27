<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\User;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function categories()
    {
        $data['results']=Category::paginate(10);

        return view('category.index',$data);
    }
    public function addCategory(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'cat_name'=>'required'
            ]);

            $ins_arr=array(
                'category_name'=>$validated['cat_name']
            );

            Category::create($ins_arr);

            return redirect()->route('categories')->with('success','Category Added successfully');
        }
        return view('category.add');
    }
    public function index()
    {
        if(auth()->user()->role !=1)
        {
            $user_id=auth()->user()->id;
           $results = Product::with('categories')->where('created_by',$user_id)->paginate(10);
        }else{
            $results = Product::with('categories')->paginate(10);
        }
        //dd($results);
        $data['results']=$results;
        return view('products.index',$data);
    }
    public function add(Request $request)
    {
        $data['categories']=Category::get();

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'product_name'=>'required',
                'sel_price'=>'required',
                'mrp'=>'required',
                'qty'=>'required',
                'category'=>'required'
            ]);

            $ins_arr=array(
                'product_name'=>$validated['product_name'],
                'sale_price'=>$validated['sel_price'],
                'mrp'=>$validated['mrp'],
                'quantity'=>$validated['qty'],
                'category_id'=>$validated['category'],
                'created_by'=>auth()->user()->id
            );

            Product::create($ins_arr);

            return redirect()->route('products')->with('success','Product Added successfully');
        }
        return view('products.add',$data);
    }
    public function edit($id,Request $request)
    {
        $product_id=decrypt($id);

        $editdata=Product::find($product_id);

        if($request->isMethod('post'))
        {
            $validated=$request->validate([
                'product_name'=>'required',
                'sel_price'=>'required',
                'mrp'=>'required',
                'qty'=>'required',
                'category'=>'required'
            ]);

            $editdata->product_name = $validated['product_name'];
            $editdata->sale_price = $validated['sel_price'];
            $editdata->mrp = $validated['mrp'];
            $editdata->quantity = $validated['qty'];
            $editdata->category_id = $validated['category'];
            $editdata->save();

            return redirect()->route('products')->with('success','Product updated successfully');
        }

        $data['edit_data']=$editdata;

        $data['categories']=Category::get();

        return view('products.edit',$data);
    }
    public function deactivate($id)
    {
        $product=decrypt($id);
        $editdata=Product::find($product);

        $editdata->status = 2;
        $editdata->save();

        return redirect()->route('products')->with('success','Product deactivated successfully');
    }
    public function activate($id)
    {
        $product=decrypt($id);
        $editdata=Product::find($product);

        $editdata->status = 1;
        $editdata->save();

        return redirect()->route('products')->with('success','Product activated successfully');
    }
    public function assign($id,Request $request)
    {
        $product=decrypt($id);
        $product = Product::find($product);

        if($request->isMethod('post'))
        {
            $product->assigned_user = $request->distributor;
            $product->save();

            return redirect()->route('products')->with('success','Product assigned to distributor successfully');
        }

        $data['product']=$product;
        $data['distributors'] = User::where('role',3)->get();

        return view('products.assign',$data);
    }
}
