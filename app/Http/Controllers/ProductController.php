<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

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
        $request->validate([
            'product_code' => 'required|alpha_num',
            'product_name' => 'required|string|max:100',
            'product_brand' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'unit' => 'required|string'
        ], [
            'required.product_code' => 'Kode produk harus diisi.',
            'alpha_num.product_code' => 'Kode produk harus berupa huruf atau angka',
            'required.product_name' => 'Nama produk harus diisi.',
            'string.product_name' => 'Nama produk harus berupa String.',
            'max.product_name' => 'Nama produk tidak boleh lebih dari 100 karakter.',
            'required.product_brand' => 'Nama brand harus diisi.',
            'string.product_brand' => 'Nama brand harus berupa String.',
            'max.product_brand' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'required.stock' => 'Jumlah stok harus diisi.',
            'numeric.stock' => 'Jumlah stok harus berupa angka.',
            'required.purchase_price' => 'Harga beli produk harus diisi.',
            'numeric.purchase_price' => 'Harga beli harus berupa angka.',
            'required.selling_price' => 'Harga jual produk harus diisi.',
            'numeric.selling_price' => 'Harga jual harus berupa angka.',
            'required.unit' => 'Unit produk harus diisi.',
            'string.unit' => 'Unit harus berupa String.'
        ]);

        Products::create($request->all());

        return redirect('/product')->with('success', 'Data produk berhasil ditambahkan.');
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
            'product_code' => 'required|alpha_num',
            'product_name' => 'required|string|max:100',
            'product_brand' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'purchase_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'unit' => 'required|string'
        ], [
            'required.product_code' => 'Kode produk harus diisi.',
            'alpha_num.product_code' => 'Kode produk harus berupa huruf atau angka',
            'required.product_name' => 'Nama produk harus diisi.',
            'string.product_name' => 'Nama produk harus berupa String.',
            'max.product_name' => 'Nama produk tidak boleh lebih dari 100 karakter.',
            'required.product_brand' => 'Nama brand harus diisi.',
            'string.product_brand' => 'Nama brand harus berupa String.',
            'max.product_brand' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'required.stock' => 'Jumlah stok harus diisi.',
            'numeric.stock' => 'Jumlah stok harus berupa angka.',
            'required.purchase_price' => 'Harga beli produk harus diisi.',
            'numeric.purchase_price' => 'Harga beli harus berupa angka.',
            'required.selling_price' => 'Harga jual produk harus diisi.',
            'numeric.selling_price' => 'Harga jual harus berupa angka.',
            'required.unit' => 'Unit produk harus diisi.',
            'string.unit' => 'Unit harus berupa String.'
        ]);

        $product = Products::find($id);
        $product->update();

        return redirect('/product')->with('success', 'Data produk berhasil diperbarui.');
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

        return redirect('/product')->with('success', 'Data produk berhasil dihapus.');
    }
}
