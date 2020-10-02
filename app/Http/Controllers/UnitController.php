<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Units;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil data dari database dengan model
        $data = Units::all();

        return view('unit', compact('data'));
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
    public function addUnit(Request $request)
    {
        // $validator = \Validator::make($request->all(), [
        $request->validate([
            'unit_name' => 'required|string|unique:units',
            'descriptions' => 'required|string'
        ], [
            'unit_name.required' => 'Nama unit tidak boleh kosong.',
            'unit_name.string' => 'Nama unit harus berupa angka dan huruf',
            'unit_name.unique' => 'Nama unit sudah ada.',
            'descriptions.required' => 'Deskripsi unit tidak boleh kosong.',
            'descriptions.string' => 'Deskripsi unit harus berupa angka dan huruf'
        ]);

        // if ($validator->fails())
        // {
        //     return response()->json(['errors'=>$validator->errors()->all()]);
        // }

        // $input = $request->all();
        
        // Units::create($input);

        // $request->session()->flash('sukses', 'Data kategori berhasil ditambah');
        // return response()->json(['success'=>'Data is successfully added']);

        Units::create($request->all());
        
        return redirect('/unit')->with('sukses', 'Data unit berhasil ditambahkan.');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUnit($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editUnit($id)
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
    public function updateUnit(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|string',
            'descriptions' => 'required|string'
        ], [
            'unit_name.required' => 'Nama unit tidak boleh kosong.',
            'unit_name.string' => 'Nama unit harus berupa angka dan huruf',
            'unit_name.unique' => 'Nama unit sudah ada.',
            'descriptions.required' => 'Deskripsi unit tidak boleh kosong.',
            'descriptions.string' => 'Deskripsi unit harus berupa angka dan huruf'
        ]);

        $unit = Units::find($id);
        $unit->update($request->all());

        return redirect('/unit')->with('sukses', 'Data unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteUnit($id)
    {
        $unit = Units::find($id);
        $unit->delete();

        return redirect('/unit');
    }
}
