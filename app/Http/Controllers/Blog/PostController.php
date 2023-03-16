<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
            'categories'    => Category::all()->sortBy('name')
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category'   => 'required',
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:posts',
            'thumbnail'         => 'image|file|max:1024',
            'content'       => 'required'
        ]);
        
        if ($request->file('thumbnail')) {
            $validatedData['image'] = $request->file('thumbnail')->store('post-images');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Post::create($validatedData);
        Alert::success('Success', 'Data Created Successfully!');

        return redirect(route('post.index'))->with('success', 'has been added new posts');

    }

    public function show(Post $post)
    {
        dd($post);
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

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
