<?php

namespace App\Http\Controllers;

use App\AutoBid;
use App\BidUse;
use App\Faq;
use App\FaqCategory;
use App\Models\Service;
use App\News;
use App\Brand;
use App\Category;
use App\LogCapita;
use App\Opinion;
use App\OpinionLike;
use App\Package;
use App\PaymentMethod;
use App\Product;
use App\Review;
use App\Sector;
use App\Slider;
use App\Support;
use App\User;
use App\Wish;
use App\WritingPoint;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\UserSystemInfoHelper;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function product(Request $request)
    {
        $products = Product::paginate(10);
        $data = '';

        if ($request->ajax()) {
            foreach ($products as $key => $product) {
                $date_from = date('Y-m-d H:i:s', strtotime($product->from));
                $date_to = date('Y-m-d H:i:s', strtotime($product->to));
                $current = date('Y-m-d H:i:s', strtotime(Carbon::now()));
                $date = date('d-m-Y H:i:s', strtotime($product->from));
                $date1 = date('d-m-Y', strtotime($product->from));
                $current1 = date('d-m-Y', strtotime(Carbon::now()));

                if (Auth::user()) {
                    $check = Auth()->user()->id;
                    $wish = Wish::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();
                    $auto = AutoBid::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();
                } else {
                    $check = 0;
                    $wish = null;
                    $auto = null;
                }
                $user_book = "";
                $bid_user = BidUse::orderBy('created_at', 'DESC')->where('product_id', $product->id)->first();
                $user_book = $bid_user->user_name->name ?? "";
                $user_id = $bid_user->user_id ?? "";
                $data .= '<div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                <div class="card">
                <div class="favriot-acction">';
                if (isset($auto)) {
                    $data .= '<b class="bid-auto"><i class="fas fa-sync-alt" style="font-size:12px;"></i> ' . $auto->bids . '</b>';
                }
                if (isset($wish)) {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" class="active" ><i class="fa fa-star"></i></a>';
                } else {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" ><i class="fa fa-star"></i></a>';
                }

                $data .= '</div>
                    <a href="subasta/' . $product->id . '">
                        <img class="p-1 img2" src="' . asset("$product->image1") . '" alt="">
                        <a class="title">$ ' . $product->min_price . ' Tienda <br>
                        <span class="nickname">' . $product->name . '</span></a>

                        <span class="card_prize">$' . $product->bid_price . '</span>
                        <span class="nickname">' . $user_book . '</span></a>';
                if ($product->win == null) {
                    if (($current > $date_from) && ($current < $date_to)) {
                        if ($check != $user_id) {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                            if ($date1 == $current1) {
                                $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                            $data .= '<input type="hidden" value="' . $product->id . '" id="product_id">
                        <a href="javascript:void(0)" onclick="Bid(' . $product->id . ')" style="width:100%; border:none;">
                        <div class="card_rebre" style="background: green; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </a>';
                        } else {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <span style="width:100%; border:none;">
                        <div class="card_rebre" style="background: #5ee32a; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </span>';
                        }
                    } else {
                        $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                                font-size: 18px;
                                font-weight: bold;" id="win">10</span>';
                                if($date1==$current1){
                                    $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                                    }
                                $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                                <span style="width:100%; border:none;">
                                <div class="card_rebre">
                                         <h4> REOPEN SOON</h4>
                                </div>
                                </span>';
                    }
                } elseif ($product->win != null) {
                    $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                    font-size: 18px;
                    font-weight: bold;" id="win">10</span>
                    <h4 class="card_time">Hoy a las ' . $date . '</h4>
                    <input type="hidden" value="' . $product->id . '" id="product_id">
                    <span style="width:100%; border:none;">
                    <div class="card_rebre" style="background: gray; margin-bottom:0px;">
                        <h4>WINDIDO</h4>
                    </div>
                    </span>';
                }

                $data .= '<div class="d-flex">
                            <a href="subasta/' . $product->id . '" class="btn btn-primary form-control" style="border-radius: 0px;">
                                <i class="fas fa-shopping-cart"></i>
                                $' . $product->price . '</a>
                            
                        </div>
                    </a>
                    <div class="bid-opction mt-1" id="bids' . $product->id . '">
                            <a href="javascript:void(0)" onclick="AutoBid(10,' . $product->id . ')"><i class="fa fa-plus"></i>10</a>
                             <a href="javascript:void(0)" onclick="AutoBid(20,' . $product->id . ')"><i class="fa fa-plus"></i>20</a>
                              <a href="javascript:void(0)" onclick="AutoBid(50,' . $product->id . ')"><i class="fa fa-plus"></i>50</a>
                               <a href="javascript:void(0)" onclick="AutoBid(100,' . $product->id . ')"><i class="fa fa-plus"></i>100</a>
                               <p class="mt-1"><a  href="#demo-modal' . $product->id . '" class="other-amount">Other Amount</a></p>
                        </div>
                </div>
            </div>
            <div id="demo-modal' . $product->id . '" class="modal">
        <div class="modal__content">
            <h3>Other Amount</h3>
            <div class="row">
                <div class="col-md-12">
                    <input type="number" id="other' . $product->id . '" class="form-control">
                </div>
                <div class="col-md-12" style="margin-top:10px;">
                    <a href="javascript:void(0)" onclick="AutoBid(0,' . $product->id . ')" class="btn btn-primary">Add</a>
                </div>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
            ';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }

    }
    public function bidByUser(Request $request)
    {
        $check = BidUse::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->orderBy('created_at', 'DESC')->first();
        $bid = new BidUse;
        $bid->product_id = $request->product_id;
        $bid->user_id = Auth()->user()->id;
        $product_bid = Product::find($request->product_id);
        $product_bid->bid_price = $product_bid->bid_price + $product_bid->min_price;
        $bid->bids = $product_bid->bid;
        if (Auth()->user()->bids >= $product_bid->bid) {
            $bid->save();
            $product_bid->update();
            // User Update
            $user = User::find(Auth()->user()->id);
            $user->bids = $user->bids - 1;
            $user->update();

            // Fetch Products
            $products = Product::paginate(10);
            $data = '';
            if ($request->ajax()) {
                foreach ($products as $key => $product) {
                    if (Auth::user()) {
                        $wish = Wish::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();
                    } else {
                        $wish = null;
                    }
                    $date_from = date('Y-m-d H:i:s', strtotime($product->from));
                    $date_to = date('Y-m-d H:i:s', strtotime($product->to));
                    $current = date('Y-m-d H:i:s', strtotime(Carbon::now()));
                    $date = date('d-m-Y H:i:s', strtotime($product->from));
                    $date1 = date('d-m-Y', strtotime($product->from));
                    $current1 = date('d-m-Y', strtotime(Carbon::now()));
                    $user_book = "";
                    $bid_user = BidUse::orderBy('created_at', 'DESC')->where('product_id', $product->id)->first();
                    $user_book = $bid_user->user_name->name ?? "";
                    $data .= '<div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                <div class="card">
                <div class="favriot-acction">';
                    if (isset($auto)) {
                        $data .= '<b class="bid-auto"><i class="fas fa-sync-alt" style="font-size:12px;"></i> ' . $auto->bids . '</b>';
                    }
                    if (isset($wish)) {
                        $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" class="active" ><i class="fa fa-star"></i></a>';
                    } else {
                        $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" ><i class="fa fa-star"></i></a>';
                    }

                    $data .= '</div>
                    <a href="subasta/' . $product->id . '">
                        <img class="p-1 img2" src="' . asset("$product->image1") . '" alt="">
                        <a class="title">$ ' . $product->min_price . ' Tienda <br>
                        <span class="nickname">' . $product->name . '</span></a>

                        <span class="card_prize">$' . $product->bid_price . '</span>
                        <span class="nickname">' . $user_book . '</span></a>';
                    if ($product->win == null) {
                        if (($current > $date_from) && ($current < $date_to)) {
                            if ($check != Auth()->user()->id) {
                                $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <a href="javascript:void(0)" onclick="Bid(' . $product->id . ')" style="width:100%; border:none;">
                        <div class="card_rebre" style="background: green; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </a>';
                            } else {
                                $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <span style="width:100%; border:none;">
                        <div class="card_rebre" style="background: #5ee32a; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </span>';
                            }
                        } else {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                                font-size: 18px;
                                font-weight: bold;" id="win">10</span>';
                                if($date1==$current1){
                                    $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                                    }
                                $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                                <span style="width:100%; border:none;">
                                <div class="card_rebre">
                                         <h4> REOPEN SOON</h4>
                                </div>
                                </span>';
                        }
                    } elseif ($product->win != null) {
                        $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                    font-size: 18px;
                    font-weight: bold;" id="win">10</span>';
                    if($date1==$current1){
                        $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                        }
                    $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                    <span style="width:100%; border:none;">
                    <div class="card_rebre" style="background: gray; margin-bottom:0px;">
                        <h4>WINDIDO</h4>
                    </div>
                    </span>';
                    }

                    $data .= '<div class="d-flex">
                            <a href="subasta/' . $product->id . '" class="btn btn-primary form-control" style="border-radius: 0px;">
                                <i class="fas fa-shopping-cart"></i>
                                $' . $product->price . '</a>
                            
                        </div>
                    </a>
                    <div class="bid-opction mt-1" id="bids' . $product->id . '">
                            <a href="javascript:void(0)" onclick="AutoBid(10,' . $product->id . ')"><i class="fa fa-plus"></i>10</a>
                             <a href="javascript:void(0)" onclick="AutoBid(20,' . $product->id . ')"><i class="fa fa-plus"></i>20</a>
                              <a href="javascript:void(0)" onclick="AutoBid(50,' . $product->id . ')"><i class="fa fa-plus"></i>50</a>
                               <a href="javascript:void(0)" onclick="AutoBid(100,' . $product->id . ')"><i class="fa fa-plus"></i>100</a>
                               <p class="mt-1"><a  href="#demo-modal' . $product->id . '" class="other-amount">Other Amount</a></p>
                        </div>
                </div>
            </div>
            <div id="demo-modal' . $product->id . '" class="modal">
        <div class="modal__content">
            <h3>Other Amount</h3>
            <div class="row">
                <div class="col-md-12">
                    <input type="number" id="other' . $product->id . '" class="form-control">
                </div>
                <div class="col-md-12" style="margin-top:10px;">
                    <a href="javascript:void(0)" onclick="AutoBid(0,' . $product->id . ')" class="btn btn-primary">Add</a>
                </div>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
            ';
                    // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
                }
                return $data;
            } else {
                return redirect('comprar-bids');
            }
        }
    }
    public function AutoBid(Request $request)
    {
        if (Auth::user() != null) {
            if ($request->qty <= Auth()->user()->bids) {
                $check = AutoBid::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->first();
                if (isset($check)) {
                    $check->bids = $check->bids + $request->qty;
                    $check->update();
                } else {
                    $auto = new AutoBid;
                    $auto->product_id = $request->product_id;
                    $auto->user_id = Auth()->user()->id;
                    $auto->bids = $request->qty;
                    $auto->save();
                }
                $user = User::find(Auth()->user()->id);
                $user->bids = $user->bids - $request->qty;
                $user->update();
                $msg = 'success';
                return $msg;
            } else {
                $msg = 'error';
                return $msg;
            }
        } else {
            $msg = 'error-login';
            return $msg;
        }
    }
    public function winByUser(Request $request)
    {
        $auto = AutoBid::where('product_id', $request->product_id)->where('bids', '!=', '0')->first();
        if (!isset($auto)) {
            $check = BidUse::where('product_id', $request->product_id)->orderBy('created_at', 'DESC')->first();
            if ($check->user_id == Auth()->user()->id) {
                $product = Product::find($request->product_id);
                $product->win = Auth()->user()->id;
                $product->update();
            }
        } else {
            $bid = new BidUse;
            $bid->product_id = $request->product_id;
            $bid->user_id = $auto->user_id;
            $bid->bids = 1;
            $bid->save();

            $product_bid = Product::find($request->product_id);
            $product_bid->bid_price = $product_bid->bid_price + $product_bid->min_bid_price;
            $product_bid->update();

            $auto->bids = $auto->bids-1;
            $auto->update();
        }
        if (Auth::user()) {
            $wish = Wish::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();
        } else {
            $wish = null;
        }
        // Fetch Products
        $products = Product::paginate(10);
        $data = '';
        if ($request->ajax()) {
            foreach ($products as $key => $product) {
                $date_from = date('Y-m-d H:i:s', strtotime($product->from));
                $date_to = date('Y-m-d H:i:s', strtotime($product->to));
                $current = date('Y-m-d H:i:s', strtotime(Carbon::now()));
                $date = date('d-m-Y H:i:s', strtotime($product->from));
                $date1 = date('d-m-Y', strtotime($product->from));
                $current1 = date('d-m-Y', strtotime(Carbon::now()));
                $user_book = "";
                $bid_user = BidUse::orderBy('created_at', 'DESC')->where('product_id', $product->id)->first();
                $user_book = $bid_user->user_name->name ?? "";
                $user_id = $bid_user->user_id ?? "";
                $data .= '<div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                <div class="card">
                <div class="favriot-acction">';
                if (isset($auto)) {
                    $data .= '<b class="bid-auto"><i class="fas fa-sync-alt" style="font-size:12px;"></i> ' . $auto->bids . '</b>';
                }
                if (isset($wish)) {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" class="active" ><i class="fa fa-star"></i></a>';
                } else {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" ><i class="fa fa-star"></i></a>';
                }

                $data .= '</div>
                    <a href="subasta/' . $product->id . '">
                        <img class="p-1 img2" src="' . asset("$product->image1") . '" alt="">
                        <a class="title">$ ' . $product->min_price . ' Tienda <br>
                        <span class="nickname">' . $product->name . '</span></a>

                        <span class="card_prize">$' . $product->bid_price . '</span>
                        <span class="nickname">' . $user_book . '</span></a>';
                if ($product->win == null) {
                    if (($current > $date_from) && ($current < $date_to)) {
                        if ($check != $user_id) {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <a href="javascript:void(0)" onclick="Bid(' . $product->id . ')" style="width:100%; border:none;">
                        <div class="card_rebre" style="background: green; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </a>';
                        } else {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <span style="width:100%; border:none;">
                        <div class="card_rebre" style="background: #5ee32a; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </span>';
                        }
                    } else {
                        $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                                font-size: 18px;
                                font-weight: bold;" id="win">10</span>';
                                if($date1==$current1){
                                    $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                                    }
                                $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                                <span style="width:100%; border:none;">
                                <div class="card_rebre">
                                         <h4> REOPEN SOON</h4>
                                </div>
                                </span>';
                    }
                } elseif ($product->win != null) {
                    $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                    font-size: 18px;
                    font-weight: bold;" id="win">10</span>';
                    if($date1==$current1){
                        $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                        }
                    $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                    <span style="width:100%; border:none;">
                    <div class="card_rebre" style="background: gray; margin-bottom:0px;">
                        <h4>WINDIDO</h4>
                    </div>
                    </span>';
                }

                $data .= '<div class="d-flex">
                            <a href="subasta/' . $product->id . '" class="btn btn-primary form-control" style="border-radius: 0px;">
                                <i class="fas fa-shopping-cart"></i>
                                $' . $product->price . '</a>
                            
                        </div>
                    </a>
                    <div class="bid-opction mt-1" id="bids' . $product->id . '">
                            <a href="javascript:void(0)" onclick="AutoBid(10,' . $product->id . ')"><i class="fa fa-plus"></i>10</a>
                             <a href="javascript:void(0)" onclick="AutoBid(20,' . $product->id . ')"><i class="fa fa-plus"></i>20</a>
                              <a href="javascript:void(0)" onclick="AutoBid(50,' . $product->id . ')"><i class="fa fa-plus"></i>50</a>
                               <a href="javascript:void(0)" onclick="AutoBid(100,' . $product->id . ')"><i class="fa fa-plus"></i>100</a>
                               <p class="mt-1"><a  href="#demo-modal' . $product->id . '" class="other-amount">Other Amount</a></p>
                        </div>
                </div>
            </div>
            <div id="demo-modal' . $product->id . '" class="modal">
        <div class="modal__content">
            <h3>Other Amount</h3>
            <div class="row">
                <div class="col-md-12">
                    <input type="number" id="other' . $product->id . '" class="form-control">
                </div>
                <div class="col-md-12" style="margin-top:10px;">
                    <a href="javascript:void(0)" onclick="AutoBid(0,' . $product->id . ')" class="btn btn-primary">Add</a>
                </div>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
            ';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
    }
    public function WishByUser(Request $request)
    {
        if (Auth::user()) {
            $check = Wish::where('product_id', $request->product_id)->where('user_id', Auth()->user()->id)->first();
            if (isset($check)) {
                $check->delete();
            } else {
                $wish = new Wish;
                $wish->product_id = $request->product_id;
                $wish->user_id = Auth()->user()->id;
                $wish->save();
            }
        } else {
            return redirect('login');
        }
        $products = Product::paginate(10);
        $data = '';
        if ($request->ajax()) {
            foreach ($products as $key => $product) {
                $date_from = date('Y-m-d H:i:s', strtotime($product->from));
                $date_to = date('Y-m-d H:i:s', strtotime($product->to));
                $current = date('Y-m-d H:i:s', strtotime(Carbon::now()));
                $date = date('d-m-Y H:i:s', strtotime($product->from));
                $date1 = date('d-m-Y', strtotime($product->from));
                $current1 = date('d-m-Y', strtotime(Carbon::now()));
                if (Auth::user()) {
                    $check = Auth()->user()->id;
                    $wish = Wish::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();
                } else {
                    $check = 0;
                    $wish = null;
                }
                $user_book = "";
                $bid_user = BidUse::orderBy('created_at', 'DESC')->where('product_id', $product->id)->first();
                $user_book = $bid_user->user_name->name ?? "";
                $user_id = $bid_user->user_id ?? "";
                $data .= '<div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                <div class="card">
                <div class="favriot-acction">';
                if (isset($auto)) {
                    $data .= '<b class="bid-auto"><i class="fas fa-sync-alt" style="font-size:12px;"></i> ' . $auto->bids . '</b>';
                }
                if (isset($wish)) {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" class="active" ><i class="fa fa-star"></i></a>';
                } else {
                    $data .= '<a href="javascript:void(0)" onclick="Wish(' . $product->id . ')" ><i class="fa fa-star"></i></a>';
                }

                $data .= '</div>
                    <a href="subasta/' . $product->id . '">
                        <img class="p-1 img2" src="' . asset("$product->image1") . '" alt="">
                        <a class="title">$ ' . $product->min_price . ' Tienda <br>
                        <span class="nickname">' . $product->name . '</span></a>

                        <span class="card_prize">$' . $product->bid_price . '</span>
                        <span class="nickname">' . $user_book . '</span></a>';
                if ($product->win == null) {
                    if (($current > $date_from) && ($current < $date_to)) {
                        if ($check != $user_id) {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <a href="javascript:void(0)" onclick="Bid(' . $product->id . ')" style="width:100%; border:none;">
                        <div class="card_rebre" style="background: green; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </a>';
                        } else {
                            $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                        font-size: 18px;
                        font-weight: bold;" id="win">10</span>';
                        if($date1==$current1){
                            $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                            }
                        $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                        <span style="width:100%; border:none;">
                        <div class="card_rebre" style="background: #5ee32a; margin-bottom:0px;">
                            <h4>PUJAR</h4>
                        </div>
                        </span>';
                        }
                    } else {
                        $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                                font-size: 18px;
                                font-weight: bold;" id="win">10</span>';
                                if($date1==$current1){
                                    $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                                    }
                                $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                                <span style="width:100%; border:none;">
                                <div class="card_rebre">
                                         <h4> REOPEN SOON</h4>
                                </div>
                                </span>';
                    }
                } elseif ($product->win != null) {
                    $data .= '<span id="seconds' . $product->id . '" style="color:red;text-align: center;
                    font-size: 18px;
                    font-weight: bold;" id="win">10</span>';
                    if($date1==$current1){
                        $data .= '<h4 class="card_time">Hoy a las ' . $date . '</h4>';
                        }
                    $data.='<input type="hidden" value="' . $product->id . '" id="product_id">
                    <span style="width:100%; border:none;">
                    <div class="card_rebre" style="background: gray; margin-bottom:0px;">
                        <h4>WINDIDO</h4>
                    </div>
                    </span>';
                }

                $data .= '<div class="d-flex">
                            <a href="subasta/' . $product->id . '" class="btn btn-primary form-control" style="border-radius: 0px;">
                                <i class="fas fa-shopping-cart"></i>
                                $' . $product->price . '</a>
                            
                        </div>
                    </a>
                    <div class="bid-opction mt-1" id="bids' . $product->id . '">
                            <a href="javascript:void(0)" onclick="AutoBid(10,' . $product->id . ')"><i class="fa fa-plus"></i>10</a>
                             <a href="javascript:void(0)" onclick="AutoBid(20,' . $product->id . ')"><i class="fa fa-plus"></i>20</a>
                              <a href="javascript:void(0)" onclick="AutoBid(50,' . $product->id . ')"><i class="fa fa-plus"></i>50</a>
                               <a href="javascript:void(0)" onclick="AutoBid(100,' . $product->id . ')"><i class="fa fa-plus"></i>100</a>
                               <p class="mt-1"><a  href="#demo-modal' . $product->id . '" class="other-amount">Other Amount</a></p>
                        </div>
                </div>
            </div>
            <div id="demo-modal' . $product->id . '" class="modal">
        <div class="modal__content">
            <h3>Other Amount</h3>
            <div class="row">
                <div class="col-md-12">
                    <input type="number" id="other' . $product->id . '" class="form-control">
                </div>
                <div class="col-md-12" style="margin-top:10px;">
                    <a href="javascript:void(0)" onclick="AutoBid(0,' . $product->id . ')" class="btn btn-primary">Add</a>
                </div>
            </div>
            <a href="#" class="modal__close">&times;</a>
        </div>
    </div>
            ';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
    }
    public function opinion()
    {
        $opinion = Opinion::where('status', 0)->get();
        return view('opinions', compact('opinion'));
    }
    public function opinion_auto(Request $request)
    {
        $opinion = Opinion::where('status', 0)->orderBy('created_at', 'DESC')->paginate(5);
        $like = OpinionLike::all();
        $data = '';
        if ($request->ajax()) {
            foreach ($opinion as $key => $item) {
                if (Auth::user()) {
                    $active = $like->where('opinion_id', $item->id)->where('user_id', Auth()->user()->id)->count();
                } else {
                    $active = $like->where('opinion_id', $item->id)->count();
                }
                $data .= '<div class="auction_box">
                <div class="row py-3" id="results">
                <div class="col-md-9 col-12 mt-2">
                <a href="#">
                    <div class="Daanniele">
                    <h2>' . $item->user_name->name . ' <span>ha compartido su logro</span></h2>
                        <div class="row">
                            <div class="col-5 col-md-3">
                                <img src="' . asset($item->product_name->image1) . '" alt="">
                            </div>
                            <div class="col-5 col-md-6">
                                <h3>' . $item->product_name->name . ' </h3>
                                <h4>' . $item->product_name->price . '  $ </h4>
                                <p>' . $item->product_name->price . '  $ </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 mt-2">
                                <img src="' . asset("$item->image") . '"
                                alt="">
                            </div>
                            </div>
                            <div class="gusta_btn">
                            <button class="btn"' . ((int)$active > 0 ? ' style="background: #0080FF; color: #fff;" ' : '') . ' onclick="Like(' . $item->id . ')">Me Gusta</button>
                            <span>(' . $like->where('opinion_id', $item->id)->count() . ')</span>
                        </div>';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
        return view('opinions');
    }
    public function most_opinion_auto(Request $request)
    {
        $opinion = Opinion::where('status', 0)->orderBy('id', 'ASC')->paginate(5);
        $like = OpinionLike::all();
        // $query ='SELECT opinions.id, opinions.user_id, opinions.image, opinions.product_id,
        // products.image1, products.name as product_name, products.price, users.name as u_name,opinion_likes.opinion_id,
        // SUM(opinion_likes.id) as Likes FROM opinions
        // JOIN products on products.id = opinions.product_id
        // JOIN users on users.id = opinions.user_id
        // JOIN opinion_likes on opinion_likes.opinion_id = opinions.id
        // GROUP BY opinions.id
        // ORDER BY SUM(opinion_likes.id) DESC LIMIT 5'; 
        // $opinions = DB::select(DB::raw($query));
        $data = '';
        if ($request->ajax()) {
            foreach ($opinion as $key => $item) {
                if (Auth::user()) {
                    $active = $like->where('opinion_id', $item->id)->where('user_id', Auth()->user()->id)->count();
                } else {
                    $active = $like->where('opinion_id', $item->id)->count();
                }

                $data .= '<div class="auction_box">
                <div class="row py-3" id="results">
                <div class="col-md-9 col-12 mt-2">
                <a href="#">
                    <div class="Daanniele">
                    <h2>' . $item->user_name->name . ' <span>ha compartido su logro</span></h2>
                        <div class="row">
                            <div class="col-5 col-md-3">
                                <img src="' . asset($item->product_name->image1) . '" alt="">
                            </div>
                            <div class="col-5 col-md-6">
                                <h3>' . $item->product_name->name . ' </h3>
                                <h4>' . $item->product_name->price . '  $ </h4>
                                <p>' . $item->product_name->price . '  $ </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 mt-2">
                                <img src="' . asset("$item->image") . '"
                                alt="">
                            </div>
                            </div>
                            <div class="gusta_btn">
                            <button class="btn"' . ((int)$active > 0 ? ' style="background: #0080FF; color: #fff;" ' : '') . ' onclick="Like(' . $item->id . ')">Me Gusta</button>
                            <span>(' . $like->where('opinion_id', $item->id)->count() . ')</span>
                        </div>';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
        return view('opinions');
    }
    public function likes(Request $request)
    {
        $check = OpinionLike::where('user_id', Auth()->user()->id)->where('opinion_id', $request->opinion_id)->first();
        if ($check != null) {
            $check->delete();
            return back();
        } else {
            $opinion = new OpinionLike;
            $opinion->user_id = Auth()->user()->id;
            $opinion->opinion_id = $request->opinion_id;
            $opinion->save();
            return back();
        }
    }
    public function bid_buy()
    {
        $package = Package::get();
        $payment_method = PaymentMethod::all();
        return view('bid_buy', compact('package', 'payment_method'));
    }
    public function checkout($id)
    {
        $product = Product::find($id);
        $payment_method = PaymentMethod::where('user_id', Auth()->user()->id)->get();
        return view('checkout', compact('product', 'payment_method'));
    }
    public function how_work()
    {
        return view('how_work');
    }
    public function faq()
    {
        $faq = Faq::all();
        return view('faq', compact('faq'));
    }
    public function Action_Close()
    {
        $use_bid = BidUse::all();
        return view('action_close', compact('use_bid'));
    }
    public function home(Request $request)
    {
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $check_ip = LogCapita::where('ip', $getip)->where('browser', $getbrowser)->first();
        if (!isset($check_ip)) {
            return redirect('se');
        }
        $search = $request->search;
        if (isset($search)) {
            $product = Product::where('category_id', $search)->get();
        } else {
            $product = Product::get();
        }

        $category = Category::all();
        $slider = Slider::all();
        return view('welcome', compact('product', 'category', 'search', 'slider'));
    }
    public function Se(Request $request)
    {
        // $validation = $request->validate(
        //     [
        //     'g-recaptcha-response' => 'required|captcha'
        // ]);
        $getip = UserSystemInfoHelper::get_ip();
        $getbrowser = UserSystemInfoHelper::get_browsers();
        $check_ip = new LogCapita;
        $check_ip->ip = $getip;
        $check_ip->browser = $getbrowser;
        $check_ip->save();
        return redirect('/');
    }
    public function product_detail($id)
    {
        $product = Product::where('id', $id)->first();
        $bid_use = BidUse::orderBy('created_at', 'DESC')->where('id', $id)->get();
        return view('product_detail', compact('product', 'bid_use'));
    }
    public function product_detail_bid($id)
    {
        $data = '';
        $product = Product::where('id', $id)->first();
        $bid_use = BidUse::orderBy('created_at', 'DESC')->where('id', $id)->get();
        foreach ($bid_use as $item) {
            $data .= '<tr>
            <td>' . $product->min_bid_price . '</td>
            <td>Manual</td>
            <td>' . $item->created_at->format('H:i:s') . '</td>
            <td>' . $item->user_name->name . '</td>
        </tr>';
        }
        return $data;
    }
    // public function Cv_Builder(){
    //     return view('cv_builder');
    // }
    // public function FaqSearch(Request $request){
    //     $service = Service::orderBy('created_at','ASC')->get();
    // 	$writing_point = WritingPoint::orderBy('created_at','ASC')->get();
    // 	$review = Review::orderBy('created_at','ASC')->get();
    // 	$faq_category = FaqCategory::orderBy('created_at','ASC')->get();
    // 	$faq = Faq::where('heading', 'LIKE', '%'.$request->search.'%')->orWhere('description', 'LIKE', '%'.$request->search.'%')->get();
    // 	$news = News::orderBy('created_at','DESC')->get();
    //     return view('welcome',compact('service','writing_point','review','faq_category','faq','news'));
    // }
    public function redirect()
    {
        if (auth()->user()->is_admin) {

            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect('win-product')->with('status', session('status'));
    }
}
