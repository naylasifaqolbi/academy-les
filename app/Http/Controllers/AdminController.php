<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    // DASHBOARD ADMIN
    public function index(Request $request)
    {
        $query = Siswa::query();

        // Search
        if ($request->search) {

            $query->where(
                'nama_anak',
                'like',
                '%' . $request->search . '%'
            );

        }

        // Filter
        if ($request->status) {

            $query->where(
                'status',
                $request->status
            );

        }

    $siswas = $query
        ->latest()
        ->get();

    $totalSiswa = Siswa::count();

    $pending = Siswa::where(
        'status',
        'pending'
    )->count();

    $diterima = Siswa::where(
        'status',
        'diterima'
    )->count();

    $ditolak = Siswa::where(
        'status',
        'ditolak'
    )->count();

    return view(
        'admin.dashboard',
        compact(
            'siswas',
            'totalSiswa',
            'pending',
            'diterima',
            'ditolak'
        )
    );
}
    // DATA SISWA
     public function dataSiswa(Request $request)
    {
        $query = Siswa::query();

        // Search
        if ($request->search) {
            $query->where(
                'nama_anak',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter Status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // =========================
        // 🔥 SORTING FEATURE (NEW)
        // =========================
        $sort = $request->sort ?? 'created_at';
        $order = $request->order ?? 'desc';

        $allowedSort = ['nama_anak', 'jenjang', 'status', 'created_at'];

        if (!in_array($sort, $allowedSort)) {
            $sort = 'created_at';
        }

        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        $query->orderBy($sort, $order);

        // hasil akhir
        $siswas = $query->latest()->get();

        return view('admin.siswa', compact('siswas'));
    }

    // EXPORT PDF
    public function exportPdf()
    {
        $siswas = Siswa::all();

        $pdf = Pdf::loadView(
            'admin.pdf',
            compact('siswas')
        );

        return $pdf->download(
            'laporan-siswa-academy-les.pdf'
        );
    }

    // DETAIL
    public function detail($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(
            'admin.detail',
            compact('siswa')
        );
    }

    // EDIT
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view(
            'admin.edit',
            compact('siswa')
        );
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([

            'nama_anak' => $request->nama_anak,
            'nama_orang_tua' => $request->nama_orang_tua,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenjang' => $request->jenjang,
            'mata_pelajaran' => $request->mata_pelajaran,
            'jenis_kelamin' => $request->jenis_kelamin,

        ]);

        return redirect('/admin/siswa')
            ->with(
                'success',
                'Data berhasil diupdate'
            );
    }

    // HAPUS
    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return back()->with(
            'success',
            'Data berhasil dihapus'
        );
    }

    // UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->update([
            'status' => $request->status
        ]);

        return back()->with(
            'success',
            'Status berhasil diperbarui'
        );
    }
}