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
    public function addCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|unique:categories',
            'description' => 'required|string'
        ], [
            'required.category_name' => 'Nama Kategori harus diisi.',
            'string.category_name' => 'Nama Kategori harus berupa String.',
            'unique.category_name' => 'Nama Kategori sudah ada.',
            'required.descriptions' => 'Deskripsi harus diisi.',
            'string.descriptions' => 'Deskripsi harus berupa String.'
        ]);

        Categories::create($request->all());

        return redirect('/category')->with('success', 'Data kategori berhasil ditambahkan.');
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
            'category_name' => 'required|string|unique:categories',
            'description' => 'required|string'
        ], [
            'required.category_name' => 'Nama Kategori harus diisi.',
            'string.category_name' => 'Nama Kategori harus berupa String.',
            'unique.category_name' => 'Nama Kategori sudah ada.',
            'required.descriptions' => 'Deskripsi harus diisi.',
            'string.descriptions' => 'Deskripsi harus String.'
        ]);

        $category = Categories::find($id);
        $category->update($request->all());

        return redirect('/category')->with('success', 'Data kategori berhasil diperbarui.');
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

        return redirect('/category')->with('success', 'Data kategori berhasil dihapus');
    }
}
