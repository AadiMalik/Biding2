<?php

namespace App\Http\Controllers;

use App\Order;
use App\PaymentMethod;
use App\Product;
use Illuminate\Http\Request;
use Stripe;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::where('user_id', Auth()->user()->id)->get();
        return view('client/order', compact('order'));
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
        if ($request->payment_method == null) {
            $validation = $request->validate(
                [
                    'card_name' => 'required',
                    'card_no' => 'required',
                    'month' => 'required',
                    'year' => 'required',
                    'cvc' => 'required',
                ]
            );
            $payment_method = new PaymentMethod;
            $payment_method->name = $request->card_name;
            $payment_method->number = $request->card_no;
            $payment_method->month = $request->month;
            $payment_method->year = $request->year;
            $payment_method->cvc = $request->cvc;
            $payment_method->user_id = Auth()->user()->id;
            $payment_method->save();
            $payment_id = $payment_method->id;
        }else{
            $payment_id = $request->payment_method;
        }
        $method = PaymentMethod::find($payment_id);
        $product = Product::find($request->product_id);
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
          $total = $product->price + $product->shipping_price;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $token,
                "description" => "Bid Payment" 
        ]);
        $order = new Order;
        $order->product_id = $product->id;
        $order->method_id = $payment_id;
        $order->user_id = Auth()->user()->id;
        $order->price = $product->price;
        $order->shipping_price = $product->shipping_price;
        $order->total = $total;
        $order->payment_status = 'Paid';
        $order->save();
        return redirect('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
