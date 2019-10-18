<?php

namespace App\Http\Controllers;

use App\MergeModel;
use App\User;
use DB;
use Illuminate\Http\Request;

class MergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = "Merge";

        $data['merge'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->orderBy('nama_bagian', 'ASC')
            ->get();
        $data['sidebar'] = 'merga';
        return view('merge.index', $data);
    }

    // Bagian Rekapitulasi

    public function rek_jenis($id)
    {
        $data['id_karyawan'] = $id;
        $data['sidebar'] = "Merge";
        return view('merge.rekapitulasi.rek-jenis', $data);
    }

    public function rek_invoice($id)
    {
        $data['id_karyawan'] = $id;
        $data['sidebar'] = "Merge";
        $data['hari_keraja'] = MergeModel::where('status_onoff', 'ON')->where('in_keterangan', null)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['tidak_masuk'] = MergeModel::where('in_keterangan', 2)->orWhere('in_keterangan', 3)->orWhere('in_keterangan', 4)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['gajihP'] = DB::table('tb_gaji_pokok')->first();


        $data['total_jl'] = MergeModel::select('jam_lembur', DB::raw('SUM(jam_lembur) as total_jl'))
            ->where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->get();

        $data['merge'] = MergeModel::select('jam_lembur', 'name', 'nik', 'nama_bagian', 'tmk', 'tanggal', DB::raw('SUM(jam_lembur) as total_jl'))
            ->where('id_karyawan', $id)
            ->whereMonth('tanggal', date('m'))
            ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
            ->join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->get();


        return view('merge.rekapitulasi.invoice.rek-invoice', $data);
    }

    public function print_invoice($id)
    {
      $data['id_karyawan'] = $id;
      $data['sidebar'] = "Merge";
      $data['hari_keraja'] = MergeModel::where('status_onoff', 'ON')->where('in_keterangan', null)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['tidak_masuk'] = MergeModel::where('in_keterangan', 2)->orWhere('in_keterangan', 3)->orWhere('in_keterangan', 4)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['gajihP'] = DB::table('tb_gaji_pokok')->first();


      $data['total_jl'] = MergeModel::select('jam_lembur', DB::raw('SUM(jam_lembur) as total_jl'))
          ->where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->get();

      $data['merge'] = MergeModel::select('jam_lembur', 'name', 'nik', 'nama_bagian', 'tmk', 'tanggal', DB::raw('SUM(jam_lembur) as total_jl'))
          ->where('id_karyawan', $id)
          ->whereMonth('tanggal', date('m'))
          ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
          ->join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
          ->get();


      return view('merge.rekapitulasi.invoice.rek-invoice-print', $data);
    }


    public function rek_absen($id)
    {
        $data['id_karyawan'] = $id;
        $data['hari_keraja'] = MergeModel::where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->count();
        $data['total_jl'] = MergeModel::select('jam_lembur', DB::raw('SUM(jam_lembur) as total_jl'))->where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->get();

        $data['libur'] = MergeModel::where('in_keterangan', 0)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['sakit'] = MergeModel::where('in_keterangan', 1)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['izin'] = MergeModel::where('in_keterangan', 2)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['skors'] = MergeModel::where('in_keterangan', 3)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['alpa'] = MergeModel::where('in_keterangan', 4)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();

        $data['sidebar'] = "Merge";
        $data['merge'] = MergeModel::where('tb_merge.id_karyawan', $id)
            ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
            ->orderBy('in', 'ASC')
            ->get();
        $data['sidebar'] = 'merga';
        return view('merge.rekapitulasi', $data);
    }

    public function print_absen($id)
    {
      $data['id_karyawan'] = $id;
      $data['hari_keraja'] = MergeModel::where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->count();
      $data['total_jl'] = MergeModel::select('jam_lembur', DB::raw('SUM(jam_lembur) as total_jl'))->where('status_onoff', 'ON')->where('tb_merge.id_karyawan', $id)->get();

      $data['libur'] = MergeModel::where('in_keterangan', 0)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['sakit'] = MergeModel::where('in_keterangan', 1)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['izin'] = MergeModel::where('in_keterangan', 2)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['skors'] = MergeModel::where('in_keterangan', 3)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
      $data['alpa'] = MergeModel::where('in_keterangan', 4)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();

      $data['sidebar'] = "Merge";
      $data['merge'] = MergeModel::where('tb_merge.id_karyawan', $id)
          ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
          ->orderBy('in', 'ASC')
          ->get();
      $data['sidebar'] = 'merga';
      return view('merge.rekapitulasi.absen.rek-absen-print', $data);
    }


    public function rek_gajih($id)
    {
        $data['id_karyawan'] = $id;
        $data['sidebar'] = "Merge";

        $data['hari_keraja'] = MergeModel::where('status_onoff', 'ON')->where('in_keterangan', null)->where('tb_merge.id_karyawan', $id)->whereMonth('tanggal', date('m'))->count();
        $data['merge'] = MergeModel::select('jam_lembur', 'name', 'nik', 'nama_bagian', 'tmk', 'tanggal', DB::raw('SUM(jam_lembur) as total_jl'))
            ->where('id_karyawan', $id)
            ->whereMonth('tanggal', date('m'))
            ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
            ->join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')
            ->get();



        return view('merge.rekapitulasi.invoice.rek-gajih', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = 'Merge';
        return view('merge.tambah', $data);
    }

    public function cari_nik(Request $request)
    {
        $data_karyawan = User::where('nik', $request->nik)->first();
        // dd($data_karyawan);
        echo json_encode($data_karyawan);
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
            'id_karyawan' => 'required',
        ]);
        MergeModel::create($request->all());
        return redirect('merge')->with('message', 'Absen baru telah di buat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MergeModel  $mergeModel
     * @return \Illuminate\Http\Response
     */
    public function show(MergeModel $mergeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MergeModel  $mergeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(MergeModel $mergeModel, $id)
    {
        $data['sidebar'] = 'Merge';
        $data['merge'] = MergeModel::where('id_merge', $id)
            ->join('users', 'tb_merge.id_karyawan', '=', 'users.id')
            ->first();
        return view('merge.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MergeModel  $mergeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MergeModel $mergeModel, $id)
    {
        MergeModel::where('id_merge', $id)->update([
            'id_karyawan' => $request->id_karyawan,
            'in' => $request->in,
            'in_keterangan' => $request->in_keterangan,
            'out' => $request->out,
            'jam_kerja' => $request->jam_kerja,
            'lembur' => $request->lembur,
            'n1_5' => $request->n1_5,
            'n2' => $request->n2,
            'n3' => $request->n3,
            'n4' => $request->n4,
            'jam_lembur' => $request->jam_lembur,
            'tanggal' => $request->tanggal,
            'status_onoff' => $request->status_onoff,
        ]);
        return redirect('merge')->with('message', 'Data berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MergeModel  $mergeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(MergeModel $mergeModel, $id)
    {

        MergeModel::where('id_merge', $id)->delete();
        return redirect('merge')->with('message', 'Data berhasil dihapus.');
    }
}
