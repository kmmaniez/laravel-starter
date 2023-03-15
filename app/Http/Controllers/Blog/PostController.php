<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.blog.posts.index', [
            'title_page'    => 'Data Posts',
            'posts'         => Post::all()
        ]);
    }

    public function create()
    {
        return view('admin.blog.posts.create',[
            'title_page'    => 'Create Post',
            'categories'    => Category::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
