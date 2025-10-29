<?php
$a = 100; //deklarasi variabel a tipe integer bernilai 100
$b = "100"; //deklarasi variabel b tipe string bernilai 100
$c = 0; //deklarasi variabel c tipe integer bernilai 0
$d = false; //deklarasi variabel d tipe boolean bernilai false

echo "<h3>Perbandingan == dan ===</h3>";
echo "\$a == \$b : "; /*banding nilai var a dan b*/ var_dump($a == $b); echo "<br>"; //true karna var a dan b bernilai sama yaitu 100
echo "\$a === \$b : "; /*banding nilai dan tipe data var a dan b*/ var_dump($a === $b); echo "<br>"; //false karna var a dan b bernilai sama tetapi tipe datanya beda
echo "\$c == \$d : "; /*banding nilai var c dan d*/ var_dump($c == $d); echo "<br>"; //true karna false = 0 sedangkan true = 1 sehingga var c dan d bernilai sama
echo "\$c === \$d : "; /*banding nilai dan tipe data var c dan d*/ var_dump($c === $d); echo "<br>"; //false karena var c dan d bernilai sama tetapi tipe datanya beda
?>