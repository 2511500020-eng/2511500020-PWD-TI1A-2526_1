<?php
$nama = "Widya"; //deklarasi variabel nama tipe string(karakter) nilainya "Widya"
$umur = 18; //deklarasi variabel umur tipe integer(angka bulat) nilainya 18
$tinggi = 1.54; //deklarasi variabel tinggi tipe float(angka koma) nilainya 1.54
$aktif = true; //deklarasi variabel aktif tipe boolean(true or false) nilainya true
$hobi = ["Menggambar", "Menghalu"]; //deklarasi variabel hobi tipe array(banyak nilai) nilainya "Menggambar" dan "Menghalu"
$mahasiswa = (object)[
    "nim" => "2511500020",
    "nama" => "Widya Serena Mulyaputeri",
    "prodi" => "Teknik Informatika"
];
/*di atas ini deklarasi variabel mahasiswa tipe object yang tipenya string
"nim" nilainya "2511500020"
"nama" nilainya "Widya Serena Mulyaputeri"
"prodi" nilainya "Teknik Informatika"
*/
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