<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::paginate(7);
        return view('users.index',['users'=>$users]);
    }
    public function delete($id){
        User::Find($id)->delete();
        return redirect()->back()->with('success','User Deleted Successfully');


    }
    public function register()
    {
        return view('users.register');
    }
}
