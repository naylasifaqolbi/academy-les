<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Academy Les</title>

    @vite('resources/css/app.css')

    <style>
        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background:#F6F4FB;
        }

        /* =========================
           BACKGROUND PASTEL DEPTH
        ========================= */
        body::before{
            content:"";
            position:fixed;
            inset:0;
            z-index:-2;
            background:
                radial-gradient(circle at 20% 10%, rgba(217,207,245,.65), transparent 45%),
                radial-gradient(circle at 80% 25%, rgba(248,238,208,.55), transparent 50%),
                radial-gradient(circle at 30% 85%, rgba(221,238,214,.55), transparent 50%);
        }

        body::after{
            content:"";
            position:fixed;
            inset:0;
            z-index:-1;
            background-image:url("https://www.transparenttextures.com/patterns/noise.png");
            opacity:.08;
        }

        /* =========================
           MAIN CARD GLASS
        ========================= */
        .auth-card{
            background:rgba(255,255,255,.6);
            backdrop-filter:blur(26px);
            border:1px solid rgba(255,255,255,.5);
            border-radius:28px;
            box-shadow:0 20px 60px rgba(143,116,204,.12);
            overflow:hidden;
        }

        /* LEFT PANEL PASTEL GRADIENT */
        .left-panel{
            background:linear-gradient(180deg,
                #D9CFF5,
                #EEE5FA,
                #DDEED6
            );
            color:#4F465E;
        }

        /* RIGHT PANEL */
        .right-panel{
            background:rgba(255,255,255,.65);
        }

        /* INPUT STYLE SOFT */
        input{
            border:1px solid rgba(143,116,204,.25);
            border-radius:14px;
            padding:12px;
            transition:.3s;
            outline:none;
        }

        input:focus{
            border-color:#8F74CC;
            box-shadow:0 0 0 3px rgba(217,207,245,.5);
        }

        /* BUTTON PASTEL */
        .btn-pastel{
            background:linear-gradient(135deg,#D9CFF5,#DDEED6);
            color:#4F465E;
            transition:.3s ease;
        }

        .btn-pastel:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 35px rgba(143,116,204,.18);
        }

        /* TEXT SOFT */
        h1,h2,h3{
            color:#4F465E;
        }

        p{
            color:#6F6682;
        }

    </style>

</head>

<body>

    <div class="auth-card max-w-5xl w-full">

        <div class="grid md:grid-cols-2">

            <!-- LEFT -->
            <div class="left-panel p-10 flex flex-col justify-center">

                <h1 class="text-4xl font-bold mb-4">
                    🎓 Academy Les
                </h1>

                <p class="text-lg">
                    Bergabunglah bersama Academy Les dan tingkatkan kemampuan belajar
                    siswa TK, SD, dan SMP dengan metode yang menyenangkan.
                </p>

                <div class="mt-8">

                    <h3 class="font-semibold mb-4">
                        Program Unggulan
                    </h3>

                    <ul class="space-y-2">
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
            <div class="right-panel p-10">

                <h2 class="text-3xl font-bold mb-2">
                    Register
                </h2>

                <p class="mb-6">
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
                        <label class="block mb-2 font-medium">Nama Lengkap</label>
                        <input type="text" name="name" required class="w-full">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 font-medium">Email</label>
                        <input type="email" name="email" required class="w-full">
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 font-medium">Password</label>
                        <input type="password" name="password" required class="w-full">
                    </div>

                    <button type="submit"
                            class="w-full btn-pastel py-3 rounded-xl font-semibold">

                        Register

                    </button>

                </form>

                <div class="text-center mt-6">

                    <p>
                        Sudah memiliki akun?
                    </p>

                    <a href="/login"
                       class="font-semibold"
                       style="color:#8F74CC;">

                        Login Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</body>
</html>