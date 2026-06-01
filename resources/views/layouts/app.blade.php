<!DOCTYPE html>
<html>
<head>
    <title>Academy Les</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-sky-50">

<!-- NAVBAR -->
<nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">

    <div class="font-bold text-sky-600 text-xl">
        🌈 Academy Les
    </div>

    <div class="space-x-6 text-gray-700">

        <a href="/" class="hover:text-sky-600">Home</a>
        <a href="/profile" class="hover:text-sky-600">Profile Les</a>

        <a href="/login"
           class="bg-sky-600 text-white px-4 py-2 rounded-lg hover:bg-sky-700">
            Login
        </a>

        <a href="/register"
           class="bg-white border border-sky-600 text-sky-600 px-4 py-2 rounded-lg hover:bg-sky-100">
            Register
        </a>

    </div>
</nav>

@yield('content')

</body>
</html>