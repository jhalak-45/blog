<?php

namespace App\Http\Controllers;
// use Illuminate\Database\Query\Builder;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Http\Request;
// use Nette\Utils\Paginator;
use Illuminate\Support\Carbon;


class BlogController extends Controller
{
    //
    public function index()
    {
        //passing data to blog page frontside
        $blogs = Blog::orderBy('id', 'Desc')->paginate(12);
        return view('blog', ['blogs' => $blogs]);
    }
    public function view($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return redirect('/blog');
        } else {
            $data = compact('blog');
            return view('blog.view')->with($data);
        }
    }

    public function blog(Request $request)
    {
        // $blogs = DB::select('select * from blogs');
        $blogs = Blog::orderBy('id','Desc')->paginate(7);

        return view('blog.index', ['blogs' => $blogs]);
        //
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'thumbnail' => 'required |image:jpg,png,jpeg'
        ]);
        $thumbnailName = time() . "blog." . $request->file('thumbnail')->getClientOriginalExtension();
        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->excerpt = $request['excerpt'];
        $blog->description = $request['description'];
        $blog->thumbnail =  $request->file('thumbnail')->storeAs('uploads', $thumbnailName);
        $blog->save();
        return redirect('/dashboard/blog')->withSuccess('Blog created successfully!');
    }
    public function edit($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return redirect('/dashboard/blog');
        } else {
            $data = compact('blog');
            return view('blog.edit')->with($data);
        }
    }
    public function update(Request $request, Blog $blog)
    {

        if ($blog->thumbnail) {
            Storage::delete($blog->thumbnail);
        }
        $data = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'description' => 'required',
            'thumbnail' => 'required'
        ]);


        $thumbnailName = time() . "blog." . $request->file('thumbnail')->getClientOriginalExtension();
        $data['thumbnail'] =  $request->file('thumbnail')->storeAs('uploads', $thumbnailName);
        $blog->update($data);
        return redirect('/dashboard/blog')->withSuccess('Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        if ($blog->thumbnail) {
            Storage::delete($blog->thumbnail);
        }
        $blog->delete();

        return redirect()->back()->withSuccess('Blog Deleted successfully!');
    }
}
