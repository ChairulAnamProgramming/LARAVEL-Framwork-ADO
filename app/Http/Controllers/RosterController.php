<?php

namespace App\Http\Controllers;

use App\RosterModel;
use App\BagianModel;
use App\User;
use Illuminate\Http\Request;

class RosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = "Roster";
        $data['roster'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->get();
        $data['bagian'] = BagianModel::where('id_bagian', '!=', 1)->get();
        return view('roster.index', $data);
    }

    public function bagian($id)
    {
        $data['id_roster'] = $id;
        $data['sidebar'] = "Roster";
        $data['roster'] = User::where('users.id_bagian', $id)
            ->join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->get();

        return view('roster.bagian', $data);
    }

    public function print_bagian($id)
    {
        $data['roster'] = User::where('users.id_bagian', $id)
            ->join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->get();

        return view('roster.print-bagian', $data);
    }

    public function list_jadwal($id)
    {
        $data['id_karyawan'] = $id;
        $bulan = date('m');
        $data['sidebar'] = "Roster";
        $data['rosterku'] = User::where('id', $id)
            ->whereMonth('tanggal', $bulan)
            ->join('tb_merge', 'users.id', '=', 'tb_merge.id_karyawan')
            ->get();

        // dd($data['rosterku']);

        return view('roster.jadwal', $data);
    }

    public function print_jadwal($id)
    {

        $bulan = date('m');
        $data['sidebar'] = "Roster";
        $data['rosterku'] = User::where('id', $id)
            ->whereMonth('tanggal', $bulan)
            ->join('tb_merge', 'users.id', '=', 'tb_merge.id_karyawan')
            ->get();


        return view('roster.print-jadwal', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = "Roster";
        $data['karyawan'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')->get();
        return view('roster.tambah', $data);
    }

    public function search($nik)
    {
        $data = User::where('nik', $nik)->first();

        echo json_encode($data);
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
            'nik' => 'required',
            'id_karyawan' => 'required',
        ]);


        RosterModel::create($request->all());
        return redirect('/roster')->with('message', 'Jadwal roster barhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RosterModel  $rosterModel
     * @return \Illuminate\Http\Response
     */
    public function show(RosterModel $rosterModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RosterModel  $rosterModel
     * @return \Illuminate\Http\Response
     */
    public function edit(RosterModel $rosterModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RosterModel  $rosterModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RosterModel $rosterModel, $id)
    {
        $roster = RosterModel::where('id_roster', $id)->first();

        $id_karyawan = $roster->id_karyawan;

        RosterModel::where('id_roster', $id)->update([
            'tanggal' => $request->tanggal
        ]);

        return redirect('/roster' . '/' . $id_karyawan . '/jadwal')->with('message', 'Tanggal berhasil di perbaharui');
    }

    public function update_status(Request $request, $id)
    {
        RosterModel::where('id_roster', $id)->update([
            'status' => $request->status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RosterModel  $rosterModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RosterModel $rosterModel)
    {
        //
    }
}
