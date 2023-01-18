<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()

    {

            $contacts = Contact::orderBy('id','Desc')->paginate(4);
            $total_services = Service::count();
            $total_projects = Project::count();
            $blogs = Blog::count();
            return view('dashboard', ['contacts' => $contacts, 'blogs' => $blogs, 'total_services' => $total_services, 'total_projects' => $total_projects]);

    }
}
