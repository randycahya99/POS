<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data dari database dengan model
        $category = Categories::all();

        return view('category', compact('category'));
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
    public function addCategory(Request $request)
    {
        // $request->session()->flash('a', 'Data kategori berhasil ditambah');
        $request->validate([
            'category_code' => 'required|alpha|max:10|unique:categories',
            'category_name' => 'required|string|unique:categories',
            'descriptions' => 'required|string'
        ], [
            'category_code.required' => 'Kode kategori tidak boleh kosong',
            'category_code.alpha' => 'Kode kategori harus berupa huruf',
            'category_code.max' => 'Kode kategori tidak boleh lebih dari 10',
            'category_code.unique' => 'Kode kategori sudah ada',
            'category_name.required' => 'Nama kategori tidak boleh kosong',
            'category_name.string' => 'Nama kategori harus berupa huruf dan angka',
            'category_name.unique' => 'Nama kategori sudah ada',
            'descriptions.required' => 'Deskripsi kategori tidak boleh kosong',
            'descriptions.string' => 'Deskripsi kategori harus berupa huruf dan angka'
        ]);

        // if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }

        // $input = $request->all();
        
        // Categories::create($input);

        
        // return response()->json(['success'=>'Data is successfully added']);

        Categories::create($request->all());
        
        return redirect('/category')->with('sukses', 'Data kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCategory($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCategory($id)
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
    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'category_code' => 'required|alpha|max:10',
            'category_name' => 'required|string',
            'descriptions' => 'required|string'
        ], [
            'category_code.required' => 'Kode kategori tidak boleh kosong',
            'category_code.alpha' => 'Kode kategori harus berupa huruf',
            'category_code.max' => 'Kode kategori tidak boleh lebih dari 10',
            'category_name.required' => 'Nama kategori tidak boleh kosong',
            'category_name.string' => 'Nama kategori harus berupa huruf dan angka',
            'category_name.unique' => 'Nama kategori sudah ada',
            'descriptions.required' => 'Deskripsi kategori tidak boleh kosong',
            'descriptions.string' => 'Deskripsi kategori harus berupa huruf dan angka'
        ]);

        $category = Categories::find($id);
        $category->update($request->all());

        // $request->session()->flash('b', 'Data kategori berhasil ditambah');
        return redirect('/category')->with('sukses', 'Data kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory($id)
    {
        $category = Categories::find($id);
        $category->delete();

        return redirect('category');
    }
}
