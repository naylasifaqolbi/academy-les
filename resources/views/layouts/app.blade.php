<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academy Les</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-md">

        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

            <a href="/" class="text-2xl font-bold text-sky-600">
                🎓 Academy Les
            </a>

            <div class="flex items-center gap-4">

                <a href="/" class="hover:text-sky-600">
                    Home
                </a>

                <a href="/profile" class="hover:text-sky-600">
                    Profile Les
                </a>

                @guest

                    <a href="/login"
                       class="bg-sky-600 text-white px-4 py-2 rounded-lg">
                        Login
                    </a>

                    <a href="/register"
                       class="border border-sky-600 text-sky-600 px-4 py-2 rounded-lg">
                        Register
                    </a>

                @endguest

                @auth

                    @if(Auth::user()->role == 'admin')

                        <a href="/admin/dashboard"
                           class="bg-green-600 text-white px-4 py-2 rounded-lg">
                            Dashboard
                        </a>

                    @else

                        <a href="/user/dashboard"
                           class="bg-green-600 text-white px-4 py-2 rounded-lg">
                            Dashboard
                        </a>

                    @endif

                    <form action="/logout" method="POST">
                        @csrf

                        <button
                            class="bg-red-500 text-white px-4 py-2 rounded-lg">

                            Logout

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </nav>

    <!-- CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-800 text-white mt-20">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid md:grid-cols-3 gap-8">

                <div>
                    <h3 class="font-bold text-xl mb-3">
                        Academy Les
                    </h3>

                    <p>
                        Bimbingan belajar untuk siswa TK, SD, dan SMP.
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-xl mb-3">
                        Kontak
                    </h3>

                    <p>📞 08xxxxxxxxxx</p>
                    <p>📧 academyles@gmail.com</p>
                </div>

                <div>
                    <h3 class="font-bold text-xl mb-3">
                        Jam Operasional
                    </h3>

                    <p>Senin - Jumat : 13.00 - 20.00</p>
                    <p>Sabtu : 08.00 - 15.00</p>
                </div>

            </div>

        </div>

    </footer>

</body>
</html>