<?php

namespace App\Http\Controllers\Admin;

use App\FaqCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqCategory = FaqCategory::all();
        return view('admin/faq_category.index',compact('faqCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/faq_category.create');
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
                'name' => 'required'
            ]
        );
        $faqCategory = new FaqCategory;
        $faqCategory->name = $request->name;
        $faqCategory->save();
        return redirect('admin/faq-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FaqCategory  $faqCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FaqCategory $faqCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FaqCategory  $faqCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(FaqCategory $faqCategory)
    {
        return view('admin/faq_category.edit',compact('faqCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FaqCategory  $faqCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required'
            ]
        );
        $faqCategory = FaqCategory::find($id);
        $faqCategory->name = $request->name;
        $faqCategory->update();
        return redirect('admin/faq-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FaqCategory  $faqCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(FaqCategory $faqCategory)
    {
        //
    }
}
