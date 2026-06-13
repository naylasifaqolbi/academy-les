@extends('layouts.app')

@section('content')

<style>
html{
    scroll-behavior:smooth;
}

body{
    overflow-x:hidden;
    background:#F6F4FB;
    cursor:none;
}

/* =========================
   CURSOR GLOW (NEW)
========================= */
.cursor{
    width:18px;
    height:18px;
    border-radius:50%;
    position:fixed;
    pointer-events:none;
    background:radial-gradient(circle, rgba(143,116,204,.9), transparent 70%);
    transform:translate(-50%,-50%);
    z-index:9999;
}

.cursor-ring{
    width:45px;
    height:45px;
    border-radius:50%;
    position:fixed;
    pointer-events:none;
    border:1px solid rgba(143,116,204,.35);
    transform:translate(-50%,-50%);
    z-index:9998;
}

/* =========================
   BACKGROUND CINEMATIC (UPGRADED MULTI LAYER)
========================= */
body::before{
    content:"";
    position:fixed;
    inset:0;
    z-index:-4;
    background:
        radial-gradient(circle at 15% 10%, rgba(217,207,245,.75), transparent 45%),
        radial-gradient(circle at 80% 30%, rgba(248,238,208,.55), transparent 50%),
        radial-gradient(circle at 30% 85%, rgba(221,238,214,.55), transparent 55%),
        linear-gradient(120deg,#F6F4FB,#EEE5FA,#F8EED0,#DDEED6);
    animation:bgShift 18s ease-in-out infinite;
}

/* 🌫️ IMAGE LAYER (NEW DEPTH) */
body::after{
    content:"";
    position:fixed;
    inset:0;
    z-index:-3;
    background-image:url("https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2000");
    background-size:cover;
    background-position:center;
    opacity:.06;
    filter:blur(0px);
}

/* noise vignette */
body{
    position:relative;
}

body::before,
body::after{
    pointer-events:none;
}

@keyframes bgShift{
    0%{filter:hue-rotate(0deg)}
    50%{filter:hue-rotate(10deg)}
    100%{filter:hue-rotate(0deg)}
}

/* =========================
   FLOAT ORBS
========================= */
.profile-blob{
    position:absolute;
    border-radius:999px;
    filter:blur(110px);
    opacity:.22;
    animation:floatBlob 12s ease-in-out infinite;
}

@keyframes floatBlob{
    0%{transform:translateY(0)}
    50%{transform:translateY(-35px)}
    100%{transform:translateY(0)}
}

.blob-purple{width:360px;height:360px;background:#DDD0F3;top:80px;left:-120px;}
.blob-yellow{width:260px;height:260px;background:#F8E9BE;right:-90px;top:420px;}
.blob-green{width:240px;height:240px;background:#D8EBCF;bottom:120px;left:25%;}

/* =========================
   CARD PREMIUM (ENHANCED)
========================= */
.card-hover{
    position:relative;
    overflow:hidden;
    border-radius:28px;

    background:
        linear-gradient(135deg,
        rgba(255,255,255,.75),
        rgba(238,229,250,.6),
        rgba(221,238,214,.35)
    );

    backdrop-filter:blur(22px);
    border:1px solid rgba(255,255,255,.5);

    box-shadow:0 10px 40px rgba(125,101,176,.08);

    transform-style:preserve-3d;
    transition:all .4s ease;
}

.card-hover:hover{
    transform:translateY(-12px) rotateX(6deg) rotateY(-6deg) scale(1.02);
    box-shadow:0 35px 80px rgba(125,101,176,.18);
}

/* shimmer */
.card-hover::before{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.35),transparent);
    transform:translateX(-100%);
    transition:.8s;
}

.card-hover:hover::before{
    transform:translateX(100%);
}

/* =========================
   SECTION GLOW (NEW ADDITION)
========================= */
section{
    position:relative;
}

section::before{
    content:"";
    position:absolute;
    inset:0;
    background:radial-gradient(circle at center, rgba(143,116,204,.06), transparent 60%);
    pointer-events:none;
}

/* =========================
   REVEAL ANIMATION
========================= */
.reveal{
    opacity:0;
    transform:translateY(40px) scale(.98);
    transition:1.2s cubic-bezier(.22,1,.36,1);
}

.reveal.show{
    opacity:1;
    transform:translateY(0) scale(1);
}

/* ICON */
.icon{
    font-size:42px;
    margin-bottom:10px;
    display:inline-block;
    filter:drop-shadow(0 10px 20px rgba(143,116,204,.2));
}

/* BUTTON */
.btn-hover:hover{
    transform:translateY(-5px) scale(1.02);
    box-shadow:0 20px 45px rgba(125,101,176,.2);
}

/* =========================
   FLOATING WIDGETS (NEW)
========================= */
.float-widget{
    position:absolute;
    padding:10px 14px;
    border-radius:14px;
    background:rgba(255,255,255,.55);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.4);
    font-size:12px;
    animation:float 6s ease-in-out infinite;
}

@keyframes float{
    0%,100%{transform:translateY(0)}
    50%{transform:translateY(-12px)}
}
</style>

<!-- CURSOR -->
<div class="cursor"></div>
<div class="cursor-ring"></div>

<!-- ORBS -->
<div class="profile-blob blob-purple"></div>
<div class="profile-blob blob-yellow"></div>
<div class="profile-blob blob-green"></div>

{{-- HERO --}}
<section class="text-center py-24">
<div class="max-w-4xl mx-auto px-6 reveal">

    <!-- FLOAT WIDGETS -->
    <div class="float-widget" style="top:120px;left:40px;">📚 500+ Siswa</div>
    <div class="float-widget" style="top:180px;right:60px;">👨‍🏫 Tutor Expert</div>

    <h1 class="text-5xl font-bold">
        📚 Profile Academy Les
    </h1>

    <p class="mt-5" style="color:#6F6682;">
        Tempat belajar premium dengan suasana nyaman dan interaktif.
    </p>

</div>
</section>

{{-- JENJANG --}}
<section class="py-20">
<div class="max-w-6xl mx-auto px-6">

<h2 class="text-center text-3xl font-bold mb-14 reveal">🎓 Jenjang Belajar</h2>

<div class="grid md:grid-cols-3 gap-8">

<div class="card-hover p-8 text-center reveal">
    <div class="icon">🎨</div>
    <h3>TK</h3>
    <p>Dasar membaca & berhitung</p>
</div>

<div class="card-hover p-8 text-center reveal">
    <div class="icon">📚</div>
    <h3>SD</h3>
    <p>Semua mata pelajaran dasar</p>
</div>

<div class="card-hover p-8 text-center reveal">
    <div class="icon">🎓</div>
    <h3>SMP</h3>
    <p>Persiapan ujian & prestasi</p>
</div>

</div>

</div>
</section>

{{-- MAPEL --}}
<section class="py-20">
<div class="max-w-6xl mx-auto px-6">

<h2 class="text-center text-3xl font-bold mb-14 reveal">📖 Mata Pelajaran</h2>

<div class="grid md:grid-cols-3 lg:grid-cols-6 gap-5 text-center">

@foreach([
'✏️ Calistung',
'📘 Matematika',
'📖 B. Indo',
'🇬🇧 English',
'🔬 IPA',
'🌎 IPS'
] as $m)

<div class="card-hover p-5 reveal">
    {{$m}}
</div>

@endforeach

</div>

</div>
</section>

{{-- CTA --}}
<section class="py-24 text-center">
<div class="max-w-4xl mx-auto px-6 reveal">

<h2 class="text-4xl font-bold">Siap Mulai? 🚀</h2>

<a href="/register"
   class="btn-hover inline-block mt-8 px-8 py-4 rounded-2xl font-semibold"
   style="background:#C7E6C0;color:#4E7247;">
   Daftar Sekarang
</a>

</div>
</section>

<script>
function reveal(){
    document.querySelectorAll('.reveal').forEach(el=>{
        const top = el.getBoundingClientRect().top;
        if(top < window.innerHeight - 80){
            el.classList.add('show');
        }
    });
}
window.addEventListener('scroll', reveal);
window.addEventListener('load', reveal);

/* CURSOR */
const cursor = document.querySelector('.cursor');
const ring = document.querySelector('.cursor-ring');

document.addEventListener('mousemove',(e)=>{
    cursor.style.left = e.clientX + 'px';
    cursor.style.top = e.clientY + 'px';

    ring.style.left = e.clientX + 'px';
    ring.style.top = e.clientY + 'px';
});
</script>

@endsection