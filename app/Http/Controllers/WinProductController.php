<?php

namespace App\Http\Controllers;

use App\BuyProduct;
use App\PaymentMethod;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class WinProductController extends Controller
{
    public function index(){
        $win_product = Product::where('win',Auth()->user()->id)->orderBy('updated_at','DESC')->get();
        $buy_product = BuyProduct::where('user_id',Auth()->user()->id)->get();
        return view('client/win_product',compact('win_product','buy_product'));
    }
    public function pay_product($id){
        $win_product = Product::find($id);
        $payment_method = PaymentMethod::where('user_id',Auth()->user()->id)->get();
        return view('client/payment',compact('win_product','payment_method'));
    }
    public function payment(Request $request){
        $validation = $request->validate(
            [
                'payment_method' => 'required',
            ]
        );
        $method = PaymentMethod::find($request->payment_method);
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
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $product->bid_price * 100,
                "currency" => "usd",
                "source" => $token,
                "description" => "Product Payment" 
        ]);
        $buy_product = new BuyProduct;
        $buy_product->product_id = $request->product_id;
        $buy_product->price = $product->bid_price;
        $buy_product->method_id = $request->method_id;
        $buy_product->user_id = Auth()->user()->id;
        $buy_product->quatity = 1;
        $buy_product->save();
        return redirect('win-product');
    }
}
