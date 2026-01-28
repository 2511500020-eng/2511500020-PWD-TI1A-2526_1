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
$dkode = bersihkan($_POST['txtKodeDos'] ?? '');
$dnama = bersihkan($_POST['txtNmDosen'] ?? '');
$dalamat = bersihkan($_POST['txtAlRmh'] ?? '');
$dtanggal = bersihkan($_POST['txtTglDosen'] ?? '');
$djja = bersihkan($_POST['txtJJA'] ?? '');
$dnohp = bersihkan($_POST['txtProdi'] ?? '');
$dprodi = bersihkan($_POST['txtNoHP'] ?? '');
$dpasangan = bersihkan($_POST['txNamaPasangan'] ?? '');
$danak = bersihkan($_POST['txtNmAnak'] ?? '');
$dbilmu = bersihkan($_POST['txtBidangIlmu'] ?? '');

#Validasi sederhana
$errors_bio = []; #ini array untuk menampung semua error yang ada

if ($dkode === '') {
  $errors_bio[] = 'NIM wajib diisi.';
}

if ($dnama === '') {
  $errors_bio[] = 'Nama wajib diisi.';
}

if (mb_strlen($dnama) < 3) {
  $errors_bio[] = 'Nama minimal 3 karakter.';
}

if ($dalamat === '') {
  $errors_bio[] = 'Tempat tinggal wajib diisi.';
}

if ($dtanggal === '') {
  $errors_bio[] = 'Tanggal lahir wajib diisi.';
}

if ($djja === '') {
  $errors_bio[] = 'Hobi wajib diisi.';
}

if ($dnohp === '') {
  $errors_bio[] = 'Pekerjaan wajib diisi.';
}

if ($dprodi === '') {
  $errors_bio[] = 'Pasangan wajib diisi.';
}

if ($dpasangan === '') {
  $errors_bio[] = 'Nama orang tua wajib diisi.';
}

if ($danak === '') {
  $errors_bio[] = 'Nama danak wajib diisi.';
}

if ($dbilmu === '') {
  $errors_bio[] = 'Nama dbilmu wajib diisi.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors_bio)) {
  $_SESSION['old_bio'] = [
    'dkode' => $dkode,
    'dnama' => $dnama,
    'dalamat' => $dalamat,
    'dtanggal' => $dtanggal,
    'djja' => $djja,
    'dnohp' => $dnohp,
    'dprodi' => $dprodi,
    'dpasangan' => $dpasangan,
    'danak' => $danak,
    'dbilmu' => $dbilmu,
  ];

  $_SESSION['flash_error_bio'] = implode('<br>', $errors_bio);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_dosen (dkode, dnama, dalamat, dtanggal, djja, dnohp, dprodi, dpasangan, danak, dbilmu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $dkode, $dnama, $dalamat, $dtanggal, $djja, $dnohp, $dprodi, $dpasangan, $danak, $dbilmu);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old_bio']);
  $_SESSION['flash_sukses_bio'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old value dan tampilkan error umum
  $_SESSION['old_bio'] = [
    'dkode' => $dkode,
    'dnama' => $dnama,
    'dalamat' => $dalamat,
    'dtanggal' => $dtanggal,
    'djja' => $djja,
    'dnohp' => $dnohp,
    'dprodi' => $dprodi,
    'dpasangan' => $dpasangan,
    'danak' => $danak,
    'dbilmu' => $dbilmu,
  ];

  $_SESSION['flash_error_bio'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);

header("location: index.php#about");
