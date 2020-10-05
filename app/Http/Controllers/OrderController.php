<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categories;
use App\Models\Customers;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Units;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // ORDER CODE 
        $ordercode = Orders::select('invoice')->orderBy('id', 'DESC')->take(1)->get();
        $urut = substr($ordercode, 26, 1);
        $tambah = $urut + 1;
        // dd($tambah);
        $tgl = date("d");
        $bln = date("m");
        $thn = date("y");

        if (strlen($tambah) == 1) 
        {
            $format = "TR".$tgl.$bln.$thn."0000".$tambah;
        }elseif (strlen($tambah) == 2) {
            $format = "TR".$tgl.$bln.$thn."0000".$tambah;
        }else{
            $format = "TR".$tgl.$bln.$thn."0000".$tambah;
        }
        // END ORDER CODE


        $product = Products::all();

        return view('order', compact('product','format'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
