@extends('layouts.app')

@section('content')

<section class="text-center py-24 bg-linear-to-b from-sky-100 to-pink-50">

    <h1 class="text-4xl font-bold text-gray-800">
        🌟 Belajar Jadi Seru & Menyenangkan!
    </h1>

    <p class="mt-4 text-gray-600 max-w-xl mx-auto">
        Academy Les membantu anak TK & SD belajar dengan cara yang menyenangkan,
        penuh warna, dan tidak membosankan 🎨✨
    </p>

    <div class="mt-8 space-x-4">
        <a href="/login"
           class="bg-sky-600 text-white px-6 py-3 rounded-full shadow hover:bg-sky-700">
            Login
        </a>

        <a href="/register"
           class="bg-white border border-sky-600 text-sky-600 px-6 py-3 rounded-full hover:bg-sky-100">
            Register
        </a>
    </div>

</section>

@endsection