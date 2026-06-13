@extends('layouts.app')

@section('content')

<style>
html{scroll-behavior:smooth;}
body{
    overflow-x:hidden;
    background:#F6F4FB;
    color:#4F465E;
    cursor:none;
}

/* =========================
   CURSOR GLOW
========================= */
.cursor{
    position:fixed;
    width:18px;
    height:18px;
    border-radius:999px;
    background:rgba(143,116,204,.7);
    pointer-events:none;
    z-index:9999;
    transform:translate(-50%,-50%);
    filter:blur(1px);
}

.cursor-ring{
    position:fixed;
    width:55px;
    height:55px;
    border-radius:999px;
    border:1px solid rgba(143,116,204,.35);
    pointer-events:none;
    z-index:9998;
    transform:translate(-50%,-50%);
}

/* =========================
   COLOR SYSTEM
========================= */
:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --lavender-soft:#EEE5FA;

    --yellow:#F8EED0;
    --green:#DDEED6;

    --muted:#6F6682;
}

/* =========================
   BACKGROUND DEPTH + IMAGE LAYER (NEW)
========================= */
body::before{
    content:"";
    position:fixed;
    inset:0;
    z-index:-4;
    background:
        radial-gradient(circle at 15% 10%, rgba(217,207,245,.75), transparent 45%),
        radial-gradient(circle at 85% 25%, rgba(248,238,208,.6), transparent 50%),
        radial-gradient(circle at 30% 85%, rgba(221,238,214,.6), transparent 50%);
}

/* 🌫️ CINEMATIC IMAGE LAYER */
body::after{
    content:"";
    position:fixed;
    inset:0;
    z-index:-3;
    background-image:url("https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=2000");
    background-size:cover;
    background-position:center;
    opacity:.05;
    filter:blur(0px);
}

/* noise */
body{
    position:relative;
}
body::before,
body::after{
    pointer-events:none;
}

/* ORBS */
.orb{
    position:fixed;
    border-radius:999px;
    filter:blur(140px);
    opacity:.22;
    z-index:-2;
}
.orb1{width:520px;height:520px;background:var(--lavender);top:-160px;left:-160px;}
.orb2{width:360px;height:360px;background:var(--yellow);top:35%;right:-120px;}
.orb3{width:320px;height:320px;background:var(--green);bottom:-120px;left:15%;}

/* =========================
   CARD PREMIUM
========================= */
.card{
    position:relative;
    overflow:hidden;

    background:
        linear-gradient(135deg,
            rgba(255,255,255,.65),
            rgba(238,229,250,.55),
            rgba(221,238,214,.35)
        );

    backdrop-filter:blur(28px);
    border:1px solid rgba(255,255,255,.6);

    border-radius:30px;
    box-shadow:
        0 10px 40px rgba(143,116,204,.08),
        inset 0 1px 0 rgba(255,255,255,.4);

    opacity:0;
    transform:translateY(30px);
    transition:all 1s cubic-bezier(.22,1,.36,1);
}

.card.show{
    opacity:1;
    transform:translateY(0);
}

.card:hover{
    transform:translateY(-10px) scale(1.02);
    box-shadow:0 30px 80px rgba(143,116,204,.18);
}

/* shimmer */
.card::before{
    content:"";
    position:absolute;
    inset:-60%;
    background:linear-gradient(120deg,transparent,rgba(255,255,255,.25),transparent);
    transform:rotate(25deg);
    transition:.9s;
}
.card:hover::before{
    left:120%;
}

/* ICON */
.icon{
    font-size:36px;
    margin-bottom:12px;
    display:inline-block;
    filter:drop-shadow(0 10px 18px rgba(143,116,204,.18));
}

/* BUTTON */
.btn{
    display:inline-flex;
    padding:14px 28px;
    border-radius:16px;
    font-weight:600;
    transition:.4s;
}

.btn-primary{
    background:var(--lavender);
    color:#3F3558;
}

.btn-primary:hover{
    background:var(--lavender-deep);
    color:white;
    transform:translateY(-3px);
}

/* HERO */
.hero-frame{
    border-radius:36px;
    overflow:hidden;
    background:linear-gradient(135deg,var(--lavender-soft),white);
    padding:12px;
}

.hero-frame img{
    width:100%;
    border-radius:24px;
    transition:1s;
}

.hero-frame:hover img{
    transform:scale(1.08);
}

/* =========================
   FLOATING WIDGETS (NEW)
========================= */
.float-widget{
    position:absolute;
    padding:12px 16px;
    border-radius:16px;
    background:rgba(255,255,255,.6);
    backdrop-filter:blur(18px);
    border:1px solid rgba(255,255,255,.5);
    font-size:12px;
    box-shadow:0 10px 30px rgba(143,116,204,.12);
    animation:float 6s ease-in-out infinite;
}

@keyframes float{
    0%,100%{transform:translateY(0)}
    50%{transform:translateY(-10px)}
}

/* REVEAL */
.reveal{
    opacity:0;
    transform:translateY(35px);
    transition:1s cubic-bezier(.22,1,.36,1);
}

.reveal.show{
    opacity:1;
    transform:translateY(0);
}

/* badge */
.badge{
    display:inline-block;
    padding:8px 18px;
    border-radius:999px;
    font-size:13px;
    font-weight:600;
}
</style>

<!-- CURSOR -->
<div class="cursor" id="cursor"></div>
<div class="cursor-ring" id="cursorRing"></div>

<!-- ORBS -->
<div class="orb orb1"></div>
<div class="orb orb2"></div>
<div class="orb orb3"></div>

{{-- HERO --}}
<section class="py-28 relative">
<div class="max-w-7xl mx-auto px-6">

<!-- 🌟 FLOAT WIDGETS (NEW VISUAL ELEMENTS) -->
<div class="float-widget" style="top:80px;left:60px;">📚 500+ Siswa</div>
<div class="float-widget" style="top:180px;right:80px;">👨‍🏫 Tutor Expert</div>
<div class="float-widget" style="bottom:80px;left:45%;">🎓 TK • SD • SMP</div>

<div class="grid md:grid-cols-2 gap-16 items-center">

    <div class="reveal">
        <span class="badge" style="background:var(--lavender-soft);color:var(--lavender-deep);">
            ✨ Belajar Lebih Mudah
        </span>

        <h1 class="text-5xl font-bold mt-6">
            Belajar Lebih Mudah
            <span style="color:var(--lavender-deep);">Bersama Academy Les</span>
        </h1>

        <p class="mt-6" style="color:var(--muted);">
            Academy Les menyediakan bimbingan belajar untuk siswa TK, SD, dan SMP dengan metode pembelajaran yang interaktif, terstruktur, dan menyenangkan.
        </p>

        <div class="mt-8 flex gap-4">
            <a href="/register" class="btn btn-primary">Daftar</a>
            <a href="/profile" class="btn btn-primary">Profil</a>
        </div>
    </div>

    <div class="reveal hero-frame">
        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b">

        <!-- mini widget inside image -->
        <div class="float-widget" style="bottom:20px;right:20px;">
            🚀 Belajar Interaktif
        </div>
    </div>

</div>

</div>
</section>

{{-- STATS --}}
<section class="py-10">
<div class="max-w-6xl mx-auto px-6">
<div class="card p-8 reveal">

<div class="grid md:grid-cols-3 gap-6 text-center">

    <div class="card p-6">
        <div class="icon">👨‍🎓</div>
        <h2>500+</h2>
        <p>Siswa</p>
    </div>

    <div class="card p-6">
        <div class="icon">👨‍🏫</div>
        <h2>25+</h2>
        <p>Tutor</p>
    </div>

    <div class="card p-6">
        <div class="icon">🏫</div>
        <h2>TK • SD • SMP</h2>
        <p>Jenjang</p>
    </div>

</div>

</div>
</div>
</section>

{{-- JENJANG --}}
<section class="py-24">
<div class="max-w-6xl mx-auto px-6">

<div class="text-center mb-14 reveal">
    <span class="badge">🎓 Jenjang Pendidikan</span>
</div>

<div class="grid md:grid-cols-3 gap-8">

    <div class="card p-8 text-center reveal">
        <div class="icon">🎨</div>
        <h3>TK</h3>
        <p>Calistung, pengenalan angka, huruf dan pembelajaran dasar.</p>
    </div>

    <div class="card p-8 text-center reveal">
        <div class="icon">📚</div>
        <h3>SD</h3>
        <p>Pendampingan seluruh mata pelajaran sekolah dasar.</p>
    </div>

    <div class="card p-8 text-center reveal">
        <div class="icon">🎓</div>
        <h3>SMP</h3>
        <p>Persiapan ujian dan peningkatan prestasi akademik.</p>
    </div>

</div>

</div>
</section>

{{-- PROGRAM --}}
<section class="py-24">
<div class="max-w-6xl mx-auto px-6">

<div class="text-center mb-14 reveal">
    <span class="badge">📚 Program</span>
</div>

<div class="grid md:grid-cols-3 gap-8">

@foreach([
['📘','Matematika'],
['📖','B. Indonesia'],
['🇬🇧','B. Inggris'],
['🔬','IPA'],
['🌎','IPS'],
['✏️','Calistung']
] as $p)

<div class="card p-7 text-center reveal">
    <div class="icon">{{$p[0]}}</div>
    <h3>{{$p[1]}}</h3>
</div>

@endforeach

</div>

</div>
</section>

{{-- KEUNGGULAN --}}
<section class="py-24">
<div class="max-w-6xl mx-auto px-6">

<div class="text-center mb-14 reveal">
    <span class="badge">🌟 Keunggulan</span>
</div>

<div class="grid md:grid-cols-4 gap-6">

@foreach([
['👨‍🏫','Tutor'],
['📈','Monitoring'],
['📚','Materi'],
['😊','Fun Learning']
] as $k)

<div class="card p-6 text-center reveal">
    <div class="icon">{{$k[0]}}</div>
    <h3>{{$k[1]}}</h3>
</div>

@endforeach

</div>

</div>
</section>

{{-- ALUR --}}
<section class="py-28">
<div class="max-w-7xl mx-auto px-6">

<div class="text-center mb-16 reveal">
    <span class="badge">🚀 Cara Bergabung</span>
    <h2 class="text-4xl mt-6">4 Langkah</h2>
</div>

<div class="grid md:grid-cols-4 gap-8">

@foreach([
['1','Registrasi','📝'],
['2','Isi Form','📄'],
['3','Verifikasi','🔍'],
['4','Mulai Belajar','🚀']
] as $s)

<div class="card p-8 text-center reveal">
    <div class="icon">{{$s[2]}}</div>
    <div class="text-3xl font-bold">{{$s[0]}}</div>
    <h3>{{$s[1]}}</h3>
</div>

@endforeach

</div>

</div>
</section>

{{-- CTA --}}
<section class="py-28">
<div class="max-w-5xl mx-auto px-6 text-center card p-14 reveal"
style="background:var(--lavender);">

<h2 class="text-4xl">Siap Mulai?</h2>

<p class="mt-5">Daftar sekarang dan mulai belajar.</p>

<a href="/register" class="btn btn-primary mt-8">Daftar Sekarang</a>

</div>
</section>

<script>
function reveal(){
    document.querySelectorAll('.reveal,.card').forEach(el=>{
        const top = el.getBoundingClientRect().top;
        if(top < window.innerHeight - 80){
            el.classList.add('show');
        }
    });
}
window.addEventListener('scroll', reveal);
window.addEventListener('load', reveal);

/* CURSOR */
const cursor = document.getElementById("cursor");
const ring = document.getElementById("cursorRing");

let x=0,y=0,rx=0,ry=0;

window.addEventListener("mousemove",(e)=>{
    x=e.clientX;y=e.clientY;
    cursor.style.left=x+"px";
    cursor.style.top=y+"px";
});

function animate(){
    rx += (x-rx)*0.12;
    ry += (y-ry)*0.12;
    ring.style.left=rx+"px";
    ring.style.top=ry+"px";
    requestAnimationFrame(animate);
}
animate();
</script>

@endsection