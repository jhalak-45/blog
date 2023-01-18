<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\DB;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index()
    {
        $services = Service::all();

        return view('services',['services'=>$services]);
    }
    public function service()
    {
        $services = Service::OrderBy('id','Desc')->paginate(7);

        return view('services.index', ['services' => $services]);
        //
    }
    public function create()
    {
        return view('services.create');
    }
    public  function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'description' => 'required'
        ]);

        $image = time() . "service." . $request->file('image')->getClientOriginalExtension();
        $service = new Service;
        $service->name = $request['name'];
        $service->description = $request['description'];
        $service->image =  $request->file('image')->storeAs('uploads', $image);
        $service->save();
        return redirect('/dashboard/services')->withSuccess('Service Created Successfully!');
    }
    public function edit($id)
    {
        $service = Service::find($id);
        if (is_null($service)) {
            return redirect('/dashboard/services');
        } else {
            $data = compact('service');
            return view('services.edit')->with($data);
        }
    }

    public function update(Request $request,Service $service)
    {

        if ($service->image) {
            Storage::delete($service->image);
        }
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);


        $image = time() . "service." . $request->file('image')->getClientOriginalExtension();
        $data['image'] =  $request->file('image')->storeAs('uploads', $image);
        $service->update($data);
        return redirect('/dashboard/services')->withSuccess('Service updated successfully!');

    }
    public function delete($id)
    {

        $service = Service::find($id);
        if ($service->image) {
            Storage::delete($service->image);
        }
        $service->delete();

        return redirect()->back()->withSuccess('Service Deleted successfully!');
    }
}
