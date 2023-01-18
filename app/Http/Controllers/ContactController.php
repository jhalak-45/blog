<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Contactd;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contact = Contactd::first();

        return view('contact',['contact'=>$contact]);
    }
    public function show()
    {
        $contact = Contactd::first();
        return view('contact.index',['contact'=>$contact]);
    }
    public function update(Request $request)
    {
        $contact = Contactd::first();
        $contact->update($request->all());
        return redirect()->back()->with('success','Contacts updated successfully.');
    }




    // public function dash()
    // {
    //     $contacts = Contact::orderBy('id','Desc')->paginate(4);
    //     $total_services = Service::count();
    //     $total_projects = Project::count();
    //     $blogs = Blog::count();

    //     return view('dashboard', ['contacts' => $contacts, 'blogs' => $blogs, 'total_services' => $total_services, 'total_projects' => $total_projects]);
    // }

    public function send(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
                'address' => 'required',
                'subject' => 'required',
                'message' => 'required'
            ]
        );

        Contact::create($request->all());
        return back()->with('success', 'I have recieved your Message, I will response after few minutes.');
    }
    public function destroy($id)
    {
        $contact = Contact::find($id)->delete();


        return redirect()->back();
    }
}
