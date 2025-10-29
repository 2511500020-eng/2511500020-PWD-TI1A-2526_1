<?php
$nama = "Widya";
$umur = 18;
$tinggi = 1.54;
$aktif = true;
$hobi = ["Menggambar", "Menghalu"];
$mahasiswa = (object)[
    "nim" => "2511500020",
    "nama" => "Widya Serena Mulyaputeri",
    "prodi" => "Teknik Informatika"
];
$nilai_akhir = NULL;

echo "<pre>";
echo "<h2>Demo Tipe Data PHP</h2>";

echo "String:\n";
var_dump($nama);

echo "\nInteger:\n";
var_dump($umur);

echo "\nFloat:\n";
var_dump($tinggi);

echo "\nBoolean:\n";
var_dump($aktif);

echo "\nArray:\n";
var_dump($hobi);

echo "\nObject:\n";
var_dump($mahasiswa);

echo "\nNULL:\n";
var_dump($nilai_akhir);
echo "</pre>";
?>