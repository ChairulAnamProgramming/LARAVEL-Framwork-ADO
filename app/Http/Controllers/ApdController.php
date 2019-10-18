<?php

namespace App\Http\Controllers;

use App\ApdModel;
use App\BarangModel;
use App\User;
use Illuminate\Http\Request;
use DB;

class ApdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = date('m');
        $data['sidebar'] = 'APD';
        $data['apd'] = ApdModel::select('tb_apd.id_barang', 'jumlah_pinjam', 'stok', 'nama_barang', 'tanggal', 'jumlah_terima', DB::raw('SUM(jumlah_pinjam) AS pinjam'), DB::raw('SUM(jumlah_terima) AS terima'))
            ->whereMonth('tanggal', $bulan)
            ->join('tb_barang', 'tb_apd.id_barang', '=', 'tb_barang.id_barang')
            ->groupBy('tb_apd.id_barang')
            ->get();


        // dd($data['apd']);

        return view('apd.index', $data);
    }

    public function print_apd()
    {
        $bulan = date('m');
        $data['sidebar'] = 'APD';
        $data['apd'] = ApdModel::select('tb_apd.id_barang', 'jumlah_pinjam', 'stok', 'nama_barang', 'tanggal', 'jumlah_terima', DB::raw('SUM(jumlah_pinjam) AS pinjam'), DB::raw('SUM(jumlah_terima) AS terima'))
            ->whereMonth('tanggal', $bulan)
            ->join('tb_barang', 'tb_apd.id_barang', '=', 'tb_barang.id_barang')
            ->groupBy('tb_apd.id_barang')
            ->get();
        return view('apd.print', $data);
    }

    public function list_data()
    {
        $data['sidebar'] = 'APD';
        $data['list_data'] = ApdModel::join('tb_barang', 'tb_apd.id_barang', '=', 'tb_barang.id_barang')
            ->join('users', 'tb_apd.id_karyawan', '=', 'users.id')
            ->get();

        return view('apd.list-data', $data);
    }

    public function print_list_data()
    {
        $data['list_data'] = ApdModel::join('tb_barang', 'tb_apd.id_barang', '=', 'tb_barang.id_barang')
            ->join('users', 'tb_apd.id_karyawan', '=', 'users.id')
            ->get();

        return view('apd.print-list-data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = 'APD';
        $data['karyawan'] = User::all();
        $data['barang'] = BarangModel::all();
        return view('apd.tambah', $data);
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
            'id_barang' => 'required'
        ]);
        ApdModel::create($request->all());
        return redirect('/apd')->with('message', 'APD berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ApdModel  $apdModel
     * @return \Illuminate\Http\Response
     */
    public function show(ApdModel $apdModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ApdModel  $apdModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ApdModel $apdModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ApdModel  $apdModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApdModel $apdModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ApdModel  $apdModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApdModel $apdModel, $id)
    {
        ApdModel::where('id_apd', $id)->delete();
        return redirect('apd')->with('message', 'APD berhasil di hapus');
    }
}
