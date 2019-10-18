<?php

namespace App\Http\Controllers;

use App\SuratModel;
use App\BagianModel;
use App\User;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = 'Kontrak';
        $data['karyawan_mmi'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->where('status', 'MMI')
            ->orderBy('nama_bagian', 'ASC')
            ->get();


        // dd($data);
        return view('perpanjang-kontrak.index', $data);
    }

    // public function perpanjang_kontrak($perpanjang_kontrak)
    // {
    //     if ($perpanjang_kontrak == 'mmi') {
    //         $data['karyawan_mmi'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
    //             ->where('status', 'MMI')
    //             ->orderBy('nama_bagian', 'ASC')
    //             ->get();
    //         return view('perpanjang-kontrak.mmi', $data);
    //     } else {
    //         $data['karyawan_jc'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
    //             ->where('status', 'JC')
    //             ->orderBy('nama_bagian', 'ASC')
    //             ->get();
    //         return view('perpanjang-kontrak.jc', $data);
    //     }
    // }

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
            'no_surat' => 'required',
            'jenis_surat' => 'required',
            'tanggal' => 'required',
        ]);

        SuratModel::create($request->all());

        $data['no_surat'] = $request->no_surat;
        $data['jenis_surat'] = $request->jenis_surat;
        $data['tanggal'] = $request->tanggal;

        if ($request->jenis_surat == 'MMI') {
            $data['karyawan_mmi'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
                ->where('status', 'MMI')
                ->orderBy('nama_bagian', 'ASC')
                ->get();
            return view('perpanjang-kontrak.mmi', $data);
        } else {
            $data['karyawan_jc'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
                ->where('status', 'JC')
                ->orderBy('nama_bagian', 'ASC')
                ->get();
            return view('perpanjang-kontrak.jc', $data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratModel  $SuratModel
     * @return \Illuminate\Http\Response
     */
    public function show(SuratModel $SuratModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratModel  $SuratModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratModel $SuratModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratModel  $SuratModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratModel $SuratModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratModel  $SuratModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratModel $SuratModel)
    {
        //
    }
}
