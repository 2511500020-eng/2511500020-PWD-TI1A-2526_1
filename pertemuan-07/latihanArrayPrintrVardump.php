<?php
$hobi = ["Menggambar", "Menghalu"]; //deklarasi variabel hobi tipe array dengan nilai "Menggambar", "Menghalu"
echo "<h3>Daftar Hobi Saya:</h3>"; //cetak pesan "Daftar Hobi Saya:"
for ($i = 0; $i < count($hobi); $i++) { //perulangan. deklarasi var i = 0, perulangan terjadi selagi i kurang dari jumlah item hobi dan nilai i akan ditambah 1
echo ($i + 1) . ". " . $hobi[$i] . "<br>"; //isi perulangan: cetak [i + 1] sebagai nomor lalu dilanjut dengan hobi
}
echo "<hr>"; //cetak garis horizontal
echo "<h4>Hasil print_r():</h4>"; //cetak pesan "Hasil print_r():"
echo "<pre>";
print_r($hobi); //menampilkan item-item dalam var hobi
echo "</pre>";
echo "<h4>Hasil var_dump():</h4>"; //cetak pesan "Hasil var_dump():"
echo "<pre>";
var_dump($hobi); ////menampilkan item-item dalam var hobi dengan lebih detail (beserta tipe data dan jumlah karakternya)
echo "</pre>";
?>