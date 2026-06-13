@extends('layouts.admin')

@section('content')

@php
    $sort = request('sort');
    $order = request('order', 'asc');
@endphp

@if(session('success'))
<div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-2xl mb-6 shadow-sm">
    {{ session('success') }}
</div>
@endif

<style>
:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --lavender-soft:#EEE5FA;

    --yellow:#F8EED0;
    --green:#DDEED6;
    --text:#4F465E;
}

body{ background:#F6F4FB; }

.soft-card{
    background:rgba(255,255,255,.7);
    backdrop-filter:blur(18px);
    border:1px solid rgba(217,207,245,.4);
    border-radius:28px;
    box-shadow:0 10px 30px rgba(143,116,204,.08);
}

.soft-header{
    background:linear-gradient(135deg,var(--lavender-soft),white);
    border-radius:28px;
}

.table-head{
    background:linear-gradient(135deg,var(--lavender),var(--lavender-deep));
    color:white;
}

.sort-link{
    color:white;
    font-weight:600;
    display:flex;
    align-items:center;
    justify-content:center;
    gap:6px;
}

.badge-yellow{background:var(--yellow);color:#7A5A00;}
.badge-green{background:var(--green);color:#2E6B3A;}
.badge-red{background:#F8D7DA;color:#842029;}

tr:hover{
    background:rgba(238,229,250,.35);
}
</style>

<!-- HEADER -->
<div class="soft-header p-8 mb-8 shadow">
    <h1 class="text-3xl font-bold text-[var(--text)]">Data Siswa</h1>
    <p class="text-gray-500 mt-2">Kelola seluruh data pendaftaran siswa Academy Les.</p>
</div>

<!-- SEARCH -->
<div class="soft-card p-6 mb-8">

<form method="GET" action="/admin/siswa">

<div class="grid md:grid-cols-4 gap-4">

    <input type="text"
           name="search"
           value="{{ request('search') }}"
           placeholder="Cari nama siswa..."
           class="border border-purple-100 rounded-2xl p-3">

    <select name="status"
            class="border border-purple-100 rounded-2xl p-3">

        <option value="">Semua Status</option>
        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="diterima" {{ request('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
        <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>

    </select>

    <button type="submit"
            class="bg-[var(--lavender)] hover:bg-[var(--lavender-deep)] text-[#3F3558] rounded-2xl px-5 py-3 transition">
        Cari
    </button>

    <a href="/admin/siswa"
       class="bg-gray-100 hover:bg-gray-200 rounded-2xl px-5 py-3 text-center">
        Reset
    </a>

</div>

</form>

</div>

<!-- TABLE -->
<div class="soft-card overflow-hidden">

<div class="table-head px-6 py-4 flex justify-between items-center">

    <h2 class="text-xl font-semibold">Data Pendaftaran Siswa</h2>

    <span class="bg-white text-[var(--lavender-deep)] px-4 py-2 rounded-2xl font-semibold shadow">
        Total: {{ $siswas->count() }}
    </span>

</div>

<div class="overflow-x-auto">

<table class="w-full">

<thead class="table-head">
<tr>

    <th class="p-4">No</th>

    <!-- SORT NAMA -->
    <th class="p-4">
        <a href="{{ request()->fullUrlWithQuery([
            'sort' => 'nama_anak',
            'order' => ($sort === 'nama_anak' && $order === 'asc') ? 'desc' : 'asc'
        ]) }}"
        class="sort-link">

            Nama Anak
            @if($sort === 'nama_anak')
                {!! $order === 'asc' ? '▲' : '▼' !!}
            @endif

        </a>
    </th>

    <!-- SORT JENJANG -->
    <th class="p-4">
        <a href="{{ request()->fullUrlWithQuery([
            'sort' => 'jenjang',
            'order' => ($sort === 'jenjang' && $order === 'asc') ? 'desc' : 'asc'
        ]) }}"
        class="sort-link">

            Jenjang
            @if($sort === 'jenjang')
                {!! $order === 'asc' ? '▲' : '▼' !!}
            @endif

        </a>
    </th>

    <th class="p-4">Mata Pelajaran</th>

    <!-- SORT STATUS -->
    <th class="p-4">
        <a href="{{ request()->fullUrlWithQuery([
            'sort' => 'status',
            'order' => ($sort === 'status' && $order === 'asc') ? 'desc' : 'asc'
        ]) }}"
        class="sort-link">

            Status
            @if($sort === 'status')
                {!! $order === 'asc' ? '▲' : '▼' !!}
            @endif

        </a>
    </th>

    <th class="p-4">Aksi</th>

</tr>
</thead>

<tbody>

@forelse($siswas as $siswa)

<tr class="border-b">

    <td class="p-4 text-center">{{ $loop->iteration }}</td>
    <td class="p-4 font-medium">{{ $siswa->nama_anak }}</td>
    <td class="p-4">{{ $siswa->jenjang }}</td>
    <td class="p-4">{{ $siswa->mata_pelajaran }}</td>

    <td class="p-4">

        @if($siswa->status == 'pending')
            <span class="badge-yellow px-3 py-1 rounded-full text-sm">Pending</span>
        @elseif($siswa->status == 'diterima')
            <span class="badge-green px-3 py-1 rounded-full text-sm">Diterima</span>
        @else
            <span class="badge-red px-3 py-1 rounded-full text-sm">Ditolak</span>
        @endif

    </td>

    <td class="p-4">

        <div class="flex flex-wrap gap-2">

            <a href="/admin/detail/{{ $siswa->id }}"
               class="bg-[#EEE5FA] px-3 py-2 rounded-lg text-sm">
                Detail
            </a>

            <a href="/admin/edit/{{ $siswa->id }}"
               class="bg-[#F8EED0] px-3 py-2 rounded-lg text-sm">
                Edit
            </a>

            @if($siswa->status == 'pending')

            <form action="/admin/status/{{ $siswa->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="diterima">

                <button class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                    Terima
                </button>
            </form>

            <form action="/admin/status/{{ $siswa->id }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="ditolak">

                <button class="bg-red-100 text-red-700 px-3 py-2 rounded-lg text-sm">
                    Tolak
                </button>
            </form>

            @endif

            <form action="/admin/delete/{{ $siswa->id }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="bg-red-100 text-red-600 px-3 py-2 rounded-lg text-sm">
                    Hapus
                </button>
            </form>

        </div>

    </td>

</tr>

@empty
<tr>
    <td colspan="6" class="text-center p-8 text-gray-500">
        Belum ada data siswa
    </td>
</tr>
@endforelse

</tbody>

</table>

</div>

</div>

@endsection