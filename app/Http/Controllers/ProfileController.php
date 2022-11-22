<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }
    public function update(Request $request){
        $user = User::find(Auth()->user()->id);
        $user->name = $request->name;
        $user->address = $request->address;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $upload = 'img/';
            $filename = time().$file->getClientOriginalName();
            $path    = move_uploaded_file($file->getPathName(), $upload.$filename);
            $user->image=$upload.$filename;
        }
        if($request->password!=null && $request->password == $request->confirm_password){
            $user->password = Hash::make($request->password);
        }
        $user->update();
        return back()->with('success','Profile Updated!');
    }
}
