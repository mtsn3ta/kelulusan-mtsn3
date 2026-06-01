@php
use Illuminate\Support\Facades\Storage;
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f5f7fa;
            color:#1f2937;
        }

        .hero{
            min-height:100vh;
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;
            color:white;
        }

        .hero::before{
            content:'';
            position:absolute;
            inset:0;
            background-image:url('{{ Storage::url($setting->background_image) }}');
        }

        .hero::after{
            content:'';
            position:absolute;
            inset:0;
            background:rgba(0,0,0,.65);
        }

        .hero-content{
            position:relative;
            z-index:2;
            max-width:900px;
            padding:20px;
        }

        .logo{
            width:120px;
            height:120px;
            margin:auto;
            margin-bottom:20px;
            border-radius:50%;
            background:white;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .logo img{
            width:90px;
        }

        h1{
            font-size:52px;
            margin-bottom:15px;
        }

        h2{
            font-size:34px;
            margin-bottom:10px;
        }

        .tahun{
            font-size:22px;
            margin-bottom:40px;
        }

        .card{
            background:white;
            color:#111827;
            padding:30px;
            border-radius:20px;
            max-width:500px;
            margin:auto;
            box-shadow:0 15px 40px rgba(0,0,0,.2);
        }

        input{
            width:100%;
            padding:15px;
            border:1px solid #ddd;
            border-radius:10px;
            margin-top:15px;
        }

        button{
            width:100%;
            padding:15px;
            margin-top:15px;
            background:#16a34a;
            color:white;
            border:none;
            border-radius:10px;
            cursor:pointer;
            font-size:16px;
        }

        .countdown{
            display:flex;
            justify-content:center;
            gap:15px;
            flex-wrap:wrap;
        }

        .box{
            background:white;
            color:black;
            width:120px;
            padding:20px;
            border-radius:15px;
        }

        .box h3{
            font-size:36px;
        }

        .section{
            max-width:1000px;
            margin:auto;
            padding:70px 20px;
        }

        .message{
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .result-success{
    background:linear-gradient(
        135deg,
        #ecfdf5,
        #dcfce7
    );

    border:3px solid #22c55e;

    margin-top:20px;

    padding:35px;

    border-radius:20px;

    text-align:center;

    box-shadow:
        0 15px 40px rgba(34,197,94,.25);
}

        .result-danger{
            background:#fee2e2;
            border:2px solid #ef4444;
            margin-top:20px;
            padding:20px;
            border-radius:15px;
        }

        footer{
            text-align:center;
            padding:30px;
            color:#666;
        }
    </style>
</head>

<body>
<div class="hero">

    <div class="hero-content">

        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>

        <h1>PENGUMUMAN KELULUSAN</h1>

        <h2>{{ $setting->school_name }}</h2>

        <div class="tahun">
            Tahun Pelajaran {{ $setting->academic_year }}
        </div>

        @if(now() < $setting->announcement_date)

            <div class="countdown">

                <div class="box">
                    <h3 id="days">00</h3>
                    Hari
                </div>

                <div class="box">
                    <h3 id="hours">00</h3>
                    Jam
                </div>

                <div class="box">
                    <h3 id="minutes">00</h3>
                    Menit
                </div>

                <div class="box">
                    <h3 id="seconds">00</h3>
                    Detik
                </div>

            </div>

        @else

            <div class="card">

                <form action="/check" method="POST">
                    @csrf

                    <h3>Masukkan NISN</h3>

                    <input
                        type="text"
                        name="nisn"
                        placeholder="Masukkan NISN">

                    <button type="submit">
                        CEK KELULUSAN
                    </button>
                </form>

                @if($student)

                    @if($student->status == 'LULUS')

                        <div class="result-success">

    <div style="font-size:70px;">
        🎓
    </div>

    <h2 style="
        color:#15803d;
        font-size:40px;
        margin-bottom:10px;">
        SELAMAT
    </h2>

    <p style="
        font-size:20px;
        margin-bottom:20px;">
        Anda Dinyatakan
    </p>

    <div style="
        background:#16a34a;
        color:white;
        padding:15px;
        border-radius:12px;
        margin-bottom:25px;
        font-size:30px;
        font-weight:bold;">
        L U L U S
    </div>

    <hr style="margin:20px 0;">

    <table style="
        width:100%;
        text-align:left;
        font-size:18px;">
        <tr>
            <td><b>Nama</b></td>
            <td>{{ $student->name }}</td>
        </tr>

        <tr>
            <td><b>NISN</b></td>
            <td>{{ $student->nisn }}</td>
        </tr>

        <tr>
            <td><b>Kelas</b></td>
            <td>{{ $student->class }}</td>
        </tr>
    </table>

    <div style="
        margin-top:25px;
        color:#15803d;
        font-weight:bold;">
        MTsN 3 Tulungagung
        <br>
        Tahun Pelajaran {{ $setting->academic_year }}
    </div>

</div>

                    @else

                        <div class="result-danger">
                            <h2>HASIL KELULUSAN</h2>

                            <p>{{ $student->name }}</p>

                            <p>
                                Silakan menghubungi pihak madrasah
                                untuk informasi lebih lanjut.
                            </p>
                        </div>

                    @endif

                @endif

            </div>

        @endif

    </div>

</div>

<div class="section">

    <div class="message">

        <h2>Sambutan Kepala Madrasah</h2>

        <br>

        {!! nl2br(e($setting->principal_message)) !!}

    </div>

</div>

<footer>
    © {{ date('Y') }} {{ $setting->school_name }}
</footer>

@if(now() < $setting->announcement_date)

<script>
const targetDate = new Date(
    "{{ \Carbon\Carbon::parse($setting->announcement_date)->format('Y-m-d H:i:s') }}"
).getTime();

setInterval(function () {

    const now = new Date().getTime();

    const distance = targetDate - now;

    document.getElementById('days').innerHTML =
        Math.floor(distance / (1000 * 60 * 60 * 24));

    document.getElementById('hours').innerHTML =
        Math.floor((distance % (1000 * 60 * 60 * 24)) /
        (1000 * 60 * 60));

    document.getElementById('minutes').innerHTML =
        Math.floor((distance % (1000 * 60 * 60)) /
        (1000 * 60));

    document.getElementById('seconds').innerHTML =
        Math.floor((distance % (1000 * 60)) /
        1000);

}, 1000);
</script>

@endif
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

@if($student && $student->status == 'LULUS')

<script>

confetti({
    particleCount:150,
    spread:90,
    origin:{ y:0.6 }
});

</script>

@endif
</body>
</html>