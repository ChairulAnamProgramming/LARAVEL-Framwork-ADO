<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BagianModel;
use App\User;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['karyawan'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')->get();
        $data['sidebar'] = "Karyawan";
        return view('karyawan.index', $data);
    }

    public function print()
    {
      $bulan = date('m');
      $data['karyawan'] = User::join('tb_bagian', 'users.id_bagian', '=', 'tb_bagian.id_bagian')->get();
      return view('karyawan.print', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['sidebar'] = "Karyawan";
        $data['bagian'] = BagianModel::all();
        return view('karyawan.tambah', $data);
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
            'email' => 'required|unique:users',
            'nama_karyawan' => 'required',
            'nik' => 'required|unique:users',
            'tmk' => 'required',
            'role' => 'required',
            'ktp' => 'required',
            'tempat' => 'required',
            'alamat' => 'required',
        ]);

        User::create([
            'name' =>  $request['nama_karyawan'],
            'nik' =>  $request['nik'],
            'email' =>  $request['email'],
            'password' => Hash::make('password'),
            'role' =>   $request['role'],
            'image' => 'default.jpg',
            'id_bagian' => $request['bagian'],
            'tmk' => $request['tmk'],
            'ktp' => $request['ktp'],
            'tmpt_lhr' => $request['tempat'],
            'tgl_lhr' =>  $request['tanggal'],
            'alamat' => $request['alamat'],
        ]);

        return redirect('/karyawan')->with('message', 'Karyawan berhasil di tambahkan');
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
    public function edit(User $user, $id)
    {
        $data['sidebar'] = "Karyawan";
        $data['bagian'] = BagianModel::all();
        $data['karyawan'] = User::where('id', $id)->first();
        return view('/karyawan/edit', $data);
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
        User::where('id', $id)->update([
            'email' => $request->email,
            'name' => $request->nama_karyawan,
            'nik' => $request->nik,
            'tmk' => $request->tmk,
            'ktp' => $request->ktp,
            'role' =>   $request->role,
            'tmpt_lhr' => $request->tmpt_lhr,
            'tgl_lhr' => $request->tgl_lhr,
            'id_bagian' => $request->bagian,
            'alamat' => $request->alamat,
        ]);

        return redirect('/karyawan')->with('message', 'Karyawan berhasil di perbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('karyawan')->with('message', 'Karyawan berhasil di hapus');
    }
}
