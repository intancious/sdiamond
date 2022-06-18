<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        // dd($products);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(Request $request)
    public function store(ProductRequest $request)
    {
        //all request dan validasi ambil di http/request/ProductRequest.php
        $data = $request->all();
        // dd($data);
        Product::create($data);
        Alert::success('Selamat', 'Data Berhasil Ditambahkan!');
        return redirect()->route('product.index');
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        // dd($categories);
        // dd($product);
        return view('pages.product.edit', [
            'item' => $product,
            'categories' => $categories
        ]);
    }


    public function update(ProductRequest $request, Product $product)
    {
        //sama ini validasi dan request di http/request/productRequest.php
        $data = $request->all();
        $product->update($data);
        // dd($data);
        Alert::success('Selamat', 'Data Berhasil Diupdate!');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // dd($product);
        Alert::success('Data Berhasil Dihapus!');
        return redirect()->route('product.index');
    }
}
