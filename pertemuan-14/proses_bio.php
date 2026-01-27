<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$nim = bersihkan($_POST['txtNim'] ?? '');
$namalengkap = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat = bersihkan($_POST['txtT4Lhr'] ?? '');
$tanggal = bersihkan($_POST['txtTglLhr'] ?? '');
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$ortu = bersihkan($_POST['txtNmOrtu'] ?? '');
$kakak = bersihkan($_POST['txtNmKakak'] ?? '');
$adik = bersihkan($_POST['txtNmAdik'] ?? '');

#Validasi sederhana
$errors_bio = []; #ini array untuk menampung semua error yang ada

if ($nim === '') {
  $errors[] = 'NIM wajib diisi.';
}

if ($namalengkap === '') {
  $errors[] = 'Nama wajib diisi.';
}

if (mb_strlen($namalengkap) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
}

if ($tempat === '') {
  $errors[] = 'Tempat tinggal wajib diisi.';
}

if ($tanggal === '') {
  $errors[] = 'Tanggal lahir wajib diisi.';
}

if ($hobi === '') {
  $errors[] = 'Hobi wajib diisi.';
}

if ($pekerjaan === '') {
  $errors[] = 'Pekerjaan wajib diisi.';
}

if ($pasangan === '') {
  $errors[] = 'Pasangan wajib diisi.';
}

if ($ortu === '') {
  $errors[] = 'Nama orang tua wajib diisi.';
}

if ($kakak === '') {
  $errors[] = 'Nama kakak wajib diisi.';
}

if ($adik === '') {
  $errors[] = 'Nama adik wajib diisi.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors_bio)) {
  $_SESSION['old_bio'] = [
    'nim' => $nim,
    'namalengkap' => $namalengkap,
    'tempat' => $tempat,
    'tanggal' => $tanggal,
    'hobi' => $hobi,
    'pekerjaan' => $pekerjaan,
    'pasangan' => $pasangan,
    'ortu' => $ortu,
    'kakak' => $kakak,
    'adik' => $adik,
  ];

  $_SESSION['flash_error_bio'] = implode('<br>', $errors_bio);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_biodata (nim, namalengkap, tempat, tanggal, hobi, pekerjaan, pasangan, ortu, kakak, adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $namalengkap, $tempat, $tanggal, $hobi, $pekerjaan, $pasangan, $ortu, $kakak, $adik);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old_bio value, beri pesan sukses
  unset($_SESSION['old_bio']);
  $_SESSION['flash_sukses_bio'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old_bio value dan tampilkan error umum
  $_SESSION['old_bio'] = [
    'nim' => $nim,
    'namalengkap' => $namalengkap,
    'tempat' => $tempat,
    'tanggal' => $tanggal,
    'hobi' => $hobi,
    'pekerjaan' => $pekerjaan,
    'pasangan' => $pasangan,
    'ortu' => $ortu,
    'kakak' => $kakak,
    'adik' => $adik,
  ];
  $_SESSION['flash_error_bio'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);

header("location: index.php#about");
