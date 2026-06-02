@php
    use Illuminate\Support\Facades\Storage;
@endphp
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Pengumuman Kelulusan
        {{ $setting->school_name ?? 'MTsN 3 Tulungagung' }}
    </title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8fafc;
            color: #1f2937;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        .hero {
            min-height: 100vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .hero::before {
            content: '';
            position: absolute;
            inset: 0;

            background-image: url('{{ $setting && $setting->background_image ? Storage::url($setting->background_image) : asset('images/default-bg.jpg') }}');

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .hero::after {
            content: '';
            position: absolute;
            inset: 0;

            background:
                linear-gradient(rgba(0, 0, 0, .45),
                    rgba(0, 0, 0, .75));
        }

        .hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 1200px;
            padding: 30px;
        }

        .badge {
            display: inline-block;

            background:
                rgba(255, 255, 255, .15);

            backdrop-filter: blur(12px);

            border: 1px solid rgba(255, 255, 255, .25);

            padding: 12px 25px;

            border-radius: 999px;

            margin-bottom: 25px;

            font-weight: 600;
        }

        .logo {
            margin-bottom: 25px;
        }

        .logo img {
            width: 130px;
            filter:
                drop-shadow(0 10px 30px rgba(0, 0, 0, .3));
        }

        h1 {
            font-size: 70px;
            font-weight: 800;
            line-height: 1.1;
            text-shadow:
                0 10px 30px rgba(0, 0, 0, .4);
        }

        .school-name {
            font-size: 30px;
            font-weight: 600;
            margin-top: 15px;
        }

        .tahun {
            margin-top: 10px;
            font-size: 20px;
            opacity: .9;
            margin-bottom: 40px;
        }

        .card {
            background:
                rgba(255, 255, 255, .95);

            backdrop-filter: blur(15px);

            color: #111827;

            max-width: 700px;

            margin: auto;

            padding: 35px;

            border-radius: 25px;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, .25);
        }

        .card h3 {
            margin-bottom: 15px;
        }

        input {
            width: 100%;
            padding: 16px 18px;

            border: 1px solid #d1d5db;

            border-radius: 14px;

            font-size: 16px;

            outline: none;
        }

        input:focus {
            border-color: #16a34a;
        }

        button {
            width: 100%;
            margin-top: 15px;

            padding: 16px;

            border: none;

            border-radius: 14px;

            background: #16a34a;

            color: white;

            font-size: 16px;

            font-weight: 600;

            cursor: pointer;

            transition: .3s;
        }

        button:hover {
            background: #15803d;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .box {
            width: 130px;

            background:
                rgba(255, 255, 255, .95);

            color: #111827;

            border-radius: 22px;

            padding: 25px;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .25);
        }

        .box h3 {
            font-size: 40px;
            margin-bottom: 5px;
        }

        .section {
            max-width: 1200px;
            margin: auto;
            padding: 90px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 40px;
            color: #0f172a;
        }

        .logo img {
            width: 140px;
        }

        .school-name {
            font-size: 32px;
            font-weight: 700;
        }

        .tahun {
            font-size: 22px;
        }

        .box span {
            font-size: 14px;
            color: #6b7280;
        }

        @media(max-width:768px) {

            h1 {
                font-size: 42px;
            }

            .school-name {
                font-size: 24px;
            }

            .tahun {
                font-size: 18px;
            }

            .box {
                width: 100px;
                padding: 18px;
            }

            .box h3 {
                font-size: 28px;
            }
        }

        .result-success {

            margin-top: 25px;

            background:
                linear-gradient(135deg,
                    #ecfdf5,
                    #dcfce7);

            border: 3px solid #22c55e;

            padding: 35px;

            border-radius: 25px;

            text-align: center;

            box-shadow:
                0 20px 50px rgba(34, 197, 94, .25);
        }

        .graduate-icon {
            font-size: 80px;
        }

        .graduate-title {
            font-size: 42px;
            font-weight: 800;
            color: #15803d;
            margin-top: 10px;
        }

        .graduate-subtitle {
            font-size: 18px;
            margin-top: 10px;
            color: #374151;
        }

        .graduate-status {

            margin-top: 20px;

            background: #16a34a;

            color: white;

            font-size: 32px;

            font-weight: 700;

            padding: 16px;

            border-radius: 14px;

            letter-spacing: 4px;
        }

        .student-table {

            width: 100%;

            margin-top: 30px;

            border-collapse: collapse;
        }

        .student-table td {

            padding: 12px;

            border-bottom:
                1px solid #d1fae5;
        }

        .student-table td:first-child {
            font-weight: 700;
            width: 35%;
        }

        .graduate-footer {

            margin-top: 25px;

            font-weight: 700;

            color: #15803d;
        }

        .graduate-note {

            margin-top: 20px;

            color: #6b7280;

            font-size: 14px;
        }

        .result-danger {

            margin-top: 25px;

            background: #fef2f2;

            border: 3px solid #ef4444;

            padding: 35px;

            border-radius: 25px;

            text-align: center;
        }

        .btn-secondary {

            display: inline-block;

            margin-top: 25px;

            background: #0f172a;

            color: white;

            padding: 12px 22px;

            border-radius: 12px;
        }

        .btn-secondary-red {

            display: inline-block;

            margin-top: 25px;

            background: #991b1b;

            color: white;

            padding: 12px 22px;

            border-radius: 12px;
        }

        .message {

            background: white;

            border-radius: 30px;

            padding: 50px;

            box-shadow:
                0 20px 50px rgba(0, 0, 0, .08);

            border-top: 6px solid #16a34a;
        }

        .quote-icon {

            text-align: center;

            font-size: 70px;

            color: #16a34a;

            margin-bottom: 20px;
        }

        .message-content {

            font-size: 18px;

            line-height: 2;

            text-align: justify;

            color: #374151;
        }

        .message-footer {

            margin-top: 35px;

            padding-top: 20px;

            border-top: 1px solid #e5e7eb;

            text-align: center;
        }

        .message-footer strong {

            display: block;

            color: #15803d;

            font-size: 18px;
        }

        .message-footer span {

            color: #64748b;

            font-size: 14px;
        }

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(auto-fit, minmax(250px, 1fr));

            gap: 25px;
        }

        .info-card {

            background: white;

            padding: 35px;

            border-radius: 25px;

            text-align: center;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, .08);

            transition: .3s;
        }

        .info-card:hover {

            transform:
                translateY(-8px);
        }

        .info-icon {

            font-size: 45px;

            margin-bottom: 15px;
        }

        .info-card h3 {

            color: #15803d;

            margin-bottom: 15px;
        }

        .info-card p {

            line-height: 1.8;

            color: #475569;
        }

        .info-card a {

            color: #16a34a;

            font-weight: 600;
        }

        footer {

            background: #0f172a;

            color: white;

            text-align: center;

            padding: 70px 20px;

            margin-top: 80px;
        }

        .footer-logo img {

            width: 80px;

            margin-bottom: 20px;
        }

        .footer-line {

            width: 120px;

            height: 3px;

            background: #16a34a;

            margin: 25px auto;
        }
    </style>
</head>

<body>

    <div class="hero">

        <div class="hero-content">

            <div class="badge">
                🎓 PENGUMUMAN RESMI KELULUSAN
            </div>

            <div class="logo">

                <img src="{{ asset('images/logo.png') }}" alt="Logo MTsN 3">

            </div>

            <h1>
                PENGUMUMAN<br>
                KELULUSAN
            </h1>

            <div class="school-name">
                {{ $setting->school_name }}
            </div>

            <div class="tahun">
                Tahun Pelajaran
                {{ $setting->academic_year }}
            </div>

            @if (now() < $setting->announcement_date)

                <div class="countdown">

                    <div class="box">
                        <h3 id="days">00</h3>
                        <span>Hari</span>
                    </div>

                    <div class="box">
                        <h3 id="hours">00</h3>
                        <span>Jam</span>
                    </div>

                    <div class="box">
                        <h3 id="minutes">00</h3>
                        <span>Menit</span>
                    </div>

                    <div class="box">
                        <h3 id="seconds">00</h3>
                        <span>Detik</span>
                    </div>

                </div>

                <div
                    style="
                margin-top:40px;
                font-size:18px;
                opacity:.95;
            ">
                    Pengumuman akan dibuka pada
                    <br>
                    <strong>
                        {{ \Carbon\Carbon::parse($setting->announcement_date)->translatedFormat('d F Y H:i') }} WIB
                    </strong>
                </div>
            @else
                <div class="card">

                    <div
                        style="
                    text-align:center;
                    margin-bottom:25px;
                ">

                        <div
                            style="
                        font-size:50px;
                        margin-bottom:10px;
                    ">
                            🔍
                        </div>

                        <h3
                            style="
                        font-size:28px;
                        color:#15803d;
                    ">
                            Cek Kelulusan
                        </h3>

                        <p
                            style="
                        color:#6b7280;
                        margin-top:8px;
                    ">
                            Masukkan NISN untuk melihat hasil kelulusan
                        </p>

                    </div>

                    <form action="/check" method="POST">

                        @csrf

                        <input type="text" name="nisn" placeholder="Masukkan NISN">

                        <button type="submit">
                            CEK KELULUSAN
                        </button>

                    </form>

                    @if (session('error'))
                        <div
                            style="
                        margin-top:20px;
                        background:#fee2e2;
                        color:#991b1b;
                        padding:15px;
                        border-radius:12px;
                    ">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($student)

                        @if ($student->status == 'LULUS')
                            <div class="result-success">

                                <div class="graduate-icon">
                                    🎓
                                </div>

                                <div class="graduate-title">
                                    SELAMAT
                                </div>

                                <div class="graduate-subtitle">
                                    Anda Dinyatakan
                                </div>

                                <div class="graduate-status">
                                    L U L U S
                                </div>

                                <table class="student-table">

                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $student->name }}</td>
                                    </tr>

                                    <tr>
                                        <td>NISN</td>
                                        <td>{{ $student->nisn }}</td>
                                    </tr>

                                    <tr>
                                        <td>Kelas</td>
                                        <td>{{ $student->class }}</td>
                                    </tr>

                                </table>

                                <div class="graduate-footer">

                                    {{ $setting->school_name }}

                                    <br>

                                    Tahun Pelajaran
                                    {{ $setting->academic_year }}

                                </div>

                                <div class="graduate-note">

                                    Hasil ini merupakan pengumuman resmi
                                    kelulusan peserta didik secara online.

                                </div>

                                <a href="/" class="btn-secondary">
                                    Cek NISN Lain
                                </a>

                            </div>
                        @else
                            <div class="result-danger">

                                <div
                                    style="
                font-size:60px;
                margin-bottom:15px;
            ">
                                    📄
                                </div>

                                <h2
                                    style="
                color:#b91c1c;
                margin-bottom:15px;
            ">
                                    HASIL KELULUSAN
                                </h2>

                                <h3 style="
                margin-bottom:10px;
            ">
                                    {{ $student->name }}
                                </h3>

                                <p
                                    style="
                color:#7f1d1d;
                line-height:1.8;
            ">
                                    Silakan menghubungi pihak madrasah
                                    untuk memperoleh informasi lebih lanjut.
                                </p>

                                <a href="/" class="btn-secondary-red">
                                    Cek NISN Lain
                                </a>

                            </div>
                        @endif

                    @endif

                </div>

            @endif

        </div>

    </div>

    <div class="section">

        <div class="section-title">

            <h2>
                Sambutan Kepala Madrasah
            </h2>

            <p style="
            color:#64748b;
            margin-top:10px;
        ">
                Pesan dan harapan untuk seluruh peserta didik
            </p>

        </div>

        <div class="message">

            <div class="quote-icon">
                ❝
            </div>

            <div class="message-content">

                {!! nl2br(e($setting->principal_message)) !!}

            </div>

            <div class="message-footer">

                <strong>
                    {{ $setting->school_name }}
                </strong>

                <span>
                    Tahun Pelajaran
                    {{ $setting->academic_year }}
                </span>

            </div>

        </div>

    </div>

    <div class="section">

        <div class="section-title">

            <h2>
                Informasi Madrasah
            </h2>

        </div>

        <div class="info-grid">

            <div class="info-card">

                <div class="info-icon">
                    🏫
                </div>

                <h3>Alamat</h3>

                <p>
                    Jl. Nasional III No.172,
                    Kedungmanten,
                    Ariyojeding,
                    Kec. Rejotangan,
                    Kabupaten Tulungagung,
                    Jawa Timur 66293
                </p>

            </div>

            <div class="info-card">

                <div class="info-icon">
                    🌐
                </div>

                <h3>Website</h3>

                <p>

                    <a href="https://sigma3.mtsn3tulungagung.sch.id" target="_blank">

                        sigma3.mtsn3tulungagung.sch.id

                    </a>

                </p>

            </div>

            <div class="info-card">

                <div class="info-icon">
                    ✉️
                </div>

                <h3>Email</h3>

                <p>
                    mtsn3tulungagung@gmail.com
                </p>

            </div>

        </div>

    </div>

    <footer>

        <div class="footer-logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo">

        </div>

        <h3>
            {{ $setting->school_name }}
        </h3>

        <p>
            Sistem Informasi Pengumuman Kelulusan Online
        </p>

        <div class="footer-line"></div>

        <small>

            © {{ date('Y') }}
            {{ $setting->school_name }}

            <br>

            All Rights Reserved

        </small>

    </footer>

    @if (now() < $setting->announcement_date)
        <script>
            const targetDate = new Date(
                "{{ \Carbon\Carbon::parse($setting->announcement_date)->format('Y-m-d H:i:s') }}"
            ).getTime();

            setInterval(function() {

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

    @if ($student && $student->status == 'LULUS')
        <script>
            confetti({
                particleCount: 150,
                spread: 90,
                origin: {
                    y: 0.6
                }
            });
        </script>
    @endif
</body>

</html>
