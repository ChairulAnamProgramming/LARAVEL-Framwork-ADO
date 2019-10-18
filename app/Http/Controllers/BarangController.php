<?php

namespace App\Http\Controllers;

use App\BarangModel;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class BarangController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:tb_barang'
        ]);

        BarangModel::create($request->all());

        return redirect('/apd/create')->with('message', 'Barang berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function show(BarangModel $barangModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangModel $barangModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangModel $barangModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BarangModel  $barangModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BarangModel $barangModel)
    {
        //
    }
}
