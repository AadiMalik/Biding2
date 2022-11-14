<?php

namespace App\Http\Controllers;

use App\Package;
use App\PackageBuy;
use App\PaymentMethod;
use App\User;
use Illuminate\Http\Request;
use Session;
use Stripe;

class PackageBuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $validation = $request->validate(
            [
                'payment_method' => 'required',
            ]
        );
        $method = PaymentMethod::find($request->payment_method);
        $package = Package::find($request->package_id);
        $stripe = new \Stripe\StripeClient(
            'pk_test_51KT26VDuKSCrfM2pauObEL6P9pEphtZN4W0eOtz79NTcFlEVp8Yub37AgWxBnhXbFizoQQHe6UsmOqlpgotFutWq00L3bdQIgV'
          );
          $token = $stripe->tokens->create([
            'card' => [
              'number' => $method->number,
              'exp_month' => $method->month,
              'exp_year' => $method->year,
              'cvc' => $method->cvc,
            ],
          ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $package->price * 100,
                "currency" => "usd",
                "source" => $token,
                "description" => "Bid Payment" 
        ]);
        $payment = new PackageBuy;
        $payment->payment_method = $request->payment_method;
        $payment->package_id = $request->package_id;
        $payment->user_id = Auth()->user()->id;
        $payment->price = $package->price;
        $payment->bids = $package->bids;
        $payment->save();
        $user = User::find(Auth()->user()->id);
        $user->package_id =$request->package_id;
        $user->bids = $user->bids + $package->bids;
        $user->update();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageBuy  $packageBuy
     * @return \Illuminate\Http\Response
     */
    public function show(PackageBuy $packageBuy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageBuy  $packageBuy
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageBuy $packageBuy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageBuy  $packageBuy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageBuy $packageBuy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageBuy  $packageBuy
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageBuy $packageBuy)
    {
        //
    }
}
