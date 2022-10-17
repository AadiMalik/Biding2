<?php

namespace App\Http\Controllers;

use App\Faq;
use App\FaqCategory;
use App\Models\Service;
use App\News;
use App\Brand;
use App\Category;
use App\Opinion;
use App\Product;
use App\Review;
use App\Sector;
use App\Support;
use App\WritingPoint;
use Illuminate\Http\Request;

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
                $data .= '<div class="col-lg-2 col-md-4 col-6 mt-3 p-1">
                <div class="card">
                    <a href="subasta/'.$product->slug.'">
                        <img class="p-1 img2" src="'.asset("$product->image1").'" alt="">
                        <a class="title">$ '.$product->limit.' Tienda</a>

                        <span class="card_prize">$'. $product->price.'</span>
                        <span class="nickname">'.$product->name .'</span>
                        <h4 class="card_time">Hoy a las '.$product->from .'</h4>
                        <div class="card_rebre">
                            <h4>REABRE PRONTO</h4>
                        </div>
                        <div class="d-flex p-1">
                            <button class="btn btn_theme1 mx-1">
                                <i class="fas fa-shopping-cart"></i>'.$product->price.'
                                €'.$product->price .'</button>
                            <button class="btn btn_theme2 mx-1"><i class="fas fa-shopping-cart"></i>UNO
                                MISMO</button>
                        </div>
                    </a>
                </div>
            </div>';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
        return view('welcome');
    }
    public function opinion()
    {
        $opinion = Opinion::where('status',0)->get();
        return view('opinions',compact('opinion'));
    }
    public function opinion_auto(Request $request)
    {
        $opinion = Opinion::where('status',0)->paginate(5);
        $data = '';
        if ($request->ajax()) {
            foreach ($opinion as $key => $item) {
                $data .= '<div class="auction_box">
                <div class="row py-3" id="results">
                <div class="col-md-9 col-12 mt-2">
                <a href="#">
                    <div class="Daanniele">
                    <h2>'.$item->user_name->name.' <span>ha compartido su logro</span></h2>
                        <div class="row">
                            <div class="col-5 col-md-3">
                                <img src="'.asset($item->product_name->image1).'" alt="">
                            </div>
                            <div class="col-5 col-md-6">
                                <h3>'.$item->product_name->name.' </h3>
                                <h4>'.$item->product_name->price.'  $ </h4>
                                <p>'.$item->product_name->price.'  $ </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 mt-2">
                                <img src="'.asset("$item->image").'"
                                alt="">
                            </div>
                            </div>
                            <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
        return view('opinions');
    }
    public function most_opinion_auto(Request $request)
    {
        $opinion = Opinion::where('status',0)->orderBy('id','ASC')->paginate(5);
        $data = '';
        if ($request->ajax()) {
            foreach ($opinion as $key => $item) {
                $data .= '<div class="auction_box">
                <div class="row py-3" id="results">
                <div class="col-md-9 col-12 mt-2">
                <a href="#">
                    <div class="Daanniele">
                    <h2>'.$item->user_name->name.' <span>ha compartido su logro</span></h2>
                        <div class="row">
                            <div class="col-5 col-md-3">
                                <img src="'.asset($item->product_name->image1).'" alt="">
                            </div>
                            <div class="col-5 col-md-6">
                                <h3>'.$item->product_name->name.' </h3>
                                <h4>'.$item->product_name->price.'  $ </h4>
                                <p>'.$item->product_name->price.'  $ </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-12 mt-2">
                                <img src="'.asset("$item->image").'"
                                alt="">
                            </div>
                            </div>
                            <div class="gusta_btn">
                            <button class="btn">Me Gusta</button>
                            <span>(2)</span>
                        </div>';
                // $data .= '<li>'. ($key + 1) .' <strong>'. $product->title .'</strong> : '. $product->desc .'</li>';
            }
            return $data;
        }
        return view('opinions');
    }
    public function home(Request $request)
    {
        $search=$request->search;
        $query = Product::query();
        if($search!=''){
            $query->where('category_id',$search);   
        }
        $product=$query->orderBy('id','desc')->get();
        
        $category = Category::all();
        return view('welcome',compact('product','category','search'));
       
    }
    public function product_detail($slug)
    {
        $product=Product::where('slug',$slug)->first();
        return view('product_detail',compact('product'));
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
      
        return redirect()->route('client.home')->with('status', session('status'));
    }
}
