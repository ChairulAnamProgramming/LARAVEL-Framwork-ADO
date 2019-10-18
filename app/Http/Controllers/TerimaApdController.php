<?php

namespace App\Http\Controllers;

use App\TerimaApdModel;
use App\BarangModel;
use Illuminate\Http\Request;

class TerimaApdController extends Controller
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
        $data['sidebar'] = 'Tambah Terima APD';
        $data['barang'] = BarangModel::all();
        return view('apd.tambah-terima-apd', $data);
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
            'id_barang' => 'required',
            'tanggal_terima' => 'required',
            'jumlah_terima' => 'required',
        ]);

        TerimaApdModel::create($request->all());
        return redirect('/apd')->with('message', 'Barang masuk telah di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TerimaApdModel  $terimaApdModel
     * @return \Illuminate\Http\Response
     */
    public function show(TerimaApdModel $terimaApdModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TerimaApdModel  $terimaApdModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TerimaApdModel $terimaApdModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TerimaApdModel  $terimaApdModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerimaApdModel $terimaApdModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TerimaApdModel  $terimaApdModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerimaApdModel $terimaApdModel)
    {
        //
    }
}
