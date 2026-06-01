@extends('layouts.admin')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold mb-6">
        Dashboard Admin
    </h1>

    <div class="bg-white rounded-2xl shadow p-5 overflow-x-auto">

        <table class="w-full border">

            <thead class="bg-sky-500 text-white">

                <tr>
                    <th class="p-3">
                        No
                    </th>

                    <th class="p-3">
                        Nama Anak
                    </th>

                    <th class="p-3">
                        Jenjang
                    </th>

                    <th class="p-3">
                        Mapel
                    </th>

                    <th class="p-3">
                        Status
                    </th>

                    <th class="p-3">
                        Aksi
                    </th>
                </tr>

            </thead>

            <tbody>

                @foreach($siswas as $siswa)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-3">
                        {{ $siswa->nama_anak }}
                    </td>

                    <td class="p-3">
                        {{ $siswa->jenjang }}
                    </td>

                    <td class="p-3">
                        {{ $siswa->mata_pelajaran }}
                    </td>

                    <td class="p-3">

                        @if($siswa->status == 'pending')
                            ⏳ Pending
                        @elseif($siswa->status == 'diterima')
                            ✅ Diterima
                        @else
                            ❌ Ditolak
                        @endif

                    </td>

                    <td class="p-3 space-x-2">

                        <!-- DETAIL -->
                        <a href="/admin/detail/{{ $siswa->id }}"
                           class="bg-blue-500 text-white px-3 py-1 rounded">

                            Detail

                        </a>

                        <!-- EDIT -->
                        <a href="/admin/edit/{{ $siswa->id }}"
                           class="bg-yellow-500 text-white px-3 py-1 rounded">

                            Edit

                        </a>

                        <!-- DELETE -->
                        <form
    action="/admin/delete/{{ $siswa->id }}"
    method="POST"
    class="inline">

    @csrf
    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm(
            'Apakah yakin ingin menghapus data ini?\n\nKlik OK untuk hapus atau Cancel untuk batal.'
        )"
        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded transition">

        Hapus

    </button>

</form>

                        <!-- STATUS -->
                        <form
                            action="/admin/status/{{ $siswa->id }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('PUT')

                            <input
                                type="hidden"
                                name="status"
                                value="diterima">

                            <button
                                class="bg-green-500 text-white px-3 py-1 rounded">

                                Terima

                            </button>
                        </form>

                        <form
                            action="/admin/status/{{ $siswa->id }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('PUT')

                            <input
                                type="hidden"
                                name="status"
                                value="ditolak">

                            <button
                                class="bg-gray-500 text-white px-3 py-1 rounded">

                                Tolak

                            </button>
                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection