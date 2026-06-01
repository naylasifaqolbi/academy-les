@extends('layouts.admin')

@section('content')

<div class="max-w-3xl mx-auto py-10 px-5">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-yellow-500 mb-6">
            Edit Data Pendaftaran
        </h1>

        <form method="POST"
              action="/admin/update/{{ $siswa->id }}"
              class="space-y-5">

            @csrf
            @method('PUT')

            <!-- Nama Anak -->
            <div>
                <label class="font-semibold">
                    Nama Anak
                </label>

                <input type="text"
                       name="nama_anak"
                       value="{{ $siswa->nama_anak }}"
                       class="w-full border rounded-xl p-3">
            </div>

            <!-- Nama Orang Tua -->
            <div>
                <label class="font-semibold">
                    Nama Orang Tua
                </label>

                <input type="text"
                       name="nama_orang_tua"
                       value="{{ $siswa->nama_orang_tua }}"
                       class="w-full border rounded-xl p-3">
            </div>

            <!-- Email -->
            <div>
                <label class="font-semibold">
                    Email
                </label>

                <input type="email"
                       name="email"
                       value="{{ $siswa->email }}"
                       class="w-full border rounded-xl p-3">
            </div>

            <!-- No HP -->
            <div>
                <label class="font-semibold">
                    No HP
                </label>

                <input type="text"
                       name="no_hp"
                       value="{{ $siswa->no_hp }}"
                       class="w-full border rounded-xl p-3">
            </div>

            <!-- Alamat -->
            <div>
                <label class="font-semibold">
                    Alamat
                </label>

                <textarea
                    name="alamat"
                    rows="3"
                    class="w-full border rounded-xl p-3">{{ $siswa->alamat }}</textarea>
            </div>

            <!-- Jenjang -->
            <div>
                <label class="font-semibold">
                    Jenjang
                </label>

                <select name="jenjang"
                        class="w-full border rounded-xl p-3">

                    <option value="TK"
                        {{ $siswa->jenjang == 'TK' ? 'selected' : '' }}>
                        TK
                    </option>

                    <option value="SD"
                        {{ $siswa->jenjang == 'SD' ? 'selected' : '' }}>
                        SD
                    </option>

                    <option value="SMP"
                        {{ $siswa->jenjang == 'SMP' ? 'selected' : '' }}>
                        SMP
                    </option>

                </select>
            </div>

            <!-- Mata Pelajaran -->
            <div>
                <label class="font-semibold">
                    Mata Pelajaran
                </label>

                <input type="text"
                       name="mata_pelajaran"
                       value="{{ $siswa->mata_pelajaran }}"
                       class="w-full border rounded-xl p-3">
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="font-semibold">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        class="w-full border rounded-xl p-3">

                    <option value="Laki-laki"
                        {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan"
                        {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>
            </div>

            <button
                class="w-full bg-yellow-500 text-white py-3 rounded-xl hover:bg-yellow-600">

                Update Data

            </button>

        </form>

    </div>

</div>

@endsection