<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai id dari GET dan lakukan validasi untuk 
    mengecek id harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya id harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $pid = filter_input(INPUT_GET, 'pid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $id = $_GET['id'] ?? '';
    $id = (int)$id;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $id bernilai valid:
    Kalau $id tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (read_bio.php) sembari 
    mengirim penanda error.
  */
  if (!$pid) {
    $_SESSION['flash_error_pengunjung'] = 'Akses tidak valid.';
    redirect_ke('read_bio.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
    $stmt = mysqli_prepare($conn, "SELECT pid, pkode, pnama, ptempat, ptanggal, phobi, ppekerjaan, ppasangan, portu, pkakak, padik
                                    FROM tbl_pengunjung WHERE pid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error_pengunjung'] = 'Query tidak benar.';
    redirect_ke('read_bio.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $pid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error_pengunjung'] = 'Record tidak ditemukan.';
    redirect_ke('read_bio.php');
  }

  #Nilai awal (prefill form)
  $pkode = $row["pkode"] ?? "";
  $pnama = $row["pnama"] ?? "";
  $ptempat = $row["ptempat"] ?? "";
  $ptanggal = $row["ptanggal"] ?? "";
  $phobi = $row["phobi"] ?? "";
  $ppasangan = $row["ppasangan"] ?? "";
  $ppekerjaan = $row["ppekerjaan"] ?? "";
  $portu = $row["portu"] ?? "";
  $pkakak = $row["pkakak"] ?? "";
  $padik = $row["padik"] ?? "";

  #Ambil error dan nilai old input kalau ada
  $flash_error_pengunjung = $_SESSION['flash_error_pengunjung'] ?? '';
  $old_pengunjung = $_SESSION['old_pengunjung'] ?? [];
  unset($_SESSION['flash_error_pengunjung'], $_SESSION['old_pengunjung']);
  if (!empty($old_pengunjung)) {
    $pkode = $old_pengunjung["pkode"] ?? $pkode;
    $pnama = $old_pengunjung["pnama"] ?? $pnama;
    $ptempat = $old_pengunjung["ptempat"] ?? $ptempat;
    $ptanggal = $old_pengunjung["ptanggal"] ?? $ptanggal;
    $phobi = $old_pengunjung["phobi"] ?? $phobi;
    $ppasangan = $old_pengunjung["ppasangan"] ?? $ppasangan;
    $ppekerjaan = $old_pengunjung["ppekerjaan"] ?? $ppekerjaan;
    $portu = $old_pengunjung["portu"] ?? $portu;
    $pkakak = $old_pengunjung["pkakak"] ?? $pkakak;
    $padik = $old_pengunjung["padik"] ?? $padik;
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="biodata">
      <h2>Edit Biodata</h2>

      <?php if (!empty($flash_error_pengunjung)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px">
          <?= $flash_error_pengunjung; ?>  
        </div>
      <?php endif; ?>

      <form action="proses_update_bio.php" method="POST">

        <input type="hidden" name="pid" value="<?= (int)$pid; ?>">
    
        <label for="txtKode"><span>NIM:</span>
          <input type="number" id="txtKode" name="txtKodeEd" readonly required value="<?= !empty($pkode) ? $pkode : '' ?>">
        </label>

        <label for="txtNmPengunjung"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmPengunjung" name="txtNmPengunjungEd" placeholder="Masukkan Nama" required value="<?= !empty($pnama) ? $pnama : '' ?>">
        </label>

        <label for="txtT4LhrPengunjung"><span>Tempat Lahir:</span>
          <input type="text" id="txtT4LhrPengunjung" name="txtT4LhrPengunjungEd" placeholder="Masukkan Tempat Lahir" required value="<?= !empty($ptempat) ? $ptempat : '' ?>">
        </label>

        <label for="txtTglLhrPengunjung"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTglLhrPengunjung" name="txtTglLhrPengunjungEd" placeholder="Masukkan Tanggal Lahir" required value="<?= !empty($ptanggal) ? $ptanggal : '' ?>">
        </label>

        <label for="txtHobiPengunjung"><span>Hobi:</span>
          <input type="text" id="txtHobiPengunjung" name="txtHobiPengunjungEd" placeholder="Masukkan Hobi" required value="<?= !empty($phobi) ? $phobi : '' ?>">
        </label>

        <label for="txtPasanganPengunjung"><span>Pasangan:</span>
          <input type="text" id="txtPasanganPengunjung" name="txtPasanganPengunjungEd" placeholder="Masukkan Pasangan" required value="<?= !empty($ppasangan) ? $ppasangan : '' ?>">
        </label>

        <label for="txtKerjaPengunjung"><span>Pekerjaan:</span>
          <input type="text" id="txtKerjaPengunjung" name="txtKerjaPengunjungEd" placeholder="Masukkan Pekerjaan" required value="<?= !empty($ppekerjaan) ? $ppekerjaan : '' ?>">
        </label>

        <label for="txtNmOrtuPengunjung"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtuPengunjung" name="txtNmOrtuPengunjungEd" placeholder="Masukkan Nama Orang Tua" required value="<?= !empty($portu) ? $portu : '' ?>">
        </label>

        <label for="txtNmKakakPengunjung"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakakPengunjung" name="txtNmKakakPengunjungEd" placeholder="Masukkan Nama Kakak" required value="<?= !empty($pkakak) ? $pkakak : '' ?>">
        </label>

        <label for="txtNmAdikPengunjung"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdikPengunjung" name="txtNmAdikPengunjungEd" placeholder="Masukkan Nama Adik" required value="<?= !empty($padik) ? $padik : '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="read_bio.php" class="reset">Kembali</a>
      </form>
    </section>
  </main>

  <script src="script.js"></script>
</body>
</html>