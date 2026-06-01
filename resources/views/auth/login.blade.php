<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center h-screen bg-gray-100">

<form method="POST" action="/login" class="bg-white p-6 rounded shadow w-96">
    @csrf

    <h2 class="text-xl font-bold mb-4">Login</h2>

    <input name="email" placeholder="Email"
           class="w-full border p-2 mb-3">

    <input type="password" name="password" placeholder="Password"
           class="w-full border p-2 mb-3">

    <button class="w-full bg-sky-600 text-white py-2 rounded">
        Login
    </button>
</form>

</body>
</html>