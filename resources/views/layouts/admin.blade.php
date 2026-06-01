<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="flex bg-gray-100">

<aside class="w-64 bg-white p-6">
    <h2 class="font-bold">Admin Panel</h2>
    <a href="/admin/dashboard">Dashboard</a>
</aside>

<main class="p-10 flex-1">
    @yield('content')
</main>

</body>
</html>