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
                        $actionBtn = '<a href="#" id="edit-post" class="btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.products.index', ['title_page'    => 'Data Products']);
    }
    public function indexs(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id','name','email')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('users');
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
