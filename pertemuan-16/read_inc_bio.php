<?php
require 'koneksi.php';

$fieldBiodata = [
      "pkode" => ["label" => "NIM:", "suffix" => ""],
      "pnama" => ["label" => "Nama Lengkap:", "suffix" => ""],
      "ptempat" => ["label" => "Tempat Lahir:", "suffix" => ""],
      "ptanggal" => ["label" => "Tanggal Lahir:", "suffix" => ""],
      "phobi" => ["label" => "Hobi:", "suffix" => ""],
      "ppasangan" => ["label" => "Pasangan:", "suffix" => ""],
      "ppekerjaan" => ["label" => "Pekerjaan:", "suffix" => ""],
      "portu" => ["label" => "Nama Orang Tua:", "suffix" => ""],
      "pkakak" => ["label" => "Nama Kakak:", "suffix" => ""],
      "padik" => ["label" => "Nama Adik:", "suffix" => ""],
    ];

$sql = "SELECT * FROM tbl_pengunjung ORDER BY pid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data biodata: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data biodata yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "pkode" => $row["pkode"] ?? "",
            "pnama" => $row["pnama"] ?? "",
            "ptempat" => $row["ptempat"] ?? "",
            "ptanggal" => $row["ptanggal"] ?? "",
            "phobi" => $row["phobi"] ?? "",
            "ppasangan" => $row["ppasangan"] ?? "",
            "ppekerjaan" => $row["ppekerjaan"] ?? "",
            "portu" => $row["portu"] ?? "",
            "pkakak" => $row["pkakak"] ?? "",
            "padik" => $row["padik"] ?? "",
        ];
    echo tampilkanBiodata($fieldBiodata, $arrBiodata);
    }
}
?>