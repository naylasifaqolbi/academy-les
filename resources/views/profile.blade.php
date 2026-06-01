@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="text-center py-20 bg-yellow-50">

    <h1 class="text-4xl font-bold text-gray-800">
        📚 Profile Academy Les
    </h1>

    <p class="mt-3 text-gray-600">
        Tempat belajar seru untuk anak TK, SD, SMP 💖
    </p>

</section>

<!-- JENJANG -->
<section class="py-16 bg-white">

    <h2 class="text-2xl font-bold text-center mb-10 text-sky-600">
        🎓 Jenjang Belajar
    </h2>

    <div class="grid md:grid-cols-3 gap-6 px-10">

        <div class="bg-pink-100 p-6 rounded-2xl shadow text-center">
            <h3 class="font-bold">TK</h3>
            <p>Belajar dasar: membaca, menulis, berhitung ringan.</p>
        </div>

        <div class="bg-yellow-100 p-6 rounded-2xl shadow text-center">
            <h3 class="font-bold">SD</h3>
            <p>dasar matematika & bahasa.</p>
        </div>

        <div class="bg-green-100 p-6 rounded-2xl shadow text-center">
            <h3 class="font-bold">SMP</h3>
            <p>Matematika, IPA, IPS, Bahasa Inggris dasar.</p>
        </div>

    </div>

</section>

<!-- MAPEL -->
<section class="py-16 bg-sky-50">

    <h2 class="text-2xl font-bold text-center mb-10 text-sky-700">
        📖 Mata Pelajaran
    </h2>

    <div class="grid md:grid-cols-4 gap-4 px-10 text-center">

        <div class="bg-white p-5 rounded-xl shadow">Calistung</div>
        <div class="bg-white p-5 rounded-xl shadow">Matematika</div>
        <div class="bg-white p-5 rounded-xl shadow">Bahasa Indonesia</div>
        <div class="bg-white p-5 rounded-xl shadow">Bahasa Inggris</div>
        <div class="bg-white p-5 rounded-xl shadow">IPA</div>
        <div class="bg-white p-5 rounded-xl shadow">IPS</div>

    </div>

</section>

<!-- KONTAK -->
<section class="py-16 bg-white text-center">

    <h2 class="text-2xl font-bold text-sky-600 mb-6">
        📞 Kontak Les
    </h2>

    <div class="space-y-3 text-gray-700">

        <p>📱 WhatsApp: 08xx-xxxx-xxxx</p>
        <p>📍 Alamat: Jl. Pendidikan No. 1</p>
        <p>📧 Email: academy@les.com</p>

    </div>

</section>

<!-- CTA -->
<section class="py-16 bg-sky-600 text-white text-center">

    <h2 class="text-3xl font-bold">
        Yuk Mulai Belajar! 🚀
    </h2>

    <a href="/register"
       class="mt-6 inline-block bg-white text-sky-600 px-6 py-3 rounded-full font-bold">
        Daftar Sekarang
    </a>

</section>

@endsection