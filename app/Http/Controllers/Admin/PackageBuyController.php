<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PackageBuy;
use Illuminate\Http\Request;

class PackageBuyController extends Controller
{
    public function index(){
        $package_buy = PackageBuy::all();
        return view('admin/package_buy.index',compact('package_buy'));
    }
}
