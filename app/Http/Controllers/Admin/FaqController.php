<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use App\FaqCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::all();
        return view('admin/faq.index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faqCategory = FaqCategory::orderBy('name','ASC')->get();
        return view('admin/faq.create',compact('faqCategory'));
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
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
            ]
        );
        $faq = new Faq;
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->category_id = $request->category;
        $faq->save();
        return redirect('admin/faq');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::find($id);
        $faqCategory = FaqCategory::orderBy('name','ASC')->get();
        return view('admin/faq.edit',compact('faq','faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validation = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
            ]
        );
        $faq = Faq::find($id);
        $faq->title = $request->title;
        $faq->description = $request->description;
        $faq->category_id = $request->category;
        $faq->update();
        return redirect('admin/faq');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        //
    }
}
