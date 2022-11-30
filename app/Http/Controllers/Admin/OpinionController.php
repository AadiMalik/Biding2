<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Opinion;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opinion = Opinion::all();
        return view('admin/opinion.index',compact('opinion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $product = Product::orderBy('name','ASC')->get();
        return view('admin/opinion.create',compact('user','product'));
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
                'product' => 'required',
                'user' => 'required'
            ]
        );
        $opinion = new Opinion;
        $opinion->user_id = $request->user;
        $opinion->product_id = $request->product;
        $opinion->status = $request->status;
        $opinion->description = $request->description;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $opinion->image = $upload . $filename;
        }
        if ($request->hasfile('video')) {
            $image = $request->file('video');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $opinion->video = $upload . $filename;
        }
        $opinion->save();
        return redirect('admin/opinion')->with('success','Opinion has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function show(Opinion $opinion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function edit(Opinion $opinion)
    {
        $user = User::all();
        $product = Product::orderBy('name','ASC')->get();
        return view('admin/opinion.edit',compact('user','product','opinion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Opinion $opinion)
    {
        $validation = $request->validate(
            [
                'product' => 'required',
                'user' => 'required'
            ]
        );
        $opinion->user_id = $request->user;
        $opinion->product_id = $request->product;
        $opinion->status = $request->status;
        $opinion->description = $request->description;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $opinion->image = $upload . $filename;
        }
        if ($request->hasfile('video')) {
            $image = $request->file('video');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $opinion->video = $upload . $filename;
        }
        if($request->status==0){
            $bids =0;
            if(isset($opinion->image)){
                $bids += 20;
            }
            if(isset($opinion->video)){
                $bids += 30;
            }
            $user = User::find($opinion->user_id);
            $user->bids = $user->bids + $bids;
            $user->update();
        }
        $opinion->update();
        return redirect('admin/opinion')->with('success','Opinion has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Opinion  $opinion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Opinion $opinion)
    {
        //
    }
}
