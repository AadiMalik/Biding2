<?php

namespace App\Http\Controllers;

use App\Faq;
use App\FaqCategory;
use App\Models\Service;
use App\News;
use App\Brand;
use App\Category;
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
