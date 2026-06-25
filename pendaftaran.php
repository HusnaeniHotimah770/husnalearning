<?php 
// Variabel page kosong agar tidak ada menu yang aktif (atau bisa diisi jika ingin menu tertentu aktif)
$page = ''; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa - HusnaLearning</title>
    <!-- Pastikan link ke style.css utama Anda sudah terpasang -->
    <link rel="stylesheet" href="style.css"> 
    <style>
        .form-section { padding: 150px 20px 80px 20px; max-width: 800px; margin: 0 auto; }
        .form-card { background: white; padding: 40px; border-radius: 40px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05); }
        .input-group { margin-bottom: 20px; }
        label { font-weight: 700; display: block; margin-bottom: 8px; color: #0f172a; }
        input, select, textarea { width: 100%; padding: 15px; border: 1px solid #cbd5e1; border-radius: 12px; font-size: 16px; }
        .btn-container { display: flex; gap: 15px; margin-top: 30px; }
        .btn-action { flex: 1; padding: 16px; border-radius: 50px; border: none; cursor: pointer; color: white; font-weight: 700; transition: 0.3s; }
        .btn-wa { background: #25d366; }
        .btn-cetak { background: #008b76; }
        .btn-action:hover { opacity: 0.9; transform: translateY(-2px); }
    </style>
</head>
<body>
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
        .hero-section { background: linear-gradient(rgba(15, 23, 42, 0.7), rgba(15, 23, 42, 0.7)), url('foto/halaman depan.png'); background-size: cover; background-position: center; color: white; padding: 260px 0 150px 0; text-align: center; }
        .hero-container { max-width: 1400px; margin: 0 auto; padding: 0 40px; }
        .hero-container h2 { font-size: 56px; font-weight: 800; margin-bottom: 24px; text-shadow: 0 4px 20px rgba(0,0,0,0.5); }
        .hero-container p { font-size: 21px; max-width: 750px; margin: 0 auto; opacity: 0.95; }

        /* SECTION BIAYA */
        .prestasi-section { padding: 120px 20px; }
        .prestasi-container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 1fr)); gap: 40px; }
        
        .prestasi-card { background: white; padding: 40px; border-radius: 40px; box-shadow: 0 20px 50px rgba(15, 23, 42, 0.05); transition: all 0.4s ease; }
        .prestasi-card:hover { transform: translateY(-10px); box-shadow: 0 30px 60px rgba(0, 139, 118, 0.1); }
        .student-info { display: flex; align-items: center; margin-bottom: 20px; }
        .student-avatar { width: 60px; height: 60px; background: #f1f5f9; border-radius: 50%; margin-right: 15px; }
        .student-name h4 { font-size: 20px; color: #0f172a; }
        .student-name span { color: #008b76; font-size: 14px; font-weight: 700; text-transform: uppercase; }
        .prestasi-text { font-size: 17px; color: #475569; font-style: italic; line-height: 1.7; }

        /* CTA */
        .cta-premium { background: linear-gradient(135deg, #0f172a 0%, #0056b3 100%); color: white; border-radius: 35px; padding: 80px 50px; text-align: center; margin: 40px auto; max-width: 1300px; box-shadow: 0 20px 45px rgba(0,0,0,0.1); }
        .btn-cta-fasilitas { background: #ffffff; color: #0f172a; text-decoration: none; padding: 16px 45px; border-radius: 50px; font-weight: 700; font-size: 16px; display: inline-block; transition: all 0.3s ease; }
        .btn-cta-fasilitas:hover { transform: scale(1.03); background: #f8fafc; }

        @media (max-width: 992px) {
            .prestasi-container { grid-template-columns: 1fr; }
            .hero-container h2 { font-size: 40px; }
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>
<div class="form-section">
    <div class="form-card">
        <h2 style="margin-bottom: 25px; color: #0f172a;">Formulir Pendaftaran</h2>
        <form id="pendaftaranForm">
            <div class="input-group"><label>Nama Lengkap *</label><input type="text" id="nama" required></div>
            <div class="input-group"><label>Jenis Kelamin *</label>
                <select id="jk" required><option value="">-- Pilih --</option><option>Laki-laki</option><option>Perempuan</option></select>
            </div>
            <div class="input-group"><label>Tempat, Tanggal Lahir *</label><input type="text" id="ttl" required></div>
            <div class="input-group"><label>Asal Sekolah *</label><input type="text" id="sekolah" required></div>
            <div class="input-group"><label>Nama Orang Tua *</label><input type="text" id="ortu" required></div>
            <div class="input-group"><label>No. WhatsApp *</label><input type="text" id="wa" required></div>
            <div class="input-group"><label>Pilihan Program *</label>
                <select id="program" required><option value="">-- Pilih --</option><option>SD</option><option>SMP</option><option>SMA</option><option>UTBK</option></select>
            </div>
            <div class="input-group"><label>Alamat Lengkap *</label><textarea id="alamat" rows="3" required></textarea></div>

            <div class="btn-container">
                <button type="button" class="btn-action btn-wa" onclick="kirimWhatsApp()">Kirim ke WhatsApp</button>
                <button type="button" class="btn-action btn-cetak" onclick="cetakKartu()">Cetak Kartu</button>
            </div>
        </form>
    </div>
</div>

<script>
    function validateForm() {
        const form = document.getElementById('pendaftaranForm');
        if (!form.checkValidity()) {
            alert("Harap lengkapi semua bidang bertanda bintang (*)");
            return false;
        }
        return true;
    }

    function getFormData() {
        return {
            nama: document.getElementById('nama').value,
            jk: document.getElementById('jk').value,
            ttl: document.getElementById('ttl').value,
            sekolah: document.getElementById('sekolah').value,
            ortu: document.getElementById('ortu').value,
            wa: document.getElementById('wa').value,
            program: document.getElementById('program').value,
            alamat: document.getElementById('alamat').value
        };
    }

    function kirimWhatsApp() {
        if (!validateForm()) return;
        const d = getFormData();
        const pesan = `Halo Admin, saya ingin mendaftar: %0aNama: ${d.nama}%0aJK: ${d.jk}%0aTTL: ${d.ttl}%0aSekolah: ${d.sekolah}%0aOrtu: ${d.ortu}%0aNo WA: ${d.wa}%0aProgram: ${d.program}%0aAlamat: ${d.alamat}`;
        window.open(`https://wa.me/6289671227131?text=${pesan}`, '_blank');
    }

    function cetakKartu() {
        if (!validateForm()) return;
        const d = getFormData();
        const win = window.open('', '_blank');
        win.document.write(`
            <html><head><title>Kartu Pendaftaran</title>
            <style>
                body{font-family:sans-serif; padding:40px; background:#f4f4f4;}
                .card{background:white; padding:40px; border:2px solid #008b76; border-radius:20px; max-width:500px; margin:auto;}
                h2{color:#008b76; text-align:center; border-bottom:2px solid #008b76; padding-bottom:10px;}
                .row{display:flex; margin:10px 0;}
                .label{font-weight:bold; width:150px;}
                .print-btn{display:block; margin:20px auto; padding:12px 30px; background:#008b76; color:white; border:none; border-radius:30px; cursor:pointer;}
            </style></head><body>
            <div class="card">
                <h2>Kartu Pendaftaran</h2>
                <div class="row"><div class="label">Nama</div><div>: ${d.nama}</div></div>
                <div class="row"><div class="label">JK</div><div>: ${d.jk}</div></div>
                <div class="row"><div class="label">TTL</div><div>: ${d.ttl}</div></div>
                <div class="row"><div class="label">Sekolah</div><div>: ${d.sekolah}</div></div>
                <div class="row"><div class="label">Orang Tua</div><div>: ${d.ortu}</div></div>
                <div class="row"><div class="label">Program</div><div>: ${d.program}</div></div>
                <div class="row"><div class="label">Alamat</div><div>: ${d.alamat}</div></div>
                <button class="print-btn" onclick="window.print()">Cetak Kartu</button>
            </div></body></html>
        `);
    }
</script>

<?php include 'footer.php'; ?>
</body>
</html>