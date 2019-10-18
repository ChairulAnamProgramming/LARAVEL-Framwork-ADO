<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use File;
use Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sidebar'] = 'Profilku';
        return view('user/index', $data);
    }

    public function ubah_password()
    {
        $data['sidebar'] = 'Ubah Password';
        return view('user.ubah-password', $data);
    }

    public function update_password(Request $request)
    {

        $request->validate([
            'password_lama' => ['required', 'string', 'max:255'],
            'password_baru' => ['required', 'string', 'min:4'],
            'konfirmasi' => ['required', 'string'],
        ]);


        if (!(Hash::check($request->password_lama, Auth::user()->password))) {
            return redirect()->back()->with("message", "Password lama tidak sesuai. Harap coba lagi.");
        }

        if (strcmp($request->password_lama, $request->password_baru) == 0) {
            return redirect()->back()->with("message", "Password baru tidak boleh sama dengan password saat ini. Pilih password yang berbeda");
        }

        if (!(strcmp($request->password_baru, $request->konfirmasi)) == 0) {
            return redirect()->back()->with("message", "Password baru harus sama dengan Password Anda yang dikonfirmasi. Ketikkan ulang Password baru.");
        }

        User::where('id', Auth::user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()->back()->with("message", "Password berhasil di ubah !");



        return $request;
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
        //
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
    public function edit($id)
    {
        //
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

        $user = User::where('id', $id)->first();
        $gambar_lama = $user->image;

        if (!$request->gambar) {
            $nama_gambar = $gambar_lama;
        } else {

            $this->validate($request, [
                'gambar' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:3000',
            ]);
            $nama_gambar = time() . '.' . request()->gambar->getClientOriginalExtension();
            request()->gambar->move(public_path('assets/img/users'), $nama_gambar);

            if ($gambar_lama !== 'default.jpg') {
                File::delete("assets/img/users/" . $gambar_lama);
            }
        }

        User::where('id', $id)->update([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'image' => $nama_gambar
        ]);
        return redirect('/user')->with('message', 'Profil berhasil di perbaharui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
