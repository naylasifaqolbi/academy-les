@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto mt-10">

    <h1 class="text-3xl font-bold text-center text-sky-600">
        Dashboard User
    </h1>

    <div class="bg-white rounded-3xl shadow-lg p-8 mt-8">

        {{-- BELUM MENDAFTAR --}}
        @if(!$pendaftaran)

            <div class="text-center">

                <h2 class="text-2xl font-bold text-red-500">
                    📌 Belum Mendaftar
                </h2>

                <p class="text-gray-500 mt-2">
                    Kamu belum melakukan pendaftaran les.
                </p>

                <a href="/pendaftaran"
                   class="inline-block mt-5 bg-sky-500 text-white px-6 py-3 rounded-xl hover:bg-sky-600">

                    Daftar Sekarang

                </a>

            </div>

        {{-- PENDING --}}
        @elseif($pendaftaran->status == 'pending')

            <div class="text-center">

                <h2 class="text-2xl font-bold text-yellow-500">
                    ⏳ Menunggu Konfirmasi
                </h2>

                <p class="mt-2 text-gray-600">
                    Pendaftaran sedang ditinjau admin.
                </p>

            </div>

        {{-- DITERIMA --}}
        @elseif($pendaftaran->status == 'diterima')

            <div class="text-center">

                <h2 class="text-2xl font-bold text-green-500">
                    ✅ Pendaftaran Diterima
                </h2>

                <p class="mt-2 text-gray-600">
                    Selamat! Kamu diterima di program les.
                </p>

            </div>

        {{-- DITOLAK --}}
        @elseif($pendaftaran->status == 'ditolak')

            <div class="text-center">

                <h2 class="text-2xl font-bold text-red-500">
                    ❌ Pendaftaran Ditolak
                </h2>

                <p class="mt-2 text-gray-600">
                    Silakan hubungi admin untuk informasi lebih lanjut.
                </p>

            </div>

        @endif

    </div>

</div>

@endsection