<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Academy Les</title>

    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-gradient-to-br from-sky-100 to-pink-100 flex items-center justify-center px-4">

    <div class="bg-white shadow-xl rounded-3xl overflow-hidden max-w-5xl w-full">

        <div class="grid md:grid-cols-2">

            <!-- LEFT -->
            <div class="bg-sky-600 text-white p-10 flex flex-col justify-center">

                <h1 class="text-4xl font-bold mb-4">
                    🎓 Academy Les
                </h1>

                <p class="text-sky-100 text-lg">
                    Bergabunglah bersama Academy Les dan tingkatkan kemampuan belajar
                    siswa TK, SD, dan SMP dengan metode yang menyenangkan.
                </p>

                <div class="mt-8">

                <h3 class="font-semibold mb-4">
                    Program Unggulan
                </h3>

                <ul class="space-y-3">

                    <li>✓ Matematika</li>
                    <li>✓ Bahasa Indonesia</li>
                    <li>✓ Bahasa Inggris</li>
                    <li>✓ IPA</li>
                    <li>✓ IPS</li>
                    <li>✓ Calistung</li>

                </ul>

            </div>

            </div>

            <!-- RIGHT -->
            <div class="p-10">

                <h2 class="text-3xl font-bold text-gray-800 mb-2">
                    Register
                </h2>

                <p class="text-gray-500 mb-6">
                    Buat akun terlebih dahulu untuk melakukan pendaftaran les.
                </p>

                @if($errors->any())
                    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="/register">

                    @csrf

                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            required
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">

                    </div>

                    <div class="mb-4">

                        <label class="block mb-2 font-medium">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            required
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">

                    </div>

                    <div class="mb-6">

                        <label class="block mb-2 font-medium">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-sky-500 focus:outline-none">

                    </div>

                    <button
                        type="submit"
                        class="w-full bg-sky-600 text-white py-3 rounded-lg hover:bg-sky-700 transition">

                        Register

                    </button>

                </form>

                <div class="text-center mt-6">

                    <p class="text-gray-600">
                        Sudah memiliki akun?
                    </p>

                    <a
                        href="/login"
                        class="text-sky-600 font-semibold hover:underline">

                        Login Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
</html>