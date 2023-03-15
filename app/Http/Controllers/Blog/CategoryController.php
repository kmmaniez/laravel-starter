<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function index()
    {
        //
        return view('admin.blog.categories.index', [
            'title_page'    => 'Data Categories',
            'categories'    => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        // Make rules validation from request
        $validator  =   Validator::make($request->all(),[
            'category_name' => 'required'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Save category
        $category   =   Category::create(['name' =>  $request->category_name]);

        // Return result response
        return response()->json([
            'success'   =>  true,
            'message'   =>  'Data created successfully',
            'data'      =>  $category
        ]);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
