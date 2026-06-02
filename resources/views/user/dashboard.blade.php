@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-10">

    <h1 class="text-4xl font-bold text-sky-600 mb-2">
        Dashboard User
    </h1>

    <p class="text-gray-500 mb-8">
        Selamat datang, {{ Auth::user()->name }}
    </p>

    {{-- STATUS --}}
    <div class="mb-8">

        @if(!$pendaftaran)

            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-xl">

                <h2 class="text-xl font-bold text-red-600">
                    Belum Mendaftar
                </h2>

                <p class="mt-2 text-gray-600">
                    Kamu belum melakukan pendaftaran les.
                </p>

                <a href="/pendaftaran"
                    class="inline-block mt-4 bg-sky-600 text-white px-5 py-3 rounded-lg hover:bg-sky-700">

                    Daftar Sekarang

                </a>

            </div>

        @elseif($pendaftaran->status == 'pending')

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-6 rounded-xl">

                <h2 class="text-xl font-bold text-yellow-600">
                    Menunggu Verifikasi
                </h2>

                <p class="mt-2 text-gray-600">
                    Pendaftaran sedang diperiksa oleh admin.
                </p>

            </div>

        @elseif($pendaftaran->status == 'diterima')

            <div class="bg-green-50 border-l-4 border-green-500 p-6 rounded-xl">

                <h2 class="text-xl font-bold text-green-600">
                    Pendaftaran Diterima
                </h2>

                <p class="mt-2 text-gray-600">
                    Selamat, pendaftaran Anda telah diterima.
                </p>

            </div>

        @elseif($pendaftaran->status == 'ditolak')

            <div class="bg-red-50 border-l-4 border-red-500 p-6 rounded-xl">

                <h2 class="text-xl font-bold text-red-600">
                    Pendaftaran Ditolak
                </h2>

                <p class="mt-2 text-gray-600">
                    Silakan hubungi admin untuk informasi lebih lanjut.
                </p>

            </div>

        @endif

    </div>

    {{-- CARD INFO --}}
    <div class="grid md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white shadow rounded-2xl p-6">

            <h3 class="text-gray-500 mb-2">
                Nama User
            </h3>

            <p class="text-xl font-bold">
                {{ Auth::user()->name }}
            </p>

        </div>

        <div class="bg-white shadow rounded-2xl p-6">

            <h3 class="text-gray-500 mb-2">
                Email
            </h3>

            <p class="text-xl font-bold break-words">
                {{ Auth::user()->email }}
            </p>

        </div>

        <div class="bg-white shadow rounded-2xl p-6">

            <h3 class="text-gray-500 mb-2">
                Status
            </h3>

            @if(!$pendaftaran)
                <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full">
                    Belum Mendaftar
                </span>
            @else
                <span class="bg-sky-100 text-sky-600 px-3 py-1 rounded-full">
                    {{ ucfirst($pendaftaran->status) }}
                </span>
            @endif

        </div>

    </div>

    {{-- DATA PENDAFTARAN --}}
    @if($pendaftaran)

<div class="bg-white shadow rounded-2xl p-8">

    <h2 class="text-2xl font-bold mb-6 text-sky-600">
        Data Pendaftaran
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>
            <label class="text-gray-500">
                Nama Anak
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->nama_anak }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Nama Orang Tua
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->nama_orang_tua }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Jenjang
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->jenjang }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Mata Pelajaran
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->mata_pelajaran }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Jenis Kelamin
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->jenis_kelamin }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                No HP
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->no_hp }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Email
            </label>

            <p class="font-semibold">
                {{ $pendaftaran->email }}
            </p>
        </div>

        <div>
            <label class="text-gray-500">
                Status
            </label>

            <p class="font-semibold">
                {{ ucfirst($pendaftaran->status) }}
            </p>
        </div>

    </div>

    <div class="mt-6">

        <label class="text-gray-500">
            Alamat
        </label>

        <p class="font-semibold">
            {{ $pendaftaran->alamat }}
        </p>

    </div>

</div>

@endif

@endsection