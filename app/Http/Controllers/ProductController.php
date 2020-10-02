<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Models\Products;
use App\Models\Units;
use App\Models\Categories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $product = Products::select()->where('product_brand', 'Petani Unggulan')->orderBy('id', 'ASC')->get();
        // dd($product);
        $product = Products::all();
        $unit = Units::all();
        $category = Categories::all();

        return view('product', compact('product','unit','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        $beli = $request->purchase_price;
        $beli = Str::replaceArray('.', ['','','',''], $beli);
        $beli1 = $beli;
        $beli1 = Str::replaceArray('Rp', ['','','',''], $beli1);

        $jual = $request->selling_price;
        $jual = Str::replaceArray('.', ['','','',''], $jual);
        $jual1 = $jual;
        $jual1 = Str::replaceArray('Rp', ['','','',''], $jual1);


        

        $request->validate([
            'product_code' => 'required|string|unique:products',
            'product_name' => 'required|string|max:100|unique:products',
            'product_brand' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
        ], [
            'product_code.required' => 'Kode produk harus diisi.',
            'product_code.string' => 'Kode produk harus berupa String.',
            'product_code.unique' => 'Kode produk sudah ada.',
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.string' => 'Nama produk harus berupa String.',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 100 karakter.',
            'product_name.unique' => 'Nama produk sudah ada.',
            'product_brand.required' => 'Nama brand harus diisi.',
            'product_brand.string' => 'Nama brand harus berupa String.',
            'product_brand.max' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'stock.required' => 'Jumlah stok harus diisi.',
            'stock.numeric' => 'Jumlah stok harus berupa angka.',
            'purchase_price.required' => 'Harga beli produk harus diisi.',
            'selling_price.required' => 'Harga jual produk harus diisi.',
            'unit_id.required' => 'Unit produk harus diisi.',
            'category_id' => 'Kategori produk harus diisi.'
        ]);

        $tes = Products::create([
            'product_code' => $request->product_code,
            'product_name' => $request->product_name,
            'product_brand' => $request->product_brand,
            'stock' => $request->stock,
            'purchase_price' => $beli1,
            'selling_price' => $jual1,
            'unit_id' => $request->unit_id,
            'category_id' => $request->category_id
        ]);


        return redirect('/product')->with('sukses', 'Data produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProduct($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required|string',
            'product_name' => 'required|string|max:100',
            'product_brand' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'unit_id' => 'required',
            'category_id' => 'required'
        ], [
            'product_code.required' => 'Kode produk harus diisi.',
            'product_code.string' => 'Kode produk harus berupa String.',
            'product_name.required' => 'Nama produk harus diisi.',
            'product_name.string' => 'Nama produk harus berupa String.',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 100 karakter.',
            'product_brand.required' => 'Nama brand harus diisi.',
            'product_brand.string' => 'Nama brand harus berupa String.',
            'product_brand.max' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'stock.required' => 'Jumlah stok harus diisi.',
            'stock.numeric' => 'Jumlah stok harus berupa angka.',
            'purchase_price.required' => 'Harga beli produk harus diisi.',
            'purchase_price.numeric' => 'Harga beli harus berupa angka.',
            'selling_price.required' => 'Harga jual produk harus diisi.',
            'selling_price.numeric' => 'Harga jual harus berupa angka.',
            'unit_id.required' => 'Unit produk harus diisi.',
            'category_id.required' => 'Kategori produk harus diisi.'
        ]);

        $product = Products::find($id);
        $product->update($request->all());

        return redirect('/product')->with('sukses', 'Data produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($id)
    {
        $product = Products::find($id);
        $product->delete();

        return redirect('/product');
    }
}