<?php

namespace App\Http\Controllers;

use App\Opinion;
use App\Product;
use Illuminate\Http\Request;

class OpenionController extends Controller
{
    public function edit($id){
        $product = Product::find($id);
        return view('client/feedback',compact('product'));
    }
    public function store(Request $request){
        $feedback = new Opinion;
        $feedback->product_id = $request->product_id;
        $feedback->user_id = Auth()->user()->id;
        $feedback->description = $request->description;
        $feedback->status = 1;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $feedback->image = $upload . $filename;
        }
        if ($request->hasfile('video')) {
            $image = $request->file('video');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $feedback->video = $upload . $filename;
        }
        $feedback->save();
        return redirect('win-product')->with('success','Thank you for your feedback');
    }
}
