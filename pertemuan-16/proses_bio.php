<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error_pengunjung'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$pkode = bersihkan($_POST['txtKode'] ?? '');
$pnama = bersihkan($_POST['txtNmPengunjung'] ?? '');
$ptempat = bersihkan($_POST['txtT4LhrPengunjung'] ?? '');
$ptanggal = bersihkan($_POST['txtTglLhrPengunjung'] ?? '');
$phobi = bersihkan($_POST['txtHobiPengunjung'] ?? '');
$ppekerjaan = bersihkan($_POST['txtKerjaPengunjung'] ?? '');
$ppasangan = bersihkan($_POST['txtPasanganPengunjung'] ?? '');
$portu = bersihkan($_POST['txtNmOrtuPengunjung'] ?? '');
$pkakak = bersihkan($_POST['txtNmKakakPengunjung'] ?? '');
$padik = bersihkan($_POST['txtNmAdikPengunjung'] ?? '');

#Validasi sederhana
$errors_pengunjung = []; #ini array untuk menampung semua error yang ada

if ($pkode === '') {
  $errors_pengunjung[] = 'NIM wajib diisi.';
}

if ($pnama === '') {
  $errors_pengunjung[] = 'Nama wajib diisi.';
}

if (mb_strlen($pnama) < 3) {
  $errors_pengunjung[] = 'Nama minimal 3 karakter.';
}

if ($ptempat === '') {
  $errors_pengunjung[] = 'Tempat tinggal wajib diisi.';
}

if ($ptanggal === '') {
  $errors_pengunjung[] = 'Tanggal lahir wajib diisi.';
}

if ($phobi === '') {
  $errors_pengunjung[] = 'Hobi wajib diisi.';
}

if ($ppekerjaan === '') {
  $errors_pengunjung[] = 'Pekerjaan wajib diisi.';
}

if ($ppasangan === '') {
  $errors_pengunjung[] = 'Pasangan wajib diisi.';
}

if ($portu === '') {
  $errors_pengunjung[] = 'Nama orang tua wajib diisi.';
}

if ($pkakak === '') {
  $errors_pengunjung[] = 'Nama pkakak wajib diisi.';
}

if ($padik === '') {
  $errors_pengunjung[] = 'Nama padik wajib diisi.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors_pengunjung)) {
  $_SESSION['old_pengunjung'] = [
    'pkode' => $pkode,
    'pnama' => $pnama,
    'ptempat' => $ptempat,
    'ptanggal' => $ptanggal,
    'phobi' => $phobi,
    'ppekerjaan' => $ppekerjaan,
    'ppasangan' => $ppasangan,
    'portu' => $portu,
    'pkakak' => $pkakak,
    'padik' => $padik,
  ];

  $_SESSION['flash_error_pengunjung'] = implode('<br>', $errors_pengunjung);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_pengunjung (pkode, pnama, ptempat, ptanggal, phobi, ppekerjaan, ppasangan, portu, pkakak, padik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error_pengunjung'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "ssssssssss", $pkode, $pnama, $ptempat, $ptanggal, $phobi, $ppekerjaan, $ppasangan, $portu, $pkakak, $padik);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old_pengunjung']);
  $_SESSION['flash_sukses_pengunjung'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { #jika gagal, simpan kembali old value dan tampilkan error umum
  $_SESSION['old_pengunjung'] = [
    'pkode' => $pkode,
    'pnama' => $pnama,
    'ptempat' => $ptempat,
    'ptanggal' => $ptanggal,
    'phobi' => $phobi,
    'ppekerjaan' => $ppekerjaan,
    'ppasangan' => $ppasangan,
    'portu' => $portu,
    'pkakak' => $pkakak,
    'padik' => $padik,
  ];

  $_SESSION['flash_error_pengunjung'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);

header("location: index.php#about");
