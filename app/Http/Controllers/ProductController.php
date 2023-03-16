<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\StoreProductRequest;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.products.index', [
            'title_page'    => 'Data Products',
            'product'       => Product::all()
        ]);
    }

    public function create()
    {
        return view('admin.products.create',[
            'title_page'    => 'Create Product',
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        // Retrieve validated data from rules in StoreProductReq
        $validated = $request->validated();
        
        Product::create($validated);
        Alert::success('Success', 'Data Created Successfully!');

        return redirect('/products');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'title_page'    => 'Edit Product',
            'product'       => $product,
        ]);
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $validated = $request->validated();
        
        Product::where('id', $product->id)->update($validated);
        Alert::success('Success', 'Data Updated Successfully!');

        return redirect(route('products.index'));
    }

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        Alert::success('Success', 'Data Deleted Successfully!');

        return redirect(route('products.index'));
    }
}
