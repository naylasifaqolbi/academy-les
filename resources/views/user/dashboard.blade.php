@extends('layouts.app')

@section('content')

<style>

:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --lavender-soft:#EEE5FA;
    --yellow:#F8EED0;
    --green:#DDEED6;
    --muted:#6F6682;
}

body{
    background:#F6F4FB;
}

.orb{
    position:fixed;
    border-radius:999px;
    filter:blur(140px);
    opacity:.20;
    z-index:-1;
}

.orb1{
    width:450px;
    height:450px;
    background:var(--lavender);
    top:-120px;
    left:-120px;
}

.orb2{
    width:320px;
    height:320px;
    background:var(--yellow);
    top:35%;
    right:-100px;
}

.orb3{
    width:280px;
    height:280px;
    background:var(--green);
    bottom:-80px;
    left:15%;
}

.glass-card{
    background:rgba(255,255,255,.65);
    backdrop-filter:blur(20px);
    border:1px solid rgba(255,255,255,.6);
    border-radius:30px;
    box-shadow:
        0 10px 40px rgba(143,116,204,.08);
}

.badge{
    padding:8px 16px;
    border-radius:999px;
    font-weight:600;
    font-size:14px;
}

</style>

<div class="orb orb1"></div>
<div class="orb orb2"></div>
<div class="orb orb3"></div>

<div class="max-w-6xl mx-auto px-6 py-12">

    <!-- HEADER -->
    <div class="mb-10">

        <span class="inline-block px-4 py-2 rounded-full bg-[#EEE5FA] text-[#8F74CC] font-semibold text-sm">
            🎓 Dashboard Siswa
        </span>

        <h1 class="text-5xl font-bold mt-5 text-[#8F74CC]">
            Selamat Datang,
            {{ Auth::user()->name }}
        </h1>

        <p class="text-[#6F6682] mt-3">
            Pantau status pendaftaran dan data siswa Anda.
        </p>

    </div>

    <!-- STATUS PENDAFTARAN -->
    <div class="mb-8">

        @if(!$pendaftaran)

            <div class="glass-card border-l-4 border-red-500 p-8">

                <h2 class="text-2xl font-bold text-red-600">
                    Belum Mendaftar
                </h2>

                <p class="mt-3 text-gray-600">
                    Anda belum melakukan pendaftaran les.
                </p>

                <a href="/pendaftaran"
                   class="inline-block mt-5 px-6 py-3 rounded-2xl bg-[#8F74CC] text-white hover:opacity-90 transition">

                    Daftar Sekarang

                </a>

            </div>

        @elseif($pendaftaran->status == 'pending')

            <div class="glass-card border-l-4 border-yellow-500 p-8">

                <h2 class="text-2xl font-bold text-yellow-600">
                    ⏳ Menunggu Verifikasi
                </h2>

                <p class="mt-3 text-gray-600">
                    Pendaftaran Anda sedang diperiksa oleh admin.
                </p>

            </div>

        @elseif($pendaftaran->status == 'diterima')

            <div class="glass-card border-l-4 border-green-500 p-8">

                <h2 class="text-2xl font-bold text-green-600">
                    ✅ Pendaftaran Diterima
                </h2>

                <p class="mt-3 text-gray-600">
                    Selamat, pendaftaran Anda telah diterima.
                </p>

            </div>

        @elseif($pendaftaran->status == 'ditolak')

            <div class="glass-card border-l-4 border-red-500 p-8">

                <h2 class="text-2xl font-bold text-red-600">
                    ❌ Pendaftaran Ditolak
                </h2>

                <p class="mt-3 text-gray-600">
                    Silakan hubungi admin untuk informasi lebih lanjut.
                </p>

            </div>

        @endif

    </div>

    <!-- CARD USER -->
    <div class="grid md:grid-cols-3 gap-6 mb-10">

        <div class="glass-card p-6">

            <p class="text-gray-500 mb-2">
                Nama User
            </p>

            <h3 class="text-2xl font-bold">
                {{ Auth::user()->name }}
            </h3>

        </div>

        <div class="glass-card p-6">

            <p class="text-gray-500 mb-2">
                Email
            </p>

            <h3 class="text-xl font-bold break-words">
                {{ Auth::user()->email }}
            </h3>

        </div>

        <div class="glass-card p-6">

            <p class="text-gray-500 mb-2">
                Status
            </p>

            @if(!$pendaftaran)

                <span class="badge bg-red-100 text-red-600">
                    Belum Mendaftar
                </span>

            @elseif($pendaftaran->status == 'pending')

                <span class="badge bg-yellow-100 text-yellow-700">
                    Pending
                </span>

            @elseif($pendaftaran->status == 'diterima')

                <span class="badge bg-green-100 text-green-700">
                    Diterima
                </span>

            @else

                <span class="badge bg-red-100 text-red-700">
                    Ditolak
                </span>

            @endif

        </div>

    </div>

    <!-- DATA PENDAFTARAN -->
    @if($pendaftaran)

    <div class="glass-card p-8">

        <h2 class="text-3xl font-bold text-[#8F74CC] mb-8">
            📋 Data Pendaftaran
        </h2>

        <div class="grid md:grid-cols-2 gap-8">

            <div>
                <p class="text-gray-500">Nama Anak</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->nama_anak }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Nama Orang Tua</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->nama_orang_tua }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Jenjang</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->jenjang }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Mata Pelajaran</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->mata_pelajaran }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Jenis Kelamin</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->jenis_kelamin }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">No HP</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->no_hp }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Email</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->email }}
                </h4>
            </div>

            <div>
                <p class="text-gray-500">Tanggal Daftar</p>
                <h4 class="font-semibold text-lg">
                    {{ $pendaftaran->created_at->format('d M Y') }}
                </h4>
            </div>

        </div>

        <div class="mt-8">

            <p class="text-gray-500 mb-2">
                Alamat
            </p>

            <div class="bg-white/50 p-5 rounded-2xl">
                {{ $pendaftaran->alamat }}
            </div>

        </div>

    </div>

    @endif

</div>

@endsection