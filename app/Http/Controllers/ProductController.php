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

        // // Membuat kode otomatis
        // $productCode = Products::select('product_code')->orderBy('id', 'DESC')->take(1)->get();
        // $urut = substr($productCode, 26, 1);
        // $tambah = $urut + 1;
        // // dd($tambah);
        // $tgl = date("d");
        // $bln = date("m");
        // $thn = date("y");

        // if (strlen($tambah) == 1) 
        // {
        //     $format = "TBK".$tgl.$bln.$thn."00".$tambah;
        // }elseif (strlen($tambah) == 2) {
        //     $format = "TBK".$tgl.$bln.$thn."00".$tambah;
        // }else{
        //     $format = "TBK".$tgl.$bln.$thn."00".$tambah;
        // }


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

        // Cek hasil inputan katgori sebelum disimpan buat di filter
        $productCode = Products::select('product_code')->orderBy('id', 'DESC')->take(1)->get();
        // dd($productCode);


        // dd($request->category_id);

        if ($request->category_id == '1') {
            // Membuat kode otomatis

            $urut = substr($productCode, 29, 1);
            $tambah = $urut + 1;
            // dd($tambah);
            $tgl = date("d");
            $bln = date("m");
            $thn = date("y");

            if (strlen($tambah) == 1) 
            {
                $format = "TBK".$tgl.$bln.$thn."00".$tambah;
            }elseif (strlen($tambah) == 2) {
                $format = "TBK".$tgl.$bln.$thn."00".$tambah;
            }else{
                $format = "TBK".$tgl.$bln.$thn."00".$tambah;
            }
        } elseif($request->category_id == '2') {
            $urut = substr($productCode, 29, 1);
            $tambah = $urut + 1;
            // dd($tambah);
            $tgl = date("d");
            $bln = date("m");
            $thn = date("y");

            if (strlen($tambah) == 1) 
            {
                $format = "PPR".$tgl.$bln.$thn."00".$tambah;
            }elseif (strlen($tambah) == 2) {
                $format = "PPR".$tgl.$bln.$thn."00".$tambah;
            }else{
                $format = "PPR".$tgl.$bln.$thn."00".$tambah;
            }
        }

        // dd($urut);


        $request->validate([
            'product_name' => 'required|string|max:100|unique:products',
            'product_brand' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
        ], [
            'product_name.required' => 'Nama produk tidak boleh kosong',
            'product_name.string' => 'Nama produk harus berupa String',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 100 karakter',
            'product_name.unique' => 'Nama produk sudah ada',
            'product_brand.required' => 'Nama brand tidak boleh kosong',
            'product_brand.string' => 'Nama brand harus berupa String',
            'product_brand.max' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'stock.required' => 'Jumlah stok tidak boleh kosong',
            'stock.numeric' => 'Jumlah stok harus berupa angka',
            'purchase_price.required' => 'Harga beli produk tidak boleh kosong',
            'selling_price.required' => 'Harga jual produk tidak boleh kosong',
            'unit_id.required' => 'Unit produk tidak boleh kosong',
            'category_id' => 'Kategori produk tidak boleh kosong'
        ]);

        $tes = Products::create([
            'product_code' => $format,
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
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required'
        ], [
            'product_code.required' => 'Kode produk tidak boleh kosong',
            'product_code.string' => 'Kode produk harus berupa String.',
            'product_name.required' => 'Nama produk tidak boleh kosong',
            'product_name.string' => 'Nama produk harus berupa String.',
            'product_name.max' => 'Nama produk tidak boleh lebih dari 100 karakter.',
            'product_brand.required' => 'Nama brand tidak boleh kosong',
            'product_brand.string' => 'Nama brand harus berupa String.',
            'product_brand.max' => 'Nama brand tidak boleh lebih dari 50 karakter',
            'stock.required' => 'Jumlah stok tidak boleh kosong',
            'stock.numeric' => 'Jumlah stok harus berupa angka.',
            'purchase_price.required' => 'Harga beli produk tidak boleh kosong',
            'selling_price.required' => 'Harga jual produk tidak boleh kosong',
            'unit_id.required' => 'Unit produk tidak boleh kosong',
            'category_id.required' => 'Kategori produk tidak boleh kosong'
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