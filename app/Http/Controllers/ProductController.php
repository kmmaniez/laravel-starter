<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Alert;
use App\Http\Requests\StoreProductRequest;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    public function index()
    {
        if (request()->ajax()) {
            $users = Product::query();
            return DataTables::eloquent($users)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="/products/'.$row->id.'" id="edit-post" class="btn btn-success btn-sm">Edit</a> <a href="#" data-id="'.$row->id.'" id="deleteProduct" class="btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.products.index', ['title_page'    => 'Data Products']);
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
        $validated  = $request->validated();

        if (!$validated) {
            return response()->json($validated->errors(), 422);
        }

        $product    = Product::create($validated);

        return response()->json([
            'success'   =>  true,
            'message'   =>  'Data Created Successfully',
            'data'      =>  $product
        ]);
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

        return response()->json([
            'success'   =>  true,
            'message'   =>  'Data Deleted Successfully'
        ]);
        return redirect(route('products.index'));
    }
}
