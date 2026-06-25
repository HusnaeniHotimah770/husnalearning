<?php 
// Menentukan halaman aktif untuk navigasi menu
$page = 'profil'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengajar - HusnaLearning</title>
    <style>
        /* Reset & Standar Dasar */
        * { 
            box-sizing: border-box; 
            margin: 0; 
            padding: 0; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        body { 
            /* Latar belakang gradasi mengalir mewah, konsisten dengan index dan fasilitas */
            background: linear-gradient(180deg, #f0fdf4 0%, #e0f2fe 100%); 
            color: #1e293b; 
            line-height: 1.8;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* -----------------------------------------------------------------
           CSS HEADER & NAVIGASI (Sesuai Persis dengan Index & Fasilitas)
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

        /* -----------------------------------------------------------------
           HERO BANNER PROFIL
        ----------------------------------------------------------------- */
        .hero-section {
            background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('guru.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding: 260px 0 150px 0;
            text-align: center;
        }
        .hero-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            width: 100%;
        }
        .hero-container h2 {
            font-size: 56px;
            font-weight: 800;
            margin-bottom: 24px;
            letter-spacing: -0.5px;
            text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        }
        .hero-container p {
            font-size: 21px;
            opacity: 0.95;
            max-width: 750px;
            margin: 0 auto;
            font-weight: 400;
            line-height: 1.6;
            text-shadow: 0 2px 12px rgba(0,0,0,0.4);
        }

        /* -----------------------------------------------------------------
           SECTION: TIM PENGAJAR (GRID 8 GURU PREMIUM)
        ----------------------------------------------------------------- */
        .teachers-section {
            padding: 120px 20px;
        }
        .teachers-intro {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 80px auto;
        }
        .teachers-intro h3 {
            font-size: 15px;
            color: #008b76; 
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
            font-weight: 800;
        }
        .teachers-intro h2 {
            font-size: 42px;
            color: #0f172a;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* Grid Layout */
        .teachers-grid {
            max-width: 1300px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 40px;
        }

        /* Kartu Guru Mewah */
        .teacher-card {
            background: white;
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            border: 1px solid #f1f5f9;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            text-align: center;
            display: flex;
            flex-direction: column;
        }
        .teacher-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 45px rgba(0, 139, 118, 0.1);
            border-color: rgba(0, 139, 118, 0.08);
        }

        /* Bingkai Foto Guru */
        .teacher-img-box {
            width: 100%;
            height: 320px;
            background: #f8fafc;
            overflow: hidden;
            position: relative;
        }
        .teacher-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .teacher-card:hover .teacher-img-box img {
            transform: scale(1.05);
        }

        /* Informasi Teks Guru */
        .teacher-info {
            padding: 30px 25px;
            flex-grow: 1;
        }
        .teacher-info h4 {
            font-size: 21px;
            color: #0f172a;
            font-weight: 700;
            margin-bottom: 6px;
            letter-spacing: -0.3px;
        }
        .teacher-info .subject-badge {
            display: inline-block;
            background: rgba(0, 139, 118, 0.08);
            color: #008b76;
            padding: 4px 14px;
            border-radius: 15px;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 16px;
        }
        .teacher-info .education {
            font-size: 14.5px;
            color: #0284c7;
            font-weight: 600;
            margin-bottom: 12px;
        }
        .teacher-info p {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
        }

        /* -----------------------------------------------------------------
           SECTION: CALL TO ACTION (CTA)
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
.btn-cta-fasilitas {
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
.btn-cta-fasilitas:hover {
    transform: scale(1.03);
    background: #f8fafc;
    box-shadow: 0 12px 30px rgba(0,0,0,0.25);
}
        .btn-cta-profil {
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
        .btn-cta-profil:hover {
            transform: scale(1.03);
            background: #f8fafc;
            box-shadow: 0 12px 30px rgba(0,0,0,0.25);
        }

        /* Responsif Media Queries */
        @media (max-width: 992px) {
            .hero-container h2 { font-size: 40px; }
            .hero-container p { font-size: 18px; }
            .teachers-intro h2 { font-size: 32px; }
            .teachers-grid { grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
            .cta-premium h2 { font-size: 30px; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="hero-section">
    <div class="hero-container">
        <h2>Profil Pengajar</h2>
        <p>Mengenal lebih dekat para pendidik profesional pilihan yang berdedikasi tinggi dalam membimbing dan mengantarkan siswa meraih prestasi akademis impian.</p>
    </div>
</div>

<div class="teachers-section">
    <div class="teachers-intro">
        <h3>Expert Educators</h3>
        <h2>Guru & Tentor Terbaik Kami</h2>
    </div>

    <div class="teachers-grid">
        
        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="ibrahim.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Ibrahim, M.Pd.</h4>
                <span class="subject-badge">Matematika (SD/SMP)</span>
                <p class="education">Alumni Universitas Negeri Jakarta</p>
                <p>Ahli dalam menyederhanakan rumus logika matematika yang rumit menjadi konsep visual yang sangat mudah dipahami siswa.</p>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="rahmat.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Rahmat, M.Si.</h4>
                <span class="subject-badge">Fisika & Kimia (SMA)</span>
                <p class="education">Magister Institut Teknologi Bandung</p>
                <p>Berpengalaman luas dalam melatih pengerjaan soal HOTS dan trik cepat menjawab ujian UTBK SNBT Saintek.</p>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="airen.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Airen, S.S.</h4>
                <span class="subject-badge">Bahasa Inggris (Semua Jenjang)</span>
                <p class="education">Alumni Universitas Gadjah Mada</p>
                <p>Menggunakan pendekatan interaktif *English Fun Learning* untuk mendongkrak rasa percaya diri dan nilai ujian siswa.</p>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="eni.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Dr. Eni</h4>
                <span class="subject-badge">Biologi (SMP/SMA)</span>
                <p class="education">Doktor Universitas Indonesia</p>
                <p>Mengajarkan konsep kedokteran dan biologi murni secara runtut menggunakan visualisasi mind-mapping kreatif.</p>
            </div>
        </div>

        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="dini.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Dini, S.Pd.</h4>
                <span class="subject-badge">IPS & Sejarah (SMP/SMA)</span>
                <p class="education">Alumni Universitas Pendidikan Indonesia</p>
                <p>Menghidupkan materi sejarah dan sosial lewat metode mendongeng (storytelling) yang seru tanpa hafalan kaku.</p>
            </div>
        </div>
         <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="lilis.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Lilis, S.Pd.</h4>
                <span class="subject-badge">Tematik & Calistung (SD)</span>
                <p class="education">Alumni Universitas Sriwijaya</p>
                <p>Sangat sabar dan penuh perhatian dalam membangun fondasi dasar membaca, menulis, dan berhitung anak.</p>
            </div>
        </div>
        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="roby.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Roby, M.Pd.</h4>
                <span class="subject-badge">UTBK Skolastik & PU</span>
                <p class="education">Alumni Universitas Negeri Malang</p>
                <p>Spesialis penalaran umum, kuantitatif, dan tes potensi skolastik yang krusial untuk menembus PTN impian.</p>
            </div>
        </div>


        <div class="teacher-card">
            <div class="teacher-img-box">
                <img src="sahrul.png" alt="Pengajar HusnaLearning">
            </div>
            <div class="teacher-info">
                <h4>Sahrul, S.Kom.</h4>
                <span class="subject-badge">Informatika & Logika</span>
                <p class="education">Alumni Universitas Diponegoro</p>
                <p>Membantu mengembangkan kemampuan berpikir komputasional dan analisis masalah bagi siswa sejak usia dini.</p>
            </div>
        </div>

    </div>

    <div class="cta-premium">
        <h2>Belajar Langsung dari Mentor Terbaik</h2>
        <p>Dapatkan bimbingan eksklusif secara personal dan rasakan peningkatan prestasi akademis yang nyata bersama kami.</p>
        <a href="pendaftaran.php" class="btn-cta-profil">Daftar Belajar Sekarang</a>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>