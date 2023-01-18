<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        $content=Setting::first();
        return view('about',['content'=>$content]);
    }
}
