<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product = Product::orderBy('id','DESC')->get();
        return view('admin/product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $category = Category::orderBy('name','ASC')->get();
        return view('admin/product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required',
                'from' => 'required',
                'to' => 'required',
                'category' => 'required',
                'limit' => 'required',
                'description' => 'required',
                'image1' => 'required',
                'image' => 'required',
            ]
        );
        $product = new Product;
        $product->name = $request->name;
        $product->slug = str_slug($request->name.rand(1,9999), '-');
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->to = $request->to;
        $product->from = $request->from;
        $product->limit = $request->limit;
        $product->description = $request->description;
        if($request->hasfile('image1')){
            $file = $request->file('image1');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image1=$upload.$filename;
        }
        // if($request->hasfile('image2')){
        //     $file = $request->file('image2');
        //     $upload = 'img/';
        //     $filename = time().$file->getClientOriginalName();
        //     $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
        //     $product->image2=$upload.$filename;
        // }
        if($request->hasfile('image'))
         {

            foreach($request->file('image') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/img/', $name);  
                $data[] = $name;  
            }
         }

         
        $product->image=json_encode($data);
        $product->save();
        return redirect('admin/product')->with('success','New Product has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $product = Product::find($id);
        $category = Category::orderBy('name','ASC')->get();
        return view('admin/product.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validation = $request->validate(
            [
                'name' => 'required|max:255',
                'price' => 'required',
                'from' => 'required',
                'to' => 'required',
                'category' => 'required',
                'limit' => 'required',
                'description' => 'required',
            ]
        );
        $product->name = $request->name;
        $product->slug = str_slug($request->name.rand(1,9999), '-');
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->to = $request->to;
        $product->from = $request->from;
        $product->limit = $request->limit;
        $product->description = $request->description;
        if($request->hasfile('image1')){
            $file = $request->file('image1');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image1=$upload.$filename;
        }
        if($request->hasfile('image2')){
            $file = $request->file('image2');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image2=$upload.$filename;
        }
        if($request->hasfile('image3')){
            $file = $request->file('image3');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image3=$upload.$filename;
        }
        if($request->hasfile('image4')){
            $file = $request->file('image4');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image4=$upload.$filename;
        }
        if($request->hasfile('image5')){
            $file = $request->file('image5');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $product->image5=$upload.$filename;
        }
        $product->update();
        return redirect('admin/product')->with('success','Product has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //
    }
}
