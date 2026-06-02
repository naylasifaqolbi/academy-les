<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Academy Les</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-sky-100 to-pink-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">

        <div class="text-center mb-6">

            <h1 class="text-3xl font-bold text-sky-600">
                🎓 Academy Les
            </h1>

            <p class="text-gray-500 mt-2">
                Silakan login untuk melanjutkan
            </p>

        </div>

        {{-- Pesan sukses setelah register --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error login --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-4">

                <label class="block mb-2 font-medium">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-sky-500">

            </div>

            <div class="mb-6">

                <label class="block mb-2 font-medium">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-sky-500">

            </div>

            <button
                type="submit"
                class="w-full bg-sky-600 text-white py-3 rounded-lg hover:bg-sky-700 transition">

                Login

            </button>

        </form>

        <div class="text-center mt-6">

            <p class="text-gray-600">
                Belum punya akun?
            </p>

            <a href="/register"
               class="text-sky-600 font-semibold hover:underline">
                Daftar Sekarang
            </a>

        </div>

    </div>

</body>
</html>