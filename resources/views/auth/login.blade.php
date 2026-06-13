<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Academy Les</title>

    @vite('resources/css/app.css')

    <style>
        html { scroll-behavior: smooth; }

        body {
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F6F4FB;
            cursor: none;
            position: relative;
            color: #4F465E;
        }

        .cursor, .cursor-ring {
            position: fixed;
            pointer-events: none;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }

        .cursor {
            width: 16px;
            height: 16px;
            background: radial-gradient(circle, rgba(143,116,204,.85), transparent 70%);
        }

        .cursor-ring {
            width: 48px;
            height: 48px;
            border: 1px solid rgba(143,116,204,.3);
            z-index: 9998;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -2;
            background:
                radial-gradient(circle at 20% 20%, rgba(217,207,245,.75), transparent 45%),
                radial-gradient(circle at 80% 30%, rgba(248,238,208,.55), transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(221,238,214,.55), transparent 55%);
        }

        .glass {
            background: rgba(255,255,255,.6);
            backdrop-filter: blur(26px);
            border-radius: 24px;
            padding: 32px;
            width: 100%;
            max-width: 420px;
        }

        .btn {
            background: #B9A7E6;
            transition: .3s;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 45px rgba(143,116,204,.18);
        }
    </style>
</head>

<body>

<div class="cursor"></div>
<div class="cursor-ring"></div>

<div class="glass">

    <h1 class="text-3xl font-bold text-center mb-6">
        🎓 Academy Les
    </h1>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- ERROR --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-3 rounded-lg mb-4">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-4">
            <label class="block mb-2">Email</label>
            <input type="email" name="email" required class="w-full p-3 rounded-lg border">
        </div>

        <div class="mb-4">
            <label class="block mb-2">Password</label>
            <input type="password" name="password" required class="w-full p-3 rounded-lg border">
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="remember" class="mr-2">
            <label>Remember Me</label>
        </div>

        <button type="submit" class="btn w-full py-3 rounded-lg text-white">
            Login
        </button>
    </form>

    <div class="text-center mt-6">
        <p>Belum punya akun?</p>
        <a href="/register" class="text-purple-600 font-semibold">
            Daftar Sekarang
        </a>
    </div>

</div>

<script>
const cursor = document.querySelector(".cursor");
const ring = document.querySelector(".cursor-ring");

document.addEventListener("mousemove", (e) => {
    cursor.style.left = e.clientX + "px";
    cursor.style.top = e.clientY + "px";

    ring.style.left = e.clientX + "px";
    ring.style.top = e.clientY + "px";
});
</script>

</body>
</html>