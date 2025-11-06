Latihan struktur kontrol percabangan:
<?php
$hari = "Senin"; //deklarasi variabel hari tipe string bernilai "Senin"
switch ($hari) { //percabangan yg melihat nilai var hari
case "Senin": echo "Awal Minggu!"; break; //jika nilai var hari "Senin" maka akan mencetak teks "Awal Minggu!" lalu percabangan berhenti
case "Jumat": echo "Hampir weekend!"; break; //jika nilai var hari "Jumat" maka akan mencetak teks "Hampir weekend!" lalu percabangan berhenti
default: echo "Hari biasa."; //jika nilai var bukan "Senin" ataupun "Jumat" maka akan mencetak teks "Hari biasa."
}
?>