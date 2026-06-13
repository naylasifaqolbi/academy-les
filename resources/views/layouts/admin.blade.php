<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Admin Panel - Academy Les
    </title>

    @vite('resources/css/app.css')

    <style>
        /* =========================
           GLOBAL PASTEL BACKGROUND
        ========================= */
        body{
            background:#F6F4FB;
        }

        body::before{
            content:"";
            position:fixed;
            inset:0;
            z-index:-2;
            background:
                radial-gradient(circle at 15% 10%, rgba(217,207,245,.65), transparent 45%),
                radial-gradient(circle at 85% 25%, rgba(248,238,208,.55), transparent 50%),
                radial-gradient(circle at 30% 85%, rgba(221,238,214,.55), transparent 50%);
        }

        /* =========================
           SIDEBAR GLASS
        ========================= */
        .sidebar{
            background:rgba(255,255,255,.35);
            backdrop-filter:blur(25px);
            -webkit-backdrop-filter:blur(25px);
            border-right:1px solid rgba(255,255,255,.4);
            color:#4F465E;
        }

        /* MENU ITEM */
        .menu-item{
            display:flex;
            align-items:center;
            gap:12px;
            padding:14px 20px;
            margin:6px 10px;
            border-radius:16px;
            transition:.3s;
            color:#4F465E;
        }

        .menu-item:hover{
            background:rgba(255,255,255,.45);
            transform:translateX(4px);
        }

        /* ACTIVE MENU (NO BLUE) */
        .active{
            background:rgba(217,207,245,.6);
            box-shadow:0 10px 25px rgba(143,116,204,.15);
            border-left:4px solid #8F74CC;
        }

        /* ICON */
        .icon{
            font-size:20px;
        }

        /* TOPBAR GLASS */
        .topbar{
            background:rgba(255,255,255,.6);
            backdrop-filter:blur(20px);
            border-bottom:1px solid rgba(255,255,255,.4);
        }

        /* LOGOUT HOVER */
        .logout:hover{
            background:rgba(248,238,208,.5);
        }
    </style>

</head>

<body>

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 sidebar shadow-xl">

        <!-- LOGO -->
        <div class="p-6 border-b border-white/40">

            <h2 class="text-3xl font-bold">
                🎓 Academy Les
            </h2>

            <p class="mt-2 opacity-70">
                Admin Panel
            </p>

        </div>

        <!-- MENU -->
        <nav class="py-4">

            <!-- DASHBOARD -->
            <a href="/admin/dashboard"
               class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">

                <span class="icon">📊</span>
                <span>Dashboard</span>

            </a>

            <!-- DATA SISWA -->
            <a href="/admin/siswa"
               class="menu-item {{ request()->is('admin/siswa') ? 'active' : '' }}">

                <span class="icon">👨‍🎓</span>
                <span>Data Siswa</span>

            </a>

            <!-- EXPORT PDF -->
            <a href="/admin/pdf"
               class="menu-item {{ request()->is('admin/pdf') ? 'active' : '' }}">

                <span class="icon">📄</span>
                <span>Export PDF</span>

            </a>

            <!-- GARIS -->
            <div class="border-t border-white/40 my-4 mx-4"></div>

            <!-- LOGOUT -->
            <form action="/logout" method="POST" onsubmit="return confirmLogout(event)">
    @csrf

    <button
        type="submit"
        class="w-full flex items-center gap-3 px-6 py-4 text-left logout-btn">

        <span>🚪</span>
        <span class="font-medium">Logout</span>

    </button>
</form>

        </nav>

    </aside>

    <!-- CONTENT -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="topbar shadow-sm">

            <div class="px-8 py-5 flex justify-between items-center">

                <h1 class="text-2xl font-bold" style="color:#4F465E;">

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

                <div style="color:#6F6682;">

                    Selamat Datang,
                    <span class="font-bold" style="color:#4F465E;">
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
<script>
function confirmLogout(e) {
    const yakin = confirm("Apakah kamu yakin ingin logout dari sistem?");
    if (!yakin) {
        e.preventDefault();
        return false;
    }
    return true;
}
</script>
</body>
</html>