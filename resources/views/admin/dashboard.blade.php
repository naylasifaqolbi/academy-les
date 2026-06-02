@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Dashboard Admin
        </h1>

        <p class="text-gray-500 mt-1">
            Kelola data pendaftaran Academy Les
        </p>

    </div>

    <div class="flex gap-3">

        <a href="/admin/pdf"
           class="bg-red-500 hover:bg-red-600 text-white px-5 py-3 rounded-xl shadow transition">

            📄 Export PDF

        </a>

        <div class="bg-sky-100 text-sky-700 px-5 py-3 rounded-2xl font-semibold shadow">

            Total Data : {{ $totalSiswa }}

        </div>

    </div>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-6 mb-8">

    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white p-6 rounded-3xl shadow-lg">

        <p class="opacity-80">
            Total Siswa
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $totalSiswa }}
        </h2>

    </div>

    <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white p-6 rounded-3xl shadow-lg">

        <p class="opacity-80">
            Pending
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $pending }}
        </h2>

    </div>

    <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-3xl shadow-lg">

        <p class="opacity-80">
            Diterima
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $diterima }}
        </h2>

    </div>

    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white p-6 rounded-3xl shadow-lg">

        <p class="opacity-80">
            Ditolak
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ $ditolak }}
        </h2>

    </div>

</div>

<!-- CHART DAN RINGKASAN -->
<div class="grid md:grid-cols-2 gap-6">

    <div class="bg-white p-6 rounded-3xl shadow-lg">

        <h2 class="text-xl font-bold mb-4 text-slate-700">
            Grafik Status Pendaftaran
        </h2>

        <div class="max-w-sm mx-auto">
            <canvas id="statusChart"></canvas>
        </div>

    </div>

    <div class="bg-white p-6 rounded-3xl shadow-lg">

        <h2 class="text-xl font-bold mb-4 text-slate-700">
            Ringkasan Data
        </h2>

        <div class="space-y-4">

            <div class="flex justify-between border-b pb-2">

                <span>Total Siswa</span>

                <strong>
                    {{ $totalSiswa }}
                </strong>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span>Pending</span>

                <strong class="text-yellow-500">
                    {{ $pending }}
                </strong>

            </div>

            <div class="flex justify-between border-b pb-2">

                <span>Diterima</span>

                <strong class="text-green-500">
                    {{ $diterima }}
                </strong>

            </div>

            <div class="flex justify-between">

                <span>Ditolak</span>

                <strong class="text-red-500">
                    {{ $ditolak }}
                </strong>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('statusChart');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [
            'Pending',
            'Diterima',
            'Ditolak'
        ],

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('statusChart');

new Chart(ctx, {

    type: 'doughnut',

    data: {

        labels: [
            'Pending',
            'Diterima',
            'Ditolak'
        ],

        datasets: [{

            data: [
                {{ $pending }},
                {{ $diterima }},
                {{ $ditolak }}
            ],

            backgroundColor: [
                '#FACC15', // Kuning
                '#22C55E', // Hijau
                '#EF4444'  // Merah
            ],

            borderWidth: 2

        }]

    },

    options: {

        responsive: true,

        plugins: {

            legend: {
                position: 'bottom'
            }

        }

    }

});

</script>

@endsection