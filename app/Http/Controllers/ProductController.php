<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.products.index', [
            'title'     => 'Data Barang',
            'produk'    => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // if (!auth()->user()->is_admin) {
        //     return redirect('/dashboard');
        // }
        $warna = ['Hijau','Merah','Hitam','Biru','Putih','Coklat','Abu'];
        $ukuran = [];
        for ($i=2; $i <= 35; $i++) { 
            array_push($ukuran, $i);
        }
        return view('admin.products.create',[
            'title'         => 'Tambah Stok Barang',
            'products'      => ['id' => 1, 'name' => 'okok'],
            'listwarna'     => $warna,
            'listukuran'    => $ukuran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ];
        $validated = $request->validate($rules);
    
        Product::create($validated);
        Alert::success('Success', 'Data berhasil ditambah!');

        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('admin.products.edit-product', [
            'title'         => 'Edit Product',
            'produk'        => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $validated = $request->validate([
            'nama_produk'   => 'required|string|max:15',
            'warna'         => 'required',
            'ukuran'        => 'required',
            'stok'          => 'required',
        ]);
        Product::where('id', $product->id)->update($validated);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        Alert::success('Success', 'Data berhasil dihapus!');
        return redirect(route('products.index'));
    }
}
