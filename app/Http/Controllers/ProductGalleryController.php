<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductGalleryRequest;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galery = ProductGallery::with('product')->get();
        // return $galery;
        // dd($galery);
        return view('pages.galery.index', compact('galery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Product::all();
        // dd($produk);
        return view('pages.galery.create', compact('produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->file('url')->store('gallery');
        // dd($request->all());
        $validatedData = $request->validate([
            'products_id'       => 'required',
            'url'              => 'required|image|file||max:1024',
        ]);
        if ($request->file('url')) {
            $validatedData['url'] = $request->file('url')->store('gallery', 'public');
        }
        try {
            $galery = ProductGallery::create($validatedData);
            $produk = Product::findorfail($request->products_id);

            //save datanya
            $dataSave = [
                'id' => $galery->id,
                'products_id' => $produk->id,
            ];
            ProductGallery::create($dataSave);

            $message = "Berhasil";
            $status = 1;
        } catch (\Exception $e) {

            // dd($e->getMessage());
            $message = "Gagal";
            $status = -1;
        }
        Alert::success('Selamat', 'Data Berhasil Ditambahkan!');
        return redirect()->route('galery.index', $produk->id)
            ->with('message', "Data $message Ditambahkan")
            ->with('status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(ProductGalleryRequest $request, ProductGallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $productGallery, $id)
    {
        // dd($id);
        // dd($productGallery);
        // $productGallery->delete();
        // $productGallery::destroy($productGallery->id);
        ProductGallery::destroy($id);
        Alert::success('Data Berhasil Dihapus!');
        return redirect()->route('galery.index');
    }
}
