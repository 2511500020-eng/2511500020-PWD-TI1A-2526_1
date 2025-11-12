<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;

$sesnim = $_POST["txtNim"];
$sesnamaLengkap = $_POST["txtNamaLengkap"];
$sestempatLahir = $_POST["txtTempatLahir"];
$sestanggalLahir = $_POST["txtTanggalLahir"];
$seshobi = $_POST["txtHobi"];
$sespasangan = $_POST["txtPasangan"];
$sespekerjaan = $_POST["txtPekerjaan"];
$sesortu = $_POST["txtOrtu"];
$seskakak = $_POST["txtKakak"];
$sesadik = $_POST["txtAdik"];
$_SESSION["sesnim"] = $sesnim;
$_SESSION["sesnamaLengkap"] = $sesnamaLengkap;
$_SESSION["sestempatLahir"] = $sestempatLahir;
$_SESSION["sestanggalLahir"] = $sestanggalLahir;
$_SESSION["seshobi"] = $seshobi;
$_SESSION["sespasangan"] = $sespasangan;
$_SESSION["sespekerjaan"] = $sespekerjaan;
$_SESSION["sesortu"] = $sesortu;
$_SESSION["seskakak"] = $seskakak;
$_SESSION["sesadik"] = $sesadik;
header("location: index.php");
?>