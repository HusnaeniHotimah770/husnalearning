<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'program'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Belajar - HusnaLearning</title>
    <style>
        /* Reset & Standar Dasar */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
            background: linear-gradient(180deg, #e0f2fe 0%, #f0fdf4 100%); 
            color: #1e293b; 
            line-height: 1.8;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }
        .program-section {
            padding: 120px 20px;
        }
        .program-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 100px; /* Jarak antar baris fasilitas */
        }
        
        /* Baris Fasilitas Individual */
        .program-row {
            display: flex;
            align-items: center;
            gap: 80px;
            background: white;
            padding: 50px;
            border-radius: 40px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.02);
            transition: all 0.4s ease;
        }
        .program-row:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 139, 118, 0.06);
        }
        
        /* Membalik posisi gambar dan teks pada baris genap untuk estetika mahal */
        .program-row:nth-child(even) {
            flex-direction: row-reverse;
        }

        .program-image {
            flex: 1;
            height: 400px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            background: #f1f5f9;
        }
        .program-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .program-row:hover .program-image img {
            transform: scale(1.06);
        }

        .program-text {
            flex: 1;
        }
        .program-text .badge {
            display: inline-block;
            background: rgba(0, 139, 118, 0.08);
            color: #008b76;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .program-text h3 {
            font-size: 34px;
            color: #0f172a;
            margin-bottom: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .program-text p {
            font-size: 17px;
            color: #475569;
            margin-bottom: 25px;
            text-align: justify;
            line-height: 1.7;
        }

        /* List Keunggulan di dalam Fasilitas */
        .program-features {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .program-features li {
            font-size: 15.5px;
            color: #334155;
            position: relative;
            padding-left: 28px;
            font-weight: 500;
        }
        .program-features li::before {
            content: "✦";
            color: #008b76;
            position: absolute;
            left: 0;
            font-weight: bold;
        }
        /* -----------------------------------------------------------------
            CSS HEADER & NAVIGASI (Sesuai Persis dengan Index & Profil)
        ----------------------------------------------------------------- */
        .navbar-container {
            width: 100%;
            padding: 20px;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .navbar {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 12px 30px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 10px 35px rgba(0, 168, 143, 0.08);
            backdrop-filter: blur(10px);
        }
        .logo-area { flex-shrink: 0; display: flex; align-items: center; }
        .logo-area img { height: 45px; width: auto; display: block; }
        
        .nav-menus { display: flex; align-items: center; list-style: none; margin: 0 20px; padding: 0; }
        .nav-menus > li { position: relative; white-space: nowrap; }
        .nav-menus a { color: #334155; text-decoration: none; font-size: 15px; font-weight: 600; padding: 10px 14px; display: flex; align-items: center; transition: color 0.3s; }
        .nav-menus a:hover, .nav-menus .active { color: #008b76; }
        .nav-menus .has-submenu::after { content: " ▾"; font-size: 12px; margin-left: 4px; }

        /* Dropdown Menu */
        .dropdown-menu { position: absolute; top: 100%; left: 50%; transform: translateX(-50%) translateY(10px); background: white; min-width: 220px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.12); list-style: none; padding: 8px 0; opacity: 0; visibility: hidden; transition: all 0.3s ease; }
        .dropdown-trigger:hover .dropdown-menu { opacity: 1; visibility: visible; transform: translateX(-50%) translateY(0px); }
        .dropdown-menu li a { padding: 12px 24px; font-size: 14px; font-weight: 500; color: #475569; display: block; text-align: left; }
        .dropdown-menu li a:hover { background-color: #f0fdf4; color: #008b76; }

        /* Tombol Navigasi bertema Gradasi */
        .btn-header-daftar { 
            background: linear-gradient(135deg, #008b76, #007bff); 
            color: white !important; 
            padding: 12px 26px !important; 
            border-radius: 30px; 
            font-weight: 700; 
            font-size: 14px; 
            box-shadow: 0 5px 20px rgba(0, 168, 143, 0.25); 
            text-decoration: none; 
            display: inline-block; 
            transition: all 0.3s ease; 
        }
        .btn-header-daftar:hover { transform: translateY(-2px); box-shadow: 0 7px 22px rgba(0, 168, 143, 0.35); }

        /* HERO BANNER */
        .hero-section { background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('program.png'); background-size: cover; background-position: center; color: white; padding: 260px 0 150px 0; text-align: center; }
        .hero-container { max-width: 1400px; margin: 0 auto; padding: 0 40px; }
        .hero-container h2 { font-size: 56px; font-weight: 800; margin-bottom: 24px; text-shadow: 0 4px 20px rgba(0,0,0,0.5); }
        .hero-container p { font-size: 21px; max-width: 750px; margin: 0 auto; opacity: 0.95; }

        /* PROGRAM SECTION */
        .program-section {
            padding: 120px 20px;
        }
        .program-container {
            max-width: 1300px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 100px; /* Jarak antar baris program */
        }
        
        /* Baris Program Individual */
        .program-row {
            display: flex;
            align-items: center;
            gap: 80px;
            background: white;
            padding: 50px;
            border-radius: 40px;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.02);
            transition: all 0.4s ease;
        }
        .program-row:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px rgba(0, 139, 118, 0.06);
        }
        
        /* Membalik posisi gambar dan teks pada baris genap untuk estetika mahal */
        .program-row:nth-child(even) {
            flex-direction: row-reverse;
        }

        .program-image {
            flex: 1;
            height: 400px;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            background: #f1f5f9;
        }
        .program-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .program-row:hover .program-image img {
            transform: scale(1.06);
        }

        .program-text {
            flex: 1;
        }
        .program-text .badge {
            display: inline-block;
            background: rgba(0, 139, 118, 0.08);
            color: #008b76;
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .program-text h3 {
            font-size: 34px;
            color: #0f172a;
            margin-bottom: 22px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }
        .program-text p {
            font-size: 17px;
            color: #475569;
            margin-bottom: 25px;
            text-align: justify;
            line-height: 1.7;
        }

        /* List Keunggulan di dalam Fasilitas */
        .program-features {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }
        .program-features li {
            font-size: 15.5px;
            color: #334155;
            position: relative;
            padding-left: 28px;
            font-weight: 500;
        }
        .program-features li::before {
            content: "✦";
            color: #008b76;
            position: absolute;
            left: 0;
            font-weight: bold;
        }

        /* -----------------------------------------------------------------
           SECTION: CALL TO ACTION (CTA SEMATAN)
        ----------------------------------------------------------------- */
        /* -----------------------------------------------------------------
   SECTION: CALL TO ACTION (CTA PREMIUM)
----------------------------------------------------------------- */
        .cta-premium {
            background: linear-gradient(135deg, #0f172a 0%, #0056b3 100%);
            color: white;
            border-radius: 35px;
            padding: 80px 50px;
            text-align: center;
            margin: 80px auto; /* Memberikan jarak lebih lega */
            max-width: 1300px;
            box-shadow: 0 20px 45px rgba(0,0,0,0.1);
        }
        .cta-premium h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
            color: #ffffff; /* Memastikan judul terbaca jelas */
        }
        .cta-premium p {
            font-size: 18px;
            opacity: 0.9;
            max-width: 650px;
            margin: 0 auto 40px auto;
        }
        .btn-cta-program   {
            background: #ffffff;
            color: #0f172a;
            text-decoration: none;
            padding: 16px 45px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-cta-program:hover {
            transform: scale(1.03);
            background: #f8fafc;
            box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        }

        /* Responsif Media Queries */
        @media (max-width: 992px) {
            .hero-container h2 { font-size: 40px; }
            .hero-container p { font-size: 18px; }
            .program-row, .program-row:nth-child(even) { flex-direction: column; padding: 35px; gap: 40px; }
            .program-image { width: 100%; height: 300px; }
            .program-text h3 { font-size: 28px; }
            .cta-premium h2 { font-size: 30px; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero-section">
    <div class="hero-container">
        <h2>Program Belajar Eksklusif</h2>
        <p>Infrastruktur modern dan ruang belajar berstandar tinggi yang dirancang khusus untuk mendukung fokus, kenyamanan, serta efektivitas belajar optimal siswa.</p>
    </div>
</div>

<div class="program-section">
    <div class="program-container">
        
        <!-- Program 1 -->
        <div class="program-row">
            <div class="program-image">
                <img src="sd.png" alt="BELAJAR CERIA & BERPRESTASI">
            </div>
            <div class="program-text">
                <span class="badge">BELAJAR CERIA & BERPRESTASI</span>
                <h3>SD (Kelas 4-6)</h3>
               <p>Program SD HusnaLearning dirancang khusus untuk membantu siswa kelas 4–6 memahami konsep dasar setiap mata pelajaran dengan metode belajar yang menyenangkan, interaktif, dan mudah dipahami. Pembelajaran dilakukan secara bertahap sehingga mampu meningkatkan kepercayaan diri, kemampuan berpikir logis, serta membangun kebiasaan belajar yang baik sejak dini.</p>
               <ul class="program-features">
                <li>Matematika Konsep Dasar</li>
                    <li>Bahasa Indonesia</li>
                    <li>IPA & IPS</li>
                    <li>Bahasa Inggris Dasar</li>
                    <li>Persiapan Ujian Sekolah</li>
                    <li>Latihan Soal Terstruktur</li>
                    <li>Evaluasi Berkala</li>
                    <li>Maksimal 10 Siswa / Kelas</li>
                </ul>
            </div>
        </div>

        <!-- Program 2 -->
        <div class="program-row">
            <div class="program-image">
                <img src="smp.png" alt="SIAP NAIK PRESTASI">
            </div>
            <div class="program-text">
                <span class="badge">SIAP NAIK PRESTASI</span>
                <h3>SMP (Kelas 7-9)</h3>
                <p>Program SMP difokuskan untuk memperkuat pemahaman konsep akademik sekaligus mempersiapkan siswa menghadapi Penilaian Tengah Semester, Penilaian Akhir Semester, hingga Asesmen Nasional. Materi disampaikan menggunakan pendekatan konseptual dan latihan soal bertingkat agar siswa mampu berpikir kritis serta menyelesaikan soal secara mandiri.</p>

                <ul class="program-features">
                    <li>Matematika SMP</li>
                    <li>IPA Terpadu</li>
                    <li>Bahasa Indonesia</li>
                    <li>Bahasa Inggris</li>
                    <li>Persiapan ANBK</li>
                    <li>Bank Soal Lengkap</li>
                    <li>Try Out Berkala</li>
                    <li>Maksimal 10 Siswa / Kelas</li>
                </ul>
            </div>
        </div>

        <!-- Program 3 -->
        <div class="program-row">
            <div class="program-image">
                <img src="sma.png" alt="PERSIAPAN AKADEMIK UNGGUL & MENUJU PTN IMPIAN">
            </div>
            <div class="program-text">
                <span class="badge">PERSIAPAN AKADEMIK UNGGUL & MENUJU PTN IMPIAN</span>
                <h3>SMA & UTBK</h3>
                <p>Program SMA membantu siswa memahami materi sesuai Kurikulum Merdeka secara lebih mendalam. Pembelajaran difokuskan pada penguasaan konsep, penyelesaian soal HOTS, serta persiapan menghadapi ujian sekolah maupun seleksi masuk perguruan tinggi.</p>

                <ul class="program-features">
                    <li>Matematika Wajib & Peminatan</li>
                    <li>Fisika</li>
                    <li>Kimia</li>
                    <li>Biologi</li>
                    <li>Bahasa Inggris</li>
                    <li>Pendalaman Materi</li>
                    <li>Latihan Soal HOTS</li>
                    <li>Try Out Berkala</li>
                    <li>Konsultasi Jurusan</li>
                    <li>Bank Soal UTBK Terbaru</li>
                </ul>
            </div>
        </div>

    </div>
</div>
<div class="cta-premium">

    <h2>Sudah Menemukan Program yang Tepat?</h2>
    <p>Mari diskusikan kebutuhan belajar Anda dengan tim ahli kami dan mulailah perjalanan prestasi Anda hari ini.</p>
    <a href="pendaftaran.php" class="btn-cta-program">Daftar Sekarang</a>
</div>

<?php include 'footer.php'; ?>

</body>
</html>