<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
    public function create()
    {
        return view('user.pendaftaran');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'nama_anak' => 'required|min:3',
            'nama_orang_tua' => 'required|min:3',

            'email' => 'required|email',

            'no_hp' => 'required|numeric|digits_between:10,15',

            'alamat' => 'required|min:5',

            'jenjang' => 'required',

            'mata_pelajaran' => 'required',

            'jenis_kelamin' => 'required',
        ], [

            'required' => ':attribute wajib diisi.',

            'email.email' =>
                'Format email tidak valid.',

            'no_hp.numeric' =>
                'Nomor HP harus angka.',

            'no_hp.digits_between' =>
                'Nomor HP minimal 10 digit.',

            'nama_anak.min' =>
                'Nama anak minimal 3 karakter.',

            'nama_orang_tua.min' =>
                'Nama orang tua minimal 3 karakter.',

        ], [

            'nama_anak' => 'Nama Anak',
            'nama_orang_tua' => 'Nama Orang Tua',
            'email' => 'Email',
            'no_hp' => 'Nomor HP',
            'alamat' => 'Alamat',
            'jenjang' => 'Jenjang',
            'mata_pelajaran' => 'Mata Pelajaran',
            'jenis_kelamin' => 'Jenis Kelamin',

        ]);

        DB::beginTransaction();

        try {

            // SIMPAN DATA PENDAFTARAN
            Siswa::create([

                'user_id' => Auth::id(),

                'nama_anak' => $request->nama_anak,
                'nama_orang_tua' => $request->nama_orang_tua,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'jenjang' => $request->jenjang,
                'mata_pelajaran' => $request->mata_pelajaran,
                'jenis_kelamin' => $request->jenis_kelamin,

                // otomatis setelah daftar
                'status' => 'pending',
            ]);

            DB::commit();

            // KEMBALI KE DASHBOARD USER
            return redirect('/user/dashboard')
                ->with(
                    'success',
                    'Pendaftaran berhasil dikirim!'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->with(
                    'error',
                    'Pendaftaran gagal disimpan!'
                )
                ->withInput();
        }
    }
}