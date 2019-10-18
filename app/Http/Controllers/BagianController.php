<?php

namespace App\Http\Controllers;

use App\BagianModel;
use Illuminate\Http\Request;

class BagianController extends Controller
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
            'nama_bagian' => 'required',
            'status' => 'required',
        ]);

        BagianModel::create($request->all());
        return redirect('/karyawan/create')->with('message', 'Bagian berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function show(BagianModel $bagianModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BagianModel $bagianModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BagianModel $bagianModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BagianModel  $bagianModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BagianModel $bagianModel)
    {
        //
    }
}
