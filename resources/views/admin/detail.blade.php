@extends('layouts.admin')

@section('content')

<style>
:root{
    --lavender:#D9CFF5;
    --lavender-deep:#8F74CC;
    --lavender-soft:#EEE5FA;

    --yellow:#F8EED0;
    --green:#DDEED6;

    --text:#4F465E;
}

/* background soft layer */
body{
    background:#F6F4FB;
}

body::before{
    content:"";
    position:fixed;
    inset:0;
    z-index:-2;
    background:
        radial-gradient(circle at 20% 15%, rgba(217,207,245,.65), transparent 45%),
        radial-gradient(circle at 80% 30%, rgba(248,238,208,.55), transparent 50%),
        radial-gradient(circle at 30% 85%, rgba(221,238,214,.55), transparent 55%);
}

/* main card */
.detail-card{
    background:rgba(255,255,255,.75);
    backdrop-filter:blur(18px);
    border:1px solid rgba(217,207,245,.4);
    border-radius:30px;
    box-shadow:
        0 10px 30px rgba(143,116,204,.08),
        inset 0 1px 0 rgba(255,255,255,.5);
    position:relative;
    overflow:hidden;
}

/* decorative glow */
.detail-card::before{
    content:"";
    position:absolute;
    width:300px;
    height:300px;
    background:var(--lavender-soft);
    filter:blur(80px);
    top:-120px;
    right:-120px;
    opacity:.6;
}

/* title */
.title{
    color:var(--lavender-deep);
}

/* label row */
.row{
    padding:10px 0;
    border-bottom:1px dashed rgba(143,116,204,.2);
}

.label{
    font-weight:600;
    color:#6F6682;
}

/* value */
.value{
    color:var(--text);
    font-weight:500;
}

/* status badge */
.badge{
    display:inline-block;
    padding:6px 14px;
    border-radius:999px;
    font-size:13px;
}

.badge-yellow{background:var(--yellow);color:#7A5A00;}
.badge-green{background:var(--green);color:#2E6B3A;}
.badge-red{background:#F8D7DA;color:#842029;}

/* button */
.btn-back{
    background:linear-gradient(135deg,var(--lavender),var(--lavender-deep));
    color:white;
    border-radius:16px;
    padding:12px 20px;
    transition:.3s;
    box-shadow:0 10px 20px rgba(143,116,204,.2);
}

.btn-back:hover{
    transform:translateY(-3px);
    box-shadow:0 18px 30px rgba(143,116,204,.25);
}
</style>

<div class="max-w-3xl mx-auto py-12 px-5">

    <div class="detail-card p-10">

        <h1 class="text-3xl font-bold title mb-8">
            Detail Pendaftaran
        </h1>

        <div class="space-y-2">

            <div class="row">
                <span class="label">Nama Anak:</span>
                <div class="value">{{ $siswa->nama_anak }}</div>
            </div>

            <div class="row">
                <span class="label">Nama Orang Tua:</span>
                <div class="value">{{ $siswa->nama_orang_tua }}</div>
            </div>

            <div class="row">
                <span class="label">Email:</span>
                <div class="value">{{ $siswa->email }}</div>
            </div>

            <div class="row">
                <span class="label">No HP:</span>
                <div class="value">{{ $siswa->no_hp }}</div>
            </div>

            <div class="row">
                <span class="label">Alamat:</span>
                <div class="value">{{ $siswa->alamat }}</div>
            </div>

            <div class="row">
                <span class="label">Jenjang:</span>
                <div class="value">{{ $siswa->jenjang }}</div>
            </div>

            <div class="row">
                <span class="label">Mata Pelajaran:</span>
                <div class="value">{{ $siswa->mata_pelajaran }}</div>
            </div>

            <div class="row">
                <span class="label">Jenis Kelamin:</span>
                <div class="value">{{ $siswa->jenis_kelamin }}</div>
            </div>

            <div class="row border-none">
                <span class="label">Status:</span>
                <div class="value mt-1">

                    @if($siswa->status == 'pending')
                        <span class="badge badge-yellow">⏳ Pending</span>

                    @elseif($siswa->status == 'diterima')
                        <span class="badge badge-green">✅ Diterima</span>

                    @else
                        <span class="badge badge-red">❌ Ditolak</span>
                    @endif

                </div>
            </div>

        </div>

        <a href="/admin/dashboard"
           class="inline-block mt-10 btn-back">

            ← Kembali

        </a>

    </div>

</div>

@endsection