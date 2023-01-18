<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects=Project::OrderBy('id','Desc')->paginate(14);
        return view('projects',['projects'=>$projects]);
    }
    public function project()
    {
        $projects = Project::OrderBy('id','Desc')->paginate(7);
        return view('projects.index', ['projects' => $projects]);
    }
    public function create()
    {
        return view('projects.create');
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'url',
            'image' => 'required|image',
            'description' => 'required',
        ]);
        // $response = \Illuminate\Support\Facades\Http::get('https://shot.screenshotapi.net/screenshot', [
        //     'token' => 'BNH4E0A-PQ14H4A-PYV0DDP-5GKHR09',
        //     'url' => 'https://mohrain.com',
        //     // 'output' => 'image'
        // ]);
        // // return $response;

        // return $response->json();


        $image = time() . "project." . $request->file('image')->getClientOriginalExtension();
        $project = new Project;
        $project->name = $request['name'];
        $project->url = $request['url'];
        $project->description = $request['description'];
        $project->image =  $request->file('image')->storeAs('uploads', $image);
        $project->save();
        return redirect('/dashboard/projects')->withSuccess('Project Created Successfully!');
    }
    public function edit($id)
    {
        $project = Project::find($id);
        if (is_null($project)) {
            return redirect('/dashboard/projects');
        } else {
            $data = compact('project');
            return view('projects.edit')->with($data);
        }
    }
    public function update(Request $request, Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'url' => 'url',
            'description' => 'required'

        ]);
        $image = time() . "project." . $request->file('image')->getClientOriginalExtension();
        $data['image'] =  $request->file('image')->storeAs('uploads', $image);
        $project->update($data);
        return redirect('/dashboard/projects')->withSuccess('Project updated successfully!');
    }
    public function delete($id)
    {

        $project = Project::find($id);
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();

        return redirect()->back()->withSuccess('Project Deleted successfully!');
    }



    public function view($id){
        $project = Project::find($id);
        if (is_null($project)) {
            return redirect('/projects');
        } else {
            $data = compact('project');
            return view('projects.view')->with($data);
        }

    }
}
