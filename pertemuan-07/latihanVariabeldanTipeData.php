<?php
$nama = "Widya"; //deklarasi variabel nama tipe string(karakter) nilainya "Widya"
$umur = 18; //deklarasi variabel umur tipe integer(angka bulat) nilainya 18
$tinggi = 1.54; //deklarasi variabel tinggi tipe float(angka koma) nilainya 1.54
$aktif = true; //deklarasi variabel aktif tipe boolean(true or false) nilainya true

echo "Nama: $nama <br>"; //cetak pesan "Nama: Widya"
echo "Umur: $umur tahun <br>"; //cetak pesan "Umur: 18 tahun"
echo "Tinggi: $tinggi meter <br>"; //cetak pesan "Tinggi: 1.54 meter"
echo "Status aktif: " . ($aktif ? "Ya" : "Tidak") . "<br>"; //cetak pesan "Status aktif: Ya"
var_dump($nama); //cetak informasi tentang variabel nama
var_dump($umur); //cetak informasi tentang variabel umur
var_dump($tinggi); //cetak informasi tentang variabel tinggi
var_dump($aktif); //cetak informasi tentang variabel aktif
?>