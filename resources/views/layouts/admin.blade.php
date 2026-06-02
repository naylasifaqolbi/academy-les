<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Admin Panel - Academy Les
    </title>

    @vite('resources/css/app.css')

</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-slate-800 text-white shadow-xl">

        <!-- LOGO -->
        <div class="p-6 border-b border-slate-700">

            <h2 class="text-3xl font-bold">
                🎓 Academy Les
            </h2>

            <p class="text-gray-300 mt-2">
                Admin Panel
            </p>

        </div>

        <!-- MENU -->
        <nav class="py-4">

            <!-- DASHBOARD -->
            <a
                href="/admin/dashboard"

                class="flex items-center gap-3 px-6 py-4 transition

                {{ request()->is('admin/dashboard')
                    ? 'bg-sky-600 text-white border-r-4 border-white'
                    : 'hover:bg-slate-700' }}">

                <span class="text-xl">
                    📊
                </span>

                <span class="font-medium">
                    Dashboard
                </span>

            </a>

            <!-- DATA SISWA -->
            <a
                href="/admin/siswa"

                class="flex items-center gap-3 px-6 py-4 transition

                {{ request()->is('admin/siswa')
                    ? 'bg-sky-600 text-white border-r-4 border-white'
                    : 'hover:bg-slate-700' }}">

                <span class="text-xl">
                    👨‍🎓
                </span>

                <span class="font-medium">
                    Data Siswa
                </span>

            </a>

            <!-- EXPORT PDF -->
            <a
                href="/admin/pdf"

                class="flex items-center gap-3 px-6 py-4 transition

                {{ request()->is('admin/pdf')
                    ? 'bg-sky-600 text-white border-r-4 border-white'
                    : 'hover:bg-slate-700' }}">

                <span class="text-xl">
                    📄
                </span>

                <span class="font-medium">
                    Export PDF
                </span>

            </a>

            <!-- GARIS -->
            <div class="border-t border-slate-700 my-4"></div>

            <!-- LOGOUT -->
            <form
                action="/logout"
                method="POST">

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-6 py-4 text-left hover:bg-red-600 transition">

                    <span class="text-xl">
                        🚪
                    </span>

                    <span class="font-medium">
                        Logout
                    </span>

                </button>

            </form>

        </nav>

    </aside>

    <!-- CONTENT -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow-sm">

            <div class="px-8 py-5 flex justify-between items-center">

                <div>

                    <h1 class="text-2xl font-bold text-slate-800">

                        @if(request()->is('admin/dashboard'))

                            Dashboard Admin

                        @elseif(request()->is('admin/siswa'))

                            Data Siswa

                        @elseif(request()->is('admin/pdf'))

                            Export PDF

                        @else

                            Admin Panel

                        @endif

                    </h1>

                </div>

                <div class="text-gray-600">

                    Selamat Datang,

                    <span class="font-bold text-slate-800">

                        {{ Auth::user()->name }}

                    </span>

                </div>

            </div>

        </header>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>