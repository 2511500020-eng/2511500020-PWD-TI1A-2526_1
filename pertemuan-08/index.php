<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;

$sesnim = "";
if (isset($_SESSION["sesnim"])):
  $sesnim = $_SESSION["sesnim"];
endif;

$sesnamaLengkap = "";
if (isset($_SESSION["sesnamaLengkap"])):
  $sesnamaLengkap = $_SESSION["sesnamaLengkap"];
endif;

$sestempatLahir = "";
if (isset($_SESSION["sestempatLahir"])):
  $sestempatLahir = $_SESSION["sestempatLahir"];
endif;

$sestanggalLahir = "";
if (isset($_SESSION["sestanggalLahir"])):
  $sestanggalLahir = $_SESSION["sestanggalLahir"];
endif;

$seshobi = "";
if (isset($_SESSION["seshobi"])):
  $seshobi = $_SESSION["seshobi"];
endif;

$sespasangan = "";
if (isset($_SESSION["sespasangan"])):
  $sespasangan = $_SESSION["sespasangan"];
endif;

$sespekerjaan = "";
if (isset($_SESSION["sespekerjaan"])):
  $sespekerjaan = $_SESSION["sespekerjaan"];
endif;

$sesortu = "";
if (isset($_SESSION["sesortu"])):
  $sesortu = $_SESSION["sesortu"];
endif;

$seskakak = "";
if (isset($_SESSION["seskakak"])):
  $seskakak = $_SESSION["seskakak"];
endif;

$sesadik = "";
if (isset($_SESSION["sesadik"])):
  $sesadik = $_SESSION["sesadik"];
endif;
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

    <section id="pendaftaran">
      <h2>Pendaftaran Profil Pengunjung</h2>
      <form id="formDaftar" action="proses.php" method="POST">

        <label for="txtNim"><span>NIM:</span>
          <input type="text" id="txtNim" name="txtNim" placeholder="Masukkan NIM" required autocomplete="nim">
        </label>

        <label for="txtNamaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNamaLengkap" name="txtNamaLengkap" placeholder="Masukkan nama lengkap" required autocomplete="nameLengkap">
        </label>

        <label for="txtTempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="txtTempatLahir" name="txtTempatLahir" placeholder="Masukkan tempat lahir" required autocomplete="tempatLahir">
        </label>

        <label for="txtTanggalLahir"><span>Tanggal Lahir:</span>
          <input type="text" id="txtTanggalLahir" name="txtTanggalLahir" placeholder="Masukkan tanggal lahir" required autocomplete="tanggalLahir">
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan hobi" required autocomplete="hobi">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan nama pasangan" required autocomplete="pasangan">
        </label>

        <label for="txtPekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="txtPekerjaan" name="txtPekerjaan" placeholder="Masukkan pekerjaan" required autocomplete="pekerjaan">
        </label>

        <label for="txtOrtu"><span>Orang Tua:</span>
          <input type="text" id="txtOrtu" name="txtOrtu" placeholder="Masukkan nama orang tua" required autocomplete="ortu">
        </label>

        <label for="txtKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtKakak" name="txtKakak" placeholder="Masukkan nama kakak" required autocomplete="kakak">
        </label>

        <label for="txtAdik"><span>Nama Adik:</span>
          <input type="text" id="txtAdik" name="txtAdik" placeholder="Masukkan nama adik" required autocomplete="adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

    <section id="about">
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong>
        <?php
          echo $sesnim;
        ?>
      </p>
      <p><strong>Nama Lengkap:</strong>
        <?php
          echo $sesnamaLengkap;
        ?> &#128526;
      </p>
      <p><strong>Tempat Lahir:</strong>
        <?php
          echo $sestempatLahir;
        ?>
      </p>
      <p><strong>Tanggal Lahir:</strong>
          <?php
              echo $sestanggalLahir;
          ?>
      </p>
      <p><strong>Hobi:</strong>
          <?php
              echo $seshobi;
          ?> &#128516;
      </p>
      <p><strong>Pasangan:</strong>
          <?php
              echo $sespasangan;
          ?>
      </p>
      <p><strong>Pekerjaan:</strong>
          <?php
              echo $sespekerjaan;
          ?> &#128077;
      </p>
      <p><strong>Nama Orang Tua:</strong>
          <?php
              echo $sesortu;
          ?>
      </p>
      <p><strong>Nama Kakak:</strong>
          <?php
              echo $seskakak;
          ?>
      </p>
      <p><strong>Nama Adik:</strong>
          <?php
              echo $sesadik;
          ?>
      </p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form id="formContact" action="proses.php" method="POST">

        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>


        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>



    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>