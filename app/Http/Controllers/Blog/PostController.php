<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

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
            'category'      => 'required',
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:posts',
            'image'         => 'image|file|max:1024',
            'content'       => 'required'
        ]);
        
        if ($request->file('image')) {
            $imageName = $request->file('image');
            $validatedData['image'] = $imageName->hashName();
            $request->file('image')->storeAs('public/post-image', $imageName->hashName());
        }

        $validatedData['category_id'] = $request->category;

        Post::create($validatedData);
        Alert::success('Success', 'Data Created Successfully!');

        return redirect(route('post.index'));
    }

    public function show(Post $post)
    {
        dd($post);
    }

    public function edit(Post $post)
    {
        //
        return view('admin.blog.posts.edit', [
            'title_page'    => 'Edit Post',
            'categories'    => Category::all()->sortBy('name'),
            'post'          => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'category_id'   => 'required',
            'title'         => 'required|max:255',
            'slug'          => 'required|unique:posts',
            'image'         => 'image|file|max:1024',
            'content'       => 'required'
        ]);

        if ($request->file('image')) {
            Storage::delete('public/post-image/'.$post->image);
            
            $imageName = $request->file('image');
            $validatedData['image'] = $imageName->hashName();
            $request->file('image')->storeAs('public/post-image', $imageName->hashName());
        }
        
        // dd($validatedData, $request);
        Post::where('id', $post->id)->update($validatedData);
        Alert::success('Success', 'Data Created Successfully!');

        return redirect(route('post.index'));
    }

    public function destroy(Post $post)
    {
        Storage::delete('public/post-image/'.$post->image);

        Post::destroy($post->id);
        Alert::success('Success', 'Data Deleted Successfully!');

        return redirect(route('post.index'));
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->slug);

        return response()->json(['slug' => $slug]);
    }
}
