<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class AdminController extends Controller
{
    // dashboard admin
    public function index()
    {
        $siswas = Siswa::latest()->get();

        return view(
            'admin.dashboard',
            compact('siswas')
        );
    }

    // detail
    public function detail($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(
            'admin.detail',
            compact('siswa')
        );
    }

    // edit
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(
            'admin.edit',
            compact('siswa')
        );
    }

    // update
    public function update(
        Request $request,
        $id
    ) {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'nama_anak' =>
                $request->nama_anak,

            'nama_orang_tua' =>
                $request->nama_orang_tua,

            'email' =>
                $request->email,

            'no_hp' =>
                $request->no_hp,

            'alamat' =>
                $request->alamat,

            'jenjang' =>
                $request->jenjang,

            'mata_pelajaran' =>
                $request->mata_pelajaran,

            'jenis_kelamin' =>
                $request->jenis_kelamin,
        ]);

        return redirect(
            '/admin/dashboard'
        )->with(
            'success',
            'Data berhasil diupdate'
        );
    }

    // hapus
    public function destroy($id)
    {
        Siswa::findOrFail($id)
            ->delete();

        return back()->with(
            'success',
            'Data berhasil dihapus'
        );
    }

    // terima / tolak
    public function updateStatus(
        Request $request,
        $id
    ) {
        $siswa =
            Siswa::findOrFail($id);

        $siswa->update([
            'status' =>
                $request->status
        ]);

        return back();
    }
}