<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::orderBy('created_at','DESC')->get();
        return view('admin/package.index',compact('package'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package.create');
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
                'bids' => 'required',
                'price' => 'required',
                'time' => 'required',
                'limit' => 'required',
                'feature1' => 'required',
                'feature2' => 'required',
                'feature3' => 'required',
                'image' => 'required',
            ]
        );
        $package = new Package;
        $package->bids = $request->bids;
        $package->price = $request->price;
        $package->time = $request->time;
        $package->limit = $request->limit;
        $package->feature1 = $request->feature1;
        $package->feature2 = $request->feature2;
        $package->feature3 = $request->feature3;
        $package->tag = $request->tag;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $package->image = $upload . $filename;
        }
        $package->save();
        return redirect('admin/package')->with('success','Package has created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('admin/package.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'bids' => 'required',
                'price' => 'required',
                'time' => 'required',
                'limit' => 'required',
                'feature1' => 'required',
                'feature2' => 'required',
                'feature3' => 'required',
            ]
        );
        $package = Package::find($id);
        $package->bids = $request->bids;
        $package->price = $request->price;
        $package->time = $request->time;
        $package->limit = $request->limit;
        $package->feature1 = $request->feature1;
        $package->feature2 = $request->feature2;
        $package->feature3 = $request->feature3;
        $package->tag = $request->tag;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $upload = 'img/';
            $filename = time() . $image->getClientOriginalName();
            $path    = move_uploaded_file($image->getPathName(), $upload . $filename);
            $package->image = $upload . $filename;
        }
        $package->update();
        return redirect('admin/package')->with('success','Package has updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }
}
