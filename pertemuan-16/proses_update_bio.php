<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_pengunjung'] = 'Akses tidak valid.';
    redirect_ke('read_bio.php');
  }

  #validasi id wajib angka dan > 0
  $pid = filter_input(INPUT_POST, 'pid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$pid) {
    $_SESSION['flash_error_pengunjung'] = 'pid Tidak Valid.';
    redirect_ke('edit_bio.php?pid='. (int)$pid);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $pkode = bersihkan($_POST['txtKodeEd'] ?? '');
  $pnama = bersihkan($_POST['txtNmPengunjungEd'] ?? '');
  $ptempat = bersihkan($_POST['txtT4LhrPengunjungEd'] ?? '');
  $ptanggal = bersihkan($_POST['txtTglLhrPengunjungEd'] ?? '');
  $phobi = bersihkan($_POST['txtHobiPengunjungEd'] ?? '');
  $ppekerjaan = bersihkan($_POST['txtKerjaPengunjungEd'] ?? '');
  $ppasangan = bersihkan($_POST['txtPasanganPengunjungEd'] ?? '');
  $portu = bersihkan($_POST['txtNmOrtuPengunjungEd'] ?? '');
  $pkakak = bersihkan($_POST['txtNmKakakPengunjungEd'] ?? '');
  $padik = bersihkan($_POST['txtNmAdikPengunjungEd'] ?? '');

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
    redirect_ke('edit_bio.php?pid='. (int)$pid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE id = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_pengunjung 
                                SET pkode = ?, pnama = ?, ptempat = ?, ptanggal = ?, phobi = ?, ppekerjaan = ?, ppasangan = ?, portu = ?, pkakak = ?, padik = ?
                                WHERE pid = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error_pengunjung'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_bio.php?pid='. (int)$pid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $pkode, $pnama, $ptempat, $ptanggal, $phobi, $ppekerjaan, $ppasangan, $portu, $pkakak, $padik, $pid);
  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old_pengunjung']);
    /*
      Redirect balik ke read_bio.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses_pengunjung'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_bio.php'); #pola PRG: kembali ke data dan exit()
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
    $_SESSION['flash_error_pengunjung'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_bio.php?pid='. (int)$pid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_bio.php?pid='. (int)$pid);