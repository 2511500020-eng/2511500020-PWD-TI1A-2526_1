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
  $did = filter_input(INPUT_GET, 'did', FILTER_VALIDATE_INT, [
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
  if (!$did) {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('read_bio.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
    $stmt = mysqli_prepare($conn, "SELECT did, dkode, dnama, dalamat, dtanggal, djja, dnohp, dprodi, dpasangan, danak, dbilmu
                                    FROM tbl_dosen WHERE did = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error_bio'] = 'Query tidak benar.';
    redirect_ke('read_bio.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $did);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error_bio'] = 'Record tidak ditemukan.';
    redirect_ke('read_bio.php');
  }

  #Nilai awal (prefill form)
  $dkode = $row["dkode"] ?? "";
  $dnama = $row["dnama"] ?? "";
  $dalamat = $row["dalamat"] ?? "";
  $dtanggal = $row["dtanggal"] ?? "";
  $djja = $row["djja"] ?? "";
  $dprodi = $row["dprodi"] ?? "";
  $dnohp = $row["dnohp"] ?? "";
  $dpasangan = $row["dpasangan"] ?? "";
  $danak = $row["danak"] ?? "";
  $dbilmu = $row["dbilmu"] ?? "";

  #Ambil error dan nilai old input kalau ada
  $flash_error_bio = $_SESSION['flash_error_bio'] ?? '';
  $old_bio = $_SESSION['old_bio'] ?? [];
  unset($_SESSION['flash_error_bio'], $_SESSION['old_bio']);
  if (!empty($old_bio)) {
    $dkode = $old_bio["dkode"] ?? $dkode;
    $dnama = $old_bio["dnama"] ?? $dnama;
    $dalamat = $old_bio["dalamat"] ?? $dalamat;
    $dtanggal = $old_bio["dtanggal"] ?? $dtanggal;
    $djja = $old_bio["djja"] ?? $djja;
    $dprodi = $old_bio["dprodi"] ?? $dprodi;
    $dnohp = $old_bio["dnohp"] ?? $dnohp;
    $dpasangan = $old_bio["dpasangan"] ?? $dpasangan;
    $danak = $old_bio["danak"] ?? $danak;
    $dbilmu = $old_bio["dbilmu"] ?? $dbilmu;
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
      <h2>Edit Biodata Dosen</h2>

      <?php if (!empty($flash_error_bio)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px">
          <?= $flash_error_bio; ?>  
        </div>
      <?php endif; ?>

      <form action="proses_update_bio.php" method="POST">

        <input type="hidden" name="did" value="<?= (int)$did; ?>">
    
        <label for="txtKodeDos"><span>Kode Dosen:</span>
          <input type="text" id="txtKodeDos" name="txtKodeDosEd" readonly required value="<?= !empty($dkode) ? $dkode : '' ?>">
        </label>

        <label for="txtNmDosen"><span>Nama Dosen:</span>
          <input type="text" id="txtNmDosen" name="txtNmDosenEd" placeholder="Masukkan Nama Dosen" required value="<?= !empty($dnama) ? $dnama : '' ?>">
        </label>

        <label for="txtAlRmh"><span>Alamat Rumah:</span>
          <input type="text" id="txtAlRmh" name="txtAlRmhEd" placeholder="Masukkan Alamat Rumah" required value="<?= !empty($dalamat) ? $dalamat : '' ?>">
        </label>

        <label for="txtTglDosen"><span>Tanggal Jadi Dosen:</span>
          <input type="text" id="txtTglDosen" name="txtTglDosenEd" placeholder="Masukkan Tanggal Jadi Dosen" required value="<?= !empty($dtanggal) ? $dtanggal : '' ?>">
        </label>

        <label for="txtJJA"><span>JJA Dosen:</span>
          <input type="text" id="txtJJA" name="txtJJAEd" placeholder="Masukkan JJA Dosen" required value="<?= !empty($djja) ? $djja : '' ?>">
        </label>

        <label for="txtProdi"><span>Homebase Prodi:</span>
          <input type="text" id="txtProdi" name="txtProdiEd" placeholder="Masukkan Homebase Prodi" required value="<?= !empty($dprodi) ? $dprodi : '' ?>">
        </label>

        <label for="txtNoHP"><span>Nomor HP:</span>
          <input type="text" id="txtNoHP" name="txtNoHPEd" placeholder="Masukkan Nomor HP" required value="<?= !empty($dnohp) ? $dnohp : '' ?>">
        </label>

        <label for="txNamaPasangan"><span>Nama Pasangan:</span>
          <input type="text" id="txNamaPasangan" name="txNamaPasanganEd" placeholder="Masukkan Nama Orang Tua" required value="<?= !empty($dpasangan) ? $dpasangan : '' ?>">
        </label>

        <label for="txtNmAnak"><span>Nama Anak:</span>
          <input type="text" id="txtNmAnak" name="txtNmAnakEd" placeholder="Masukkan Nama Kakak" required value="<?= !empty($danak) ? $danak : '' ?>">
        </label>

        <label for="txtBidangIlmu"><span>Bidang Ilmu Dosen:</span>
          <input type="text" id="txtBidangIlmu" name="txtBidangIlmuEd" placeholder="Masukkan Bidang Ilmu Dosen" required value="<?= !empty($dbilmu) ? $dbilmu : '' ?>">
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