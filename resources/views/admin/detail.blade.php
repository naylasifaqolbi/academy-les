@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto py-10 px-5">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-sky-600 mb-6">
            Detail Pendaftaran
        </h1>

        <div class="space-y-4">

            <div>
                <strong>Nama Anak:</strong>
                {{ $siswa->nama_anak }}
            </div>

            <div>
                <strong>Nama Orang Tua:</strong>
                {{ $siswa->nama_orang_tua }}
            </div>

            <div>
                <strong>Email:</strong>
                {{ $siswa->email }}
            </div>

            <div>
                <strong>No HP:</strong>
                {{ $siswa->no_hp }}
            </div>

            <div>
                <strong>Alamat:</strong>
                {{ $siswa->alamat }}
            </div>

            <div>
                <strong>Jenjang:</strong>
                {{ $siswa->jenjang }}
            </div>

            <div>
                <strong>Mata Pelajaran:</strong>
                {{ $siswa->mata_pelajaran }}
            </div>

            <div>
                <strong>Jenis Kelamin:</strong>
                {{ $siswa->jenis_kelamin }}
            </div>

            <div>
                <strong>Status:</strong>

                @if($siswa->status == 'pending')
                    ⏳ Pending
                @elseif($siswa->status == 'diterima')
                    ✅ Diterima
                @else
                    ❌ Ditolak
                @endif
            </div>

        </div>

        <a href="/admin/dashboard"
           class="inline-block mt-8 bg-sky-500 text-white px-5 py-3 rounded-xl hover:bg-sky-600">

            Kembali

        </a>

    </div>

</div>

@endsection