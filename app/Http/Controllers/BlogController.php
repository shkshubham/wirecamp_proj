<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Blog;
use Auth;
class BlogController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255|unique',
            'body' => 'required|',
            'slug' => 'unique'
        ]);
    }

    public function index(){
        $blogs= Blog::orderBy('id', 'desc')->paginate(30);
        return view('blog.index',compact('blogs'));
    }

    public function create(){
        return view('blog.create');
    }
    
    public function show($blog){
        $blog = Blog::where('slug', $blog)->firstOrFail();;
        return view('blog.show',compact('blog'));
    }
    public function store(Request $request){
        $slug = Str::slug($request->get('title'));
        Blog::create([
            'user_id' => Auth::user()->id,
            'slug' => $slug,
            'title' => $request->title,
            'body' => $request->body
        ]);
        return redirect('/blogs');
    }
    public function edit($blog){
        $blog = Blog::where('slug', $blog)->firstOrFail();
        if (Auth::user()->id == $blog->user_id) {
            return view('blog.edit',compact('blog'));
        }

        return 'You can not edit this post';
    }
    public function update(Request $request, $blog){
        $blog = Blog::where('slug', $blog)->firstOrFail();
        $blog->update($request->all());
        return redirect('/blogs/'.$blog->slug);
    }
    public function destroy($blog){
        $delete_blog = Blog::where('slug', $blog)->firstOrFail();
        $delete_blog->delete();
        return redirect('/blogs');
    }
}
