<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\OrderDetail;
use App\PaymentMethod;
use App\PromoCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        return view('client/cart', compact('cart'));
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
        if (Auth::user() != null) {
            $check = Cart::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->first();
            if (isset($check)) {
                $msg = 'success';
                return $msg;
            }
            $cart = new Cart;
            $cart->product_id = $request->product_id;
            $cart->user_id = Auth()->user()->id;
            $cart->qty = 1;
            $cart->save();
            $msg = 'success';
            return $msg;
        } else {
            $msg = 'error';
            return $msg;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $cart->qty = $request->qty;
        $cart->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return back();
    }

    public function checkout()
    {
        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        $payment_method = PaymentMethod::where('user_id', Auth()->user()->id)->get();
        return view('client/checkout', compact('cart', 'payment_method'));
    }
    public function PromoCode(Request $request)
    {
        $validation = $request->validate(
            [
                'code' => 'required',
            ]
        );
        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        $promo = PromoCode::where('name', $request->code)->where('expiry', '>', Carbon::now()->format('Y-m-d H:i:s'))->where('status', 0)->first();
        if (isset($promo)) {
            foreach ($cart as $item) {
                $item->promo_code = $promo->id;
                $item->update();
            }
            return back();
        } else {
            return back()->with('error', 'Promo Code is invalid!');
        }
    }
    public function order_submit(Request $request)
    {
        $validation = $request->validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'country' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
            ]
        );
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
        } else {
            $payment_id = $request->payment_method;
        }
        $method = PaymentMethod::find($payment_id);
        $cart = Cart::where('user_id', Auth()->user()->id)->get();
        $sub_total = 0;
        $qty = 0;
        $shipping_charge = 0;
        $promo = 0;

        foreach ($cart as $item) {
            
            $sub_total += $item->product_name->price * $item->qty;
            $qty += $item->qty;
            $shipping_charge += $item->product_name->shipping_price;
            $total1 = $sub_total + $shipping_charge;
            $promo = $item->promo_name->discount ?? '0';
            $promo_code = $item->promo_code ?? '';
            $total = $total1-$promo;
        }
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
        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $token,
            "description" => "Bid Payment"
        ]);
        $order = new Order;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->address2 = $request->address2;
        $order->country = $request->country;
        $order->state = $request->state;
        $order->zipcode = $request->zipcode;
        $order->promo_code = $promo_code;
        $order->discount = $promo;
        $order->billing_address = $request->billing_address;
        $order->method_id = $payment_id;
        $order->user_id = Auth()->user()->id;
        $order->qty = $qty;
        $order->shipping_price = $shipping_charge;
        $order->sub_total = $sub_total;
        $order->total = $total;
        $order->payment_status = 'Paid';
        $order->save();
        foreach($cart as $item){
            $product_total = $item->product_name->price * $item->qty;
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item->product_id;
            $order_detail->price = $item->product_name->price;
            $order_detail->shipping_price = $item->product_name->shipping_price;
            $order_detail->qty = $item->qty;
            $order_detail->sub_total = $product_total;
            $order_detail->save();
        }
        Cart::where('user_id',Auth()->user()->id)->delete();
        return redirect('orders');
    }
}
