@extends('layouts.admin')

@section('content')

@if(session('success'))

<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6">

    {{ session('success') }}

</div>

@endif

<!-- HEADER -->
<div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

    <h1 class="text-3xl font-bold text-slate-800">

        Data Siswa

    </h1>

    <p class="text-gray-500 mt-2">

        Kelola seluruh data pendaftaran siswa Academy Les.

    </p>

</div>

<!-- SEARCH DAN FILTER -->
<div class="bg-white rounded-3xl shadow-lg p-6 mb-8">

    <form method="GET" action="/admin/siswa">

        <div class="grid md:grid-cols-4 gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama siswa..."
                class="border border-gray-300 rounded-xl p-3">

            <select
                name="status"
                class="border border-gray-300 rounded-xl p-3">

                <option value="">
                    Semua Status
                </option>

                <option
                    value="pending"
                    {{ request('status') == 'pending' ? 'selected' : '' }}>

                    Pending

                </option>

                <option
                    value="diterima"
                    {{ request('status') == 'diterima' ? 'selected' : '' }}>

                    Diterima

                </option>

                <option
                    value="ditolak"
                    {{ request('status') == 'ditolak' ? 'selected' : '' }}>

                    Ditolak

                </option>

            </select>

            <button
                type="submit"
                class="bg-sky-600 hover:bg-sky-700 text-white rounded-xl px-5 py-3">

                Cari

            </button>

            <a
                href="/admin/siswa"
                class="bg-gray-500 hover:bg-gray-600 text-white rounded-xl px-5 py-3 text-center">

                Reset

            </a>

        </div>

    </form>

</div>

<!-- TABEL -->
<div class="bg-white rounded-3xl shadow-lg overflow-hidden">

    <div class="bg-sky-600 text-white px-6 py-4 flex justify-between items-center">

        <h2 class="text-xl font-semibold">

            Data Pendaftaran Siswa

        </h2>

        <span class="bg-white text-sky-600 px-4 py-2 rounded-xl font-semibold">

            Total: {{ $siswas->count() }}

        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-700 text-white">

                <tr>

                    <th class="p-4">No</th>
                    <th class="p-4">Nama Anak</th>
                    <th class="p-4">Jenjang</th>
                    <th class="p-4">Mata Pelajaran</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($siswas as $siswa)

                <tr class="border-b hover:bg-slate-50">

                    <td class="p-4 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-4 font-medium">
                        {{ $siswa->nama_anak }}
                    </td>

                    <td class="p-4">
                        {{ $siswa->jenjang }}
                    </td>

                    <td class="p-4">
                        {{ $siswa->mata_pelajaran }}
                    </td>

                    <td class="p-4">

                        @if($siswa->status == 'pending')

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">

                                Pending

                            </span>

                        @elseif($siswa->status == 'diterima')

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                                Diterima

                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">

                                Ditolak

                            </span>

                        @endif

                    </td>

                    <td class="p-4">

                        <div class="flex flex-wrap gap-2">

                            <a
                                href="/admin/detail/{{ $siswa->id }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded-lg text-sm">

                                Detail

                            </a>

                            <a
                                href="/admin/edit/{{ $siswa->id }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">

                                Edit

                            </a>

                            <form
                                action="/admin/delete/{{ $siswa->id }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg text-sm">

                                    Hapus

                                </button>

                            </form>

                            @if($siswa->status == 'pending')

                                <form
                                    action="/admin/status/{{ $siswa->id }}"
                                    method="POST">

                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="diterima">

                                    <button
                                        class="bg-green-500 hover:bg-green-600 text-white px-3 py-2 rounded-lg text-sm">

                                        Terima

                                    </button>

                                </form>

                                <form
                                    action="/admin/status/{{ $siswa->id }}"
                                    method="POST">

                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="ditolak">

                                    <button
                                        class="bg-gray-500 hover:bg-gray-600 text-white px-3 py-2 rounded-lg text-sm">

                                        Tolak

                                    </button>

                                </form>

                            @elseif($siswa->status == 'diterima')

                                <span class="bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">

                                    Sudah Diterima

                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-3 py-2 rounded-lg text-sm">

                                    Ditolak

                                </span>

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center p-8 text-gray-500">

                        Belum ada data siswa

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection