@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="bg-gradient-to-b from-sky-100 to-pink-50 py-20">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-10 items-center">

            <div>

                <span class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full text-sm font-semibold">
                    ✨ Belajar Jadi Seru & Menyenangkan
                </span>

                <h1 class="text-5xl font-bold mt-6 text-gray-800 leading-tight">
                    Belajar Lebih Mudah Bersama
                    <span class="text-sky-600">
                        Academy Les
                    </span>
                </h1>

                <p class="mt-6 text-lg text-gray-600">
                    Academy Les menyediakan bimbingan belajar untuk siswa
                    TK, SD, dan SMP dengan metode pembelajaran yang interaktif,
                    terstruktur, dan menyenangkan.
                </p>

                <div class="mt-8 flex gap-4">

                    <a href="/register"
                        class="bg-sky-600 text-white px-6 py-3 rounded-xl shadow hover:bg-sky-700 transition">
                        Daftar Sekarang
                    </a>

                    <a href="/profile"
                        class="border border-sky-600 text-sky-600 px-6 py-3 rounded-xl hover:bg-sky-50 transition">
                        Profil Les
                    </a>

                </div>

            </div>

            <div>

                <img
                    src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=1200"
                    alt="Academy Les"
                    class="rounded-3xl shadow-xl">

            </div>

        </div>

    </div>

</section>

<!-- STATISTIK -->
<section class="bg-white py-16">

    <div class="max-w-6xl mx-auto px-6">

        <div class="grid md:grid-cols-3 gap-8 text-center">

            <div class="bg-sky-50 p-8 rounded-2xl shadow">

                <h2 class="text-4xl font-bold text-sky-600">
                    500+
                </h2>

                <p class="mt-2 text-gray-600">
                    Siswa Aktif
                </p>

            </div>

            <div class="bg-green-50 p-8 rounded-2xl shadow">

                <h2 class="text-4xl font-bold text-green-600">
                    25+
                </h2>

                <p class="mt-2 text-gray-600">
                    Tutor Berpengalaman
                </p>

            </div>

            <div class="bg-pink-50 p-8 rounded-2xl shadow">

                <h2 class="text-4xl font-bold text-pink-600">
                    TK • SD • SMP
                </h2>

                <p class="mt-2 text-gray-600">
                    Jenjang Pendidikan
                </p>

            </div>

        </div>

    </div>

</section>

<!-- JENJANG -->
<section class="bg-gray-50 py-20">

    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12">
            Jenjang Pendidikan
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-sky-50 p-8 rounded-2xl shadow text-center">

                <div class="text-5xl mb-4">
                    🎨
                </div>

                <h3 class="font-bold text-xl">
                    TK
                </h3>

                <p class="mt-3 text-gray-600">
                    Calistung, pengenalan angka, huruf dan pembelajaran dasar.
                </p>

            </div>

            <div class="bg-green-50 p-8 rounded-2xl shadow text-center">

                <div class="text-5xl mb-4">
                    📚
                </div>

                <h3 class="font-bold text-xl">
                    SD
                </h3>

                <p class="mt-3 text-gray-600">
                    Pendampingan seluruh mata pelajaran sekolah dasar.
                </p>

            </div>

            <div class="bg-pink-50 p-8 rounded-2xl shadow text-center">

                <div class="text-5xl mb-4">
                    🎓
                </div>

                <h3 class="font-bold text-xl">
                    SMP
                </h3>

                <p class="mt-3 text-gray-600">
                    Persiapan ujian dan peningkatan prestasi akademik.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- PROGRAM LES -->
<section class="bg-white py-20">

    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12">
            Program Les
        </h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">📘 Matematika</h3>
                <p class="text-gray-600">
                    Memahami konsep matematika dengan mudah dan menyenangkan.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">📖 Bahasa Indonesia</h3>
                <p class="text-gray-600">
                    Melatih kemampuan membaca, menulis, dan memahami bacaan.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">🇬🇧 Bahasa Inggris</h3>
                <p class="text-gray-600">
                    Belajar vocabulary, speaking, dan grammar dasar.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">🔬 IPA</h3>
                <p class="text-gray-600">
                    Memahami ilmu pengetahuan alam secara menyenangkan.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">🌎 IPS</h3>
                <p class="text-gray-600">
                    Memahami ilmu sosial dan lingkungan sekitar.
                </p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                <h3 class="font-bold text-xl mb-3">✏️ Calistung</h3>
                <p class="text-gray-600">
                    Membaca, menulis, dan berhitung untuk anak usia dini.
                </p>
            </div>

        </div>

    </div>

</section>

<!-- KEUNGGULAN -->
<section class="bg-gray-50 py-20">

    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12">
            Kenapa Memilih Academy Les?
        </h2>

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-sky-50 p-6 rounded-2xl text-center shadow">
                <div class="text-5xl mb-4">👨‍🏫</div>
                <h3 class="font-semibold">Tutor Berpengalaman</h3>
            </div>

            <div class="bg-green-50 p-6 rounded-2xl text-center shadow">
                <div class="text-5xl mb-4">📈</div>
                <h3 class="font-semibold">Monitoring Perkembangan</h3>
            </div>

            <div class="bg-pink-50 p-6 rounded-2xl text-center shadow">
                <div class="text-5xl mb-4">📚</div>
                <h3 class="font-semibold">Materi Terstruktur</h3>
            </div>

            <div class="bg-yellow-50 p-6 rounded-2xl text-center shadow">
                <div class="text-5xl mb-4">😊</div>
                <h3 class="font-semibold">Belajar Menyenangkan</h3>
            </div>

        </div>

    </div>

</section>

<!-- ALUR PENDAFTARAN -->
<section class="bg-white py-20">

    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center mb-12">
            Cara Bergabung
        </h2>

        <div class="grid md:grid-cols-4 gap-8 text-center">

            <div>
                <div class="w-16 h-16 bg-sky-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold">1</div>
                <p class="mt-4 font-medium">Registrasi Akun</p>
            </div>

            <div>
                <div class="w-16 h-16 bg-sky-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold">2</div>
                <p class="mt-4 font-medium">Isi Form Pendaftaran</p>
            </div>

            <div>
                <div class="w-16 h-16 bg-sky-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold">3</div>
                <p class="mt-4 font-medium">Verifikasi Admin</p>
            </div>

            <div>
                <div class="w-16 h-16 bg-sky-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold">4</div>
                <p class="mt-4 font-medium">Mulai Belajar</p>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="bg-sky-600 text-white py-20 text-center">

    <div class="max-w-4xl mx-auto px-6">

        <h2 class="text-4xl font-bold">
            Siap Bergabung Dengan Academy Les?
        </h2>

        <p class="mt-4 text-sky-100">
            Daftarkan siswa TK, SD, maupun SMP dan tingkatkan prestasi belajar bersama Academy Les.
        </p>

        <a href="/register"
            class="inline-block mt-8 bg-white text-sky-600 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
            Daftar Sekarang
        </a>

    </div>

</section>

@endsection