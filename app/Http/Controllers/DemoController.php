<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        return view('index');
        // return view('home');
    }
    public function about()
    {
        return view('about');
    }

    public function upload(Request $request)
    {
        $public = time() . ' SHK.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('uploads', $public);
       return redirect()->back();
    }
}