<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Contactd;
use App\Models\Blog;
use App\Models\Project;
use App\Models\Service;

class IndexController extends Controller
{
    //
    public function index()

    {
        $blogs=Blog::OrderBy('id','Desc')->paginate(3);
        $contact = Contactd::first();
        $projects=Project::OrderBy('id','Desc')->paginate(3);
        $services=Service::OrderBy('id','Desc')->paginate(3);

        $data = Setting::first();
        return view('index', ['data' => $data,'contact'=>$contact,'blogs'=>$blogs,'projects'=>$projects,'services'=>$services]);
    }
}
