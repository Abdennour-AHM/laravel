<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request){
        $cp=$request->session()->increment('cp');
        //$request->session()->forget('cp');

        return view('home',compact('cp'));
    }
}
