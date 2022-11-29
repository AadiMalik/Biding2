<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promo = PromoCode::all();
        return view('admin/promo/index',compact('promo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/promo/create');
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
                'name' => 'required',
                'amount' => 'required',
                'expiry' => 'required',
            ]
        );
        $promo = new PromoCode;
        $promo->name = $request->name;
        $promo->discount = $request->amount;
        $promo->expiry = $request->expiry;
        $promo->save();
        return redirect('admin/promo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function edit(PromoCode $promo)
    {
        return view('admin/promo/edit',compact('promo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'name' => 'required',
                'amount' => 'required',
                'expiry' => 'required',
                'status' => 'required',
            ]
        );
        $promo = PromoCode::find($id);
        $promo->name = $request->name;
        $promo->discount = $request->amount;
        $promo->expiry = $request->expiry;
        $promo->status = $request->status;
        $promo->update();
        return redirect('admin/promo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PromoCode  $promoCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromoCode $promoCode)
    {
        //
    }
}
