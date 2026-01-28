<?php
require 'koneksi.php';

$fieldBiodata = [
      "dkode" => ["label" => "NIM:", "suffix" => ""],
      "dnama" => ["label" => "Nama Lengkap:", "suffix" => ""],
      "dalamat" => ["label" => "Tempat Lahir:", "suffix" => ""],
      "dtanggal" => ["label" => "Tanggal Lahir:", "suffix" => ""],
      "djja" => ["label" => "Hobi:", "suffix" => ""],
      "dprodi" => ["label" => "Pasangan:", "suffix" => ""],
      "dnohp" => ["label" => "Pekerjaan:", "suffix" => ""],
      "dpasangan" => ["label" => "Nama Orang Tua:", "suffix" => ""],
      "danak" => ["label" => "Nama Kakak:", "suffix" => ""],
      "dbilmu" => ["label" => "Nama Adik:", "suffix" => ""],
    ];

$sql = "SELECT * FROM tbl_dosen ORDER BY did DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    echo "<p>Gagal membaca data biodata: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data biodata yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrBiodata = [
            "dkode" => $row["dkode"] ?? "",
            "dnama" => $row["dnama"] ?? "",
            "dalamat" => $row["dalamat"] ?? "",
            "dtanggal" => $row["dtanggal"] ?? "",
            "djja" => $row["djja"] ?? "",
            "dprodi" => $row["dprodi"] ?? "",
            "dnohp" => $row["dnohp"] ?? "",
            "dpasangan" => $row["dpasangan"] ?? "",
            "danak" => $row["danak"] ?? "",
            "dbilmu" => $row["dbilmu"] ?? "",
        ];
    echo tampilkanBiodata($fieldBiodata, $arrBiodata);
    }
}
?>