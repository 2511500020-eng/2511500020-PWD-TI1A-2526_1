<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error_bio'] = 'Akses tidak valid.';
    redirect_ke('read_bio.php');
  }

  #validasi id wajib angka dan > 0
  $did = filter_input(INPUT_POST, 'did', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$did) {
    $_SESSION['flash_error_bio'] = 'did Tidak Valid.';
    redirect_ke('edit_bio.php?did='. (int)$did);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $dkode = bersihkan($_POST['txtKodeDosEd'] ?? '');
  $dnama = bersihkan($_POST['txtNmDosenEd'] ?? '');
  $dalamat = bersihkan($_POST['txtAlRmhEd'] ?? '');
  $dtanggal = bersihkan($_POST['txtTglDosenEd'] ?? '');
  $djja = bersihkan($_POST['txtJJAEd'] ?? '');
  $dnohp = bersihkan($_POST['txtProdiEd'] ?? '');
  $dprodi = bersihkan($_POST['txtNoHPEd'] ?? '');
  $dpasangan = bersihkan($_POST['txNamaPasanganEd'] ?? '');
  $danak = bersihkan($_POST['txtNmAnakEd'] ?? '');
  $dbilmu = bersihkan($_POST['txtBidangIlmuEd'] ?? '');

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
    redirect_ke('edit_bio.php?did='. (int)$did);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE id = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_dosen 
                                SET dkode = ?, dnama = ?, dalamat = ?, dtanggal = ?, djja = ?, dnohp = ?, dprodi = ?, dpasangan = ?, danak = ?, dbilmu = ?
                                WHERE did = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error_bio'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_bio.php?did='. (int)$did);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "ssssssssssi", $dkode, $dnama, $dalamat, $dtanggal, $djja, $dnohp, $dprodi, $dpasangan, $danak, $dbilmu, $did);
  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old_bio']);
    /*
      Redirect balik ke read_bio.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses_bio'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('read_bio.php'); #pola PRG: kembali ke data dan exit()
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
    $_SESSION['flash_error_bio'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_bio.php?did='. (int)$did);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_bio.php?did='. (int)$did);