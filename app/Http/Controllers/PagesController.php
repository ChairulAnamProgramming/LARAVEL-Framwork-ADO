<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApdModel;
use App\MergeModel;
use App\RosterModel;
use App\SuratModel;

class PagesController extends Controller
{
    public function Dashboard()
    {
        $data['count_merge'] = count(MergeModel::all());
        $data['count_roster'] = count(RosterModel::all());
        $data['count_surat'] = count(SuratModel::all());
        $data['count_apd'] = count(ApdModel::whereMonth('tanggal', date('m'))->get());
        $data['sidebar']  = 'Dashboard';
        return view('dashboard.index', $data);
    }
}
