<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academy Les</title>

    @vite('resources/css/app.css')
</head>

<body style="background-color:#F8F4FD;" class="min-h-screen">

<!-- NAVBAR -->
<nav
    class="shadow-sm border-b"
    style="
        background-color:#DDD0F3;
        border-color:#CDBBEA;
    ">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/"
           class="text-2xl font-bold transition"
           style="color:#7E66B8;">

            🎓 Academy Les

        </a>

        <div class="flex items-center gap-4">

            <!-- MENU -->
            <a href="/"
               class="font-medium transition"
               style="color:#5F566D;"
               onmouseover="this.style.color='#8B73C5'"
               onmouseout="this.style.color='#5F566D'">

                Home

            </a>

            <a href="/profile"
               class="font-medium transition"
               style="color:#5F566D;"
               onmouseover="this.style.color='#8B73C5'"
               onmouseout="this.style.color='#5F566D'">

                Profile Les

            </a>

            @guest

                <!-- LOGIN -->
                <a href="/login"
                   class="px-4 py-2 rounded-xl shadow-sm transition"
                   style="
                        background:#D8EBCF;
                        color:#4E7247;
                   "
                   onmouseover="this.style.background='#CBE4C2'"
                   onmouseout="this.style.background='#D8EBCF'">

                    Login

                </a>

                <!-- REGISTER -->
                <a href="/register"
                   class="px-4 py-2 rounded-xl shadow-sm transition"
                   style="
                        background:#CFE7C8;
                        color:#4E7247;
                   "
                   onmouseover="this.style.background='#C2DDBA'"
                   onmouseout="this.style.background='#CFE7C8'">

                    Register

                </a>

            @endguest

            @auth

                @if(Auth::user()->role == 'admin')

                    <a href="/admin/dashboard"
                       class="px-4 py-2 rounded-xl shadow-sm transition"
                       style="
                            background:#CFE7C8;
                            color:#42683B;
                       ">

                        Dashboard

                    </a>

                @else

                    <a href="/user/dashboard"
                       class="px-4 py-2 rounded-xl shadow-sm transition"
                       style="
                            background:#CFE7C8;
                            color:#42683B;
                       ">

                        Dashboard

                    </a>

                @endif

                <!-- LOGOUT -->
                <form action="/logout" method="POST">
                    @csrf

                    <button
                        class="px-4 py-2 rounded-xl shadow-sm transition"
                        style="
                            background:#D8EBCF;
                            color:#4E7247;
                        ">

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
    <footer
        class="mt-20 border-t"
        style="
            background-color:#F7E7B4;
            color:#5F566D;
            border-color:#E8D59C;
        ">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="grid md:grid-cols-3 gap-8">

                <!-- ABOUT -->
                <div>

                    <h3 class="font-bold text-xl mb-3"
                        style="color:#8B73C5;">

                        Academy Les

                    </h3>

                    <p>
                        Bimbingan belajar untuk siswa TK, SD, dan SMP.
                    </p>

                </div>

                <!-- KONTAK -->
                <div>

                    <h3 class="font-bold text-xl mb-3"
                        style="color:#5E8A55;">

                        Kontak

                    </h3>

                    <p>📞 08xxxxxxxxxx</p>
                    <p>📧 academyles@gmail.com</p>

                </div>

                <!-- JAM -->
                <div>

                    <h3 class="font-bold text-xl mb-3"
                        style="color:#B38D45;">

                        Jam Operasional

                    </h3>

                    <p>Senin - Jumat : 13.00 - 20.00</p>
                    <p>Sabtu : 08.00 - 15.00</p>

                </div>

            </div>

            <!-- COPYRIGHT -->
            <div
                class="border-t mt-8 pt-5 text-center"
                style="
                    border-color:rgba(95,86,109,0.12);
                    color:#7B738A;
                ">

                © 2026 Academy Les — Belajar Jadi Lebih Menyenangkan ✨

            </div>

        </div>

    </footer>

</body>
</html>