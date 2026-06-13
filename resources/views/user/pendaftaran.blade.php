@extends('layouts.app')

@section('content')

<style>

:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --yellow:#F8EED0;
    --green:#DDEED6;
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

.form-input{
    border:1px solid rgba(143,116,204,.15);
    background:rgba(255,255,255,.85);
}

.form-input:focus{
    outline:none;
    border-color:#8F74CC;
    box-shadow:0 0 0 4px rgba(143,116,204,.15);
}

</style>

<div class="orb orb1"></div>
<div class="orb orb2"></div>
<div class="orb orb3"></div>

<div class="max-w-2xl mx-auto my-10 glass-card p-8">

    <h2 class="text-3xl font-bold text-center text-[#8F74CC] mb-2">
        📚 Form Pendaftaran Les
    </h2>

    <p class="text-center text-gray-500 mb-8">
        Isi data dengan lengkap ya 😊
    </p>

    <form method="POST" action="/pendaftaran" class="space-y-5">

        @csrf

        <!-- Nama Anak -->
        <div>

            <label class="font-semibold">
                Nama Anak
            </label>

            <input
                type="text"
                name="nama_anak"
                value="{{ old('nama_anak') }}"
                required
                class="w-full rounded-xl p-3 mt-1 form-input"
                placeholder="Masukkan nama anak">

            @error('nama_anak')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Nama Orang Tua -->
        <div>

            <label class="font-semibold">
                Nama Orang Tua
            </label>

            <input
                type="text"
                name="nama_orang_tua"
                value="{{ old('nama_orang_tua') }}"
                required
                class="w-full rounded-xl p-3 mt-1 form-input"
                placeholder="Masukkan nama orang tua">

            @error('nama_orang_tua')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Email -->
        <div>

            <label class="font-semibold">
                Email Orang Tua
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                class="w-full rounded-xl p-3 mt-1 form-input"
                placeholder="Masukkan email">

            @error('email')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- No HP -->
        <div>

            <label class="font-semibold">
                Nomor HP Orang Tua
            </label>

            <input
                type="text"
                name="no_hp"
                value="{{ old('no_hp') }}"
                required
                class="w-full rounded-xl p-3 mt-1 form-input"
                placeholder="08xxxxxxxxxx">

            @error('no_hp')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Alamat -->
        <div>

            <label class="font-semibold">
                Alamat
            </label>

            <textarea
                name="alamat"
                rows="3"
                required
                class="w-full rounded-xl p-3 mt-1 form-input"
                placeholder="Masukkan alamat">{{ old('alamat') }}</textarea>

            @error('alamat')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Jenjang -->
        <div>

            <label class="font-semibold">
                Jenjang
            </label>

            <select
                id="jenjang"
                name="jenjang"
                required
                class="w-full rounded-xl p-3 mt-1 form-input">

                <option value="">
                    Pilih Jenjang
                </option>

                <option value="TK"
                    {{ old('jenjang') == 'TK' ? 'selected' : '' }}>
                    TK
                </option>

                <option value="SD"
                    {{ old('jenjang') == 'SD' ? 'selected' : '' }}>
                    SD
                </option>

                <option value="SMP"
                    {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>
                    SMP
                </option>

            </select>

            @error('jenjang')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Mata Pelajaran -->
        <div>

            <label class="font-semibold">
                Mata Pelajaran
            </label>

            <select
                id="mata_pelajaran"
                name="mata_pelajaran"
                required
                class="w-full rounded-xl p-3 mt-1 form-input">

                <option value="">
                    Pilih jenjang terlebih dahulu
                </option>

            </select>

            @error('mata_pelajaran')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Jenis Kelamin -->
        <div>

            <label class="font-semibold">
                Jenis Kelamin
            </label>

            <select
                name="jenis_kelamin"
                required
                class="w-full rounded-xl p-3 mt-1 form-input">

                <option value="">
                    Pilih Jenis Kelamin
                </option>

                <option value="Laki-laki"
                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                    Laki-laki
                </option>

                <option value="Perempuan"
                    {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                    Perempuan
                </option>

            </select>

            @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror

        </div>

        <!-- Button -->
        <button
            type="submit"
            class="w-full bg-[#8F74CC] text-white py-3 rounded-xl font-bold hover:bg-[#7B61BD] transition">

            Daftar Sekarang 🚀

        </button>

    </form>

</div>

<!-- Dynamic Dropdown -->
<script>
    const jenjang =
        document.getElementById('jenjang');

    const mapel =
        document.getElementById('mata_pelajaran');

    const dataMapel = {
        TK: ['Calistung'],

        SD: [
            'Matematika',
            'Bahasa Inggris'
        ],

        SMP: [
            'Matematika',
            'Bahasa Inggris',
            'IPA',
            'IPS'
        ]
    };

    function updateMapel() {

        const selected =
            jenjang.value;

        mapel.innerHTML =
            '<option value="">Pilih Mata Pelajaran</option>';

        if (dataMapel[selected]) {

            dataMapel[selected].forEach(item => {

                const option =
                    document.createElement('option');

                option.value = item;
                option.text = item;

                if (item ===
                    "{{ old('mata_pelajaran') }}") {

                    option.selected = true;
                }

                mapel.appendChild(option);
            });
        }
    }

    jenjang.addEventListener(
        'change',
        updateMapel
    );

    window.onload = updateMapel;
</script>

@endsection