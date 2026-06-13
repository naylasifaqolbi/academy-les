@extends('layouts.admin')

@section('content')

<style>
/* =========================
   PASTEL THEME FIXED
========================= */

:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --lavender-soft:#EEE5FA;

    --yellow:#F8EED0;
    --green:#DDEED6;

    --text:#4F465E;
    --muted:#6F6682;
}

/* BACKGROUND */
body{
    background:#F6F4FB;
}

/* soft background layer */
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

/* GLASS CARD */
.glass-card{
    background:rgba(255,255,255,.75);
    backdrop-filter:blur(18px);
    border:1px solid rgba(217,207,245,.35);
    border-radius:24px;
    box-shadow:0 10px 30px rgba(143,116,204,.10);
}

/* STAT CARD */
.stat-card{
    border-radius:28px;
    padding:24px;
    color:#3F3558;
    box-shadow:0 10px 30px rgba(143,116,204,.12);
    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);
}

/* GRADIENTS */
.gradient-lavender{
    background:linear-gradient(135deg, #D9CFF5, #EEE5FA);
}

.gradient-yellow{
    background:linear-gradient(135deg, #F8EED0, #FFF3D6);
}

.gradient-green{
    background:linear-gradient(135deg, #DDEED6, #EEF7EA);
}

.gradient-red-soft{
    background:linear-gradient(135deg, #F5D6D6, #FBEAEA);
}

/* BUTTON */
.btn-soft{
    background:var(--lavender);
    color:#4F465E;
    transition:.3s;
    border-radius:14px;
}

.btn-soft:hover{
    background:var(--lavender-deep);
    color:white;
    transform:translateY(-2px);
}
</style>

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-4xl font-bold" style="color:#4F465E;">
            Dashboard Admin
        </h1>

        <p style="color:#6F6682;" class="mt-1">
            Kelola data pendaftaran Academy Les
        </p>
    </div>

    <div class="flex gap-3">

        <a href="/admin/pdf"
           class="px-5 py-3 btn-soft shadow">

            📄 Export PDF
        </a>

        <div class="px-5 py-3 rounded-2xl font-semibold shadow"
             style="background:var(--lavender-soft); color:#4F465E;">

            Total Data : {{ $totalSiswa }}

        </div>

    </div>
</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-4 gap-6 mb-8">

    <div class="stat-card gradient-lavender">
        <p style="opacity:.7;">Total Siswa</p>
        <h2 class="text-4xl font-bold mt-2">{{ $totalSiswa }}</h2>
    </div>

    <div class="stat-card gradient-yellow">
        <p style="opacity:.7;">Pending</p>
        <h2 class="text-4xl font-bold mt-2">{{ $pending }}</h2>
    </div>

    <div class="stat-card gradient-green">
        <p style="opacity:.7;">Diterima</p>
        <h2 class="text-4xl font-bold mt-2">{{ $diterima }}</h2>
    </div>

    <div class="stat-card gradient-red-soft">
        <p style="opacity:.7;">Ditolak</p>
        <h2 class="text-4xl font-bold mt-2">{{ $ditolak }}</h2>
    </div>

</div>

<!-- CHART + RINGKASAN -->
<div class="grid md:grid-cols-2 gap-6">

    <div class="glass-card p-6">

        <h2 class="text-xl font-bold mb-4" style="color:#4F465E;">
            Grafik Status Pendaftaran
        </h2>

        <div class="max-w-sm mx-auto">
            <canvas id="statusChart"></canvas>
        </div>

    </div>

    <div class="glass-card p-6">

        <h2 class="text-xl font-bold mb-4" style="color:#4F465E;">
            Ringkasan Data
        </h2>

        <div class="space-y-4">

            <div class="flex justify-between border-b pb-2">
                <span>Total Siswa</span>
                <strong>{{ $totalSiswa }}</strong>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span>Pending</span>
                <strong style="color:#B38D45;">{{ $pending }}</strong>
            </div>

            <div class="flex justify-between border-b pb-2">
                <span>Diterima</span>
                <strong style="color:#5E8A55;">{{ $diterima }}</strong>
            </div>

            <div class="flex justify-between">
                <span>Ditolak</span>
                <strong style="color:#B35C5C;">{{ $ditolak }}</strong>
            </div>

        </div>

    </div>

</div>

<!-- CHART JS (FIXED - TIDAK RUSAK LAGI) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('statusChart');

new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Diterima', 'Ditolak'],
        datasets: [{
            data: [
                {{ $pending }},
                {{ $diterima }},
                {{ $ditolak }}
            ],
            backgroundColor: [
                '#F8EED0', // soft yellow
                '#DDEED6', // soft green
                '#D9CFF5'  // soft lavender
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