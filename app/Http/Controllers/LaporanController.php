<?php

namespace App\Http\Controllers;

use App\SuratModel;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function perpanjang_kontrak()
    {
        $data['sidebar'] = 'Laporan Surat';
        $data['perpanjang_kontrak'] = SuratModel::all();
        return view('laporan.perpanjang_kontrak', $data);
    }

    public function print()
    {
        $data['perpanjang_kontrak'] = SuratModel::all();
        return view('laporan.print', $data);
    }
}
