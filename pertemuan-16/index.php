<?php
session_start();
require_once __DIR__ . '/fungsi.php';
?>

<!DOCTYPE html>
<html lang="en">

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
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

  <?php
    $flash_sukses_bio = $_SESSION['flash_sukses_bio'] ?? '';
    $flash_error_bio = $_SESSION['flash_error_bio'] ?? '';
    $old_bio = $_SESSION['old_bio'] ?? '';

    unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio'], $_SESSION['old_bio']);
  ?>

    <section id="biodata">
      <h2>Biodata Dosen</h2>

      <?php if (!empty($flash_sukses_bio)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px">
          <?= $flash_sukses_bio; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error_bio)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px">
          <?= $flash_error_bio; ?>  
        </div>
      <?php endif; ?>

      <form action="proses_bio.php" method="POST">

        <label for="txtKodeDos"><span>Kode Dosen:</span>
          <input type="text" id="txtKodeDos" name="txtKodeDos" placeholder="Masukkan Kode Dosen" required value="<?= isset($old_bio['dkode']) ? htmlspecialchars($old_bio['dkode']) : '' ?>">
        </label>

        <label for="txtNmDosen"><span>Nama Dosen:</span>
          <input type="text" id="txtNmDosen" name="txtNmDosen" placeholder="Masukkan Nama Dosen" required value="<?= isset($old_bio['dnama']) ? htmlspecialchars($old_bio['dnama']) : '' ?>">
        </label>

        <label for="txtAlRmh"><span>Alamat Rumah:</span>
          <input type="text" id="txtAlRmh" name="txtAlRmh" placeholder="Masukkan Alamat Rumah" required value="<?= isset($old_bio['dalamat']) ? htmlspecialchars($old_bio['dalamat']) : '' ?>">
        </label>

        <label for="txtTglDosen"><span>Tanggal Jadi Dosen:</span>
          <input type="text" id="txtTglDosen" name="txtTglDosen" placeholder="Masukkan Tanggal Jadi Dosen" required value="<?= isset($old_bio['dtanggal']) ? htmlspecialchars($old_bio['dtanggal']) : '' ?>">
        </label>

        <label for="txtJJA"><span>JJA Dosen:</span>
          <input type="text" id="txtJJA" name="txtJJA" placeholder="Masukkan JJA Dosen" required value="<?= isset($old_bio['djja']) ? htmlspecialchars($old_bio['djja']) : '' ?>">
        </label>

        <label for="txtProdi"><span>Homebase Prodi:</span>
          <input type="text" id="txtProdi" name="txtProdi" placeholder="Masukkan Homebase Prodi" required value="<?= isset($old_bio['dprodi']) ? htmlspecialchars($old_bio['dprodi']) : '' ?>">
        </label>

        <label for="txtNoHP"><span>Nomor HP:</span>
          <input type="text" id="txtNoHP" name="txtNoHP" placeholder="Masukkan Nomor HP" required value="<?= isset($old_bio['dnohp']) ? htmlspecialchars($old_bio['dnohp']) : '' ?>">
        </label>

        <label for="txNamaPasangan"><span>Nama Pasangan:</span>
          <input type="text" id="txNamaPasangan" name="txNamaPasangan" placeholder="Masukkan Nama Pasangan" required value="<?= isset($old_bio['dpasangan']) ? htmlspecialchars($old_bio['dpasangan']) : '' ?>">
        </label>

        <label for="txtNmAnak"><span>Nama Anak:</span>
          <input type="text" id="txtNmAnak" name="txtNmAnak" placeholder="Masukkan Nama Anak" required value="<?= isset($old_bio['danak']) ? htmlspecialchars($old_bio['danak']) : '' ?>">
        </label>

        <label for="txtBidangIlmu"><span>Bidang Ilmu Dosen:</span>
          <input type="text" id="txtBidangIlmu" name="txtBidangIlmu" placeholder="Masukkan Bidang Ilmu Dosen" required  value="<?= isset($old_bio['dbilmu']) ? htmlspecialchars($old_bio['dbilmu']) : '' ?>">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <?php include 'read_inc_bio.php'; ?>
    </section>

    <?php
    $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
    $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
    $old          = $_SESSION['old'] ?? []; #untuk nilai lama form

    unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']); #bersihkan 3 session ini
    ?>

    <section id="contact">
      <h2>Kontak Kami</h2>

      <?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama"
            required autocomplete="name"
            value="<?= isset($old['nama']) ? htmlspecialchars($old['nama']) : '' ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email"
            required autocomplete="email"
            value="<?= isset($old['email']) ? htmlspecialchars($old['email']) : '' ?>">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..."
            required><?= isset($old['pesan']) ? htmlspecialchars($old['pesan']) : '' ?></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha" placeholder="Jawab Pertanyaan..."
            required
            value="<?= isset($old['captcha']) ? htmlspecialchars($old['captcha']) : '' ?>">
        </label>

        <button type=" submit">Kirim</button>
          <button type="reset">Batal</button>
      </form>

      <br>
      <hr>
      <h2>Yang menghubungi kami</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>