<?php

namespace App\Http\Controllers;

use App\BidUse;
use Illuminate\Http\Request;

class BidUseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bid_use = BidUse::where('user_id',Auth()->user()->id)->get();
        return view('client/bid_history',compact('bid_use'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BidUse  $bidUse
     * @return \Illuminate\Http\Response
     */
    public function show(BidUse $bidUse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BidUse  $bidUse
     * @return \Illuminate\Http\Response
     */
    public function edit(BidUse $bidUse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BidUse  $bidUse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BidUse $bidUse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BidUse  $bidUse
     * @return \Illuminate\Http\Response
     */
    public function destroy(BidUse $bidUse)
    {
        //
    }
}
