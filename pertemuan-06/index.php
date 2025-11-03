<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas PWD Pertemuan 5</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Ini Header</h1>
        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
            &#9776;
        </button>
        <nav>
            <ul>
                <li><a href="#home">Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="home">
            <h2>Selamat Datang! &#128512;</h2>
            <?php
                echo "Hello world!<br>";
                echo "Nama saya Widya";
            ?>
            <p>Ini contoh paragraf HTML.</p>
        </section>

        <section id="about">
            <?php
                $nim = 2511500020;
                $nama = "Widya Serena Mulyaputeri";
                $tempatLahir = "Pangkalpinang";
                $tanggalLahir = "10 September 2007";
                $hobi = "Menggambar";
                $pasangan = "Tidak ada";
                $pekerjaan = "Mahasiswa di ISB Atma Luhur prodi Teknik Informatika";
                $ortu = "Bapak Mulyadi dan Ibu Fong Siauw Yin";
                $namaKakak = "-";
                $namaAdik = "Nelsia Fadia Mulyaputeri";
            ?>
            <h2>Tentang Saya</h2>
            <p><strong>NIM:</strong>
                <?php
                    echo $nim;
                ?>
            </p>
            <p><strong>Nama Lengkap:</strong>
                <?php
                    echo $nama;
                ?>
            </p>
            <p><strong>Tempat Lahir:</strong>
                <?php
                    echo $tempatLahir;
                ?>
            </p>
            <p><strong>Tanggal Lahir:</strong>
                <?php
                    echo $tanggalLahir;
                ?>
            </p>
            <p><strong>Hobi:</strong>
                <?php
                    echo $hobi;
                ?>
            </p>
            <p><strong>Pasangan:</strong>
                <?php
                    echo $pasangan;
                ?>
            </p>
            <p><strong>Pekerjaan:</strong>
                <?php
                    echo $pekerjaan;
                ?>
            </p>
            <p><strong>Nama Orang Tua:</strong>
                <?php
                    echo $ortu;
                ?>
            </p>
            <p><strong>Nama Kakak:</strong>
                <?php
                    echo $namaKakak;
                ?>
            </p>
            <p><strong>Nama Adik:</strong>
                <?php
                    echo $namaAdik;
                ?>
            </p>
        </section>

    <section id="ipk">
        <?php
            $namaMatkul1 = "Kalkulus";
            $namaMatkul2 = "Logika Informatika";
            $namaMatkul3 = "Pengantar Teknik Informatika";
            $namaMatkul4 = "Aplikasi Perkantoran";
            $namaMatkul5 = "Konsep Basis Data";
            $sksMatkul1 = 3;
            $sksMatkul2 = 3;
            $sksMatkul3 = 3;
            $sksMatkul4 = 3;
            $sksMatkul5 = 3;
            $nilaiHadir1 = 100;
            $nilaiHadir2 = 100;
            $nilaiHadir3 = 100;
            $nilaiHadir4 = 100;
            $nilaiHadir5 = 100;
            $nilaiTugas1 = 90;
            $nilaiTugas2 = 70;
            $nilaiTugas3 = 90;
            $nilaiTugas4 = 80;
            $nilaiTugas5 = 90;
            $nilaiUTS1 = 85;
            $nilaiUTS2 = 75;
            $nilaiUTS3 = 90;
            $nilaiUTS4 = 80;
            $nilaiUTS5 = 95;
            $nilaiUAS1 = 90;
            $nilaiUAS2 = 70;
            $nilaiUAS3 = 90;
            $nilaiUAS4 = 75;
            $nilaiUAS5 = 90;

            $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1);
            $nilaiAkhir2 = (0.1 * $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
            $nilaiAkhir3 = (0.1 * $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3);
            $nilaiAkhir4 = (0.1 * $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
            $nilaiAkhir5 = (0.1 * $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);

            if ($nilaiHadir1 < 70) {
                $grade1 = "E";
            }
            else {
                if ($nilaiAkhir1 >= 0) {
                    $grade1 = "E";
                    $mutu1 = 0.00;
                    $status1 = "Gagal";
                }
                if ($nilaiAkhir1 >= 36) {
                    $grade1 = "D";
                    $mutu1 = 1.00;
                    $status1 = "Gagal";
                }
                if ($nilaiAkhir1 >= 51) {
                    $grade1 = "C-";
                    $mutu1 = 1.700;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 56) {
                    $grade1 = "C";
                    $mutu1 = 2.00;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 61) {
                    $grade1 = "C+";
                    $mutu1 = 2.30;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 66) {
                    $grade1 = "B-";
                    $mutu1 = 2.70;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 71) {
                    $grade1 = "B";
                    $mutu1 = 3.00;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 76) {
                    $grade1 = "B+";
                    $mutu1 = 3.30;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 81) {
                    $grade1 = "A-";
                    $mutu1 = 3.70;
                    $status1 = "Lulus";
                }
                if ($nilaiAkhir1 >= 91) {
                    $grade1 = "A";
                    $mutu1 = 4.00;
                    $status1 = "Lulus";
                }
            }

            if ($nilaiHadir2 < 70) {
                $grade2 = "E";
            }
            else {
                if ($nilaiAkhir2 >= 0) {
                    $grade2 = "E";
                    $mutu2 = 0.00;
                    $status2 = "Gagal";
                }
                if ($nilaiAkhir2 >= 36) {
                    $grade2 = "D";
                    $mutu2 = 1.00;
                    $status2 = "Gagal";
                }
                if ($nilaiAkhir2 >= 51) {
                    $grade2 = "C-";
                    $mutu2 = 1.700;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 56) {
                    $grade2 = "C";
                    $mutu2 = 2.00;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 61) {
                    $grade2 = "C+";
                    $mutu2 = 2.30;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 66) {
                    $grade2 = "B-";
                    $mutu2 = 2.70;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 71) {
                    $grade2 = "B";
                    $mutu2 = 3.00;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 76) {
                    $grade2 = "B+";
                    $mutu2 = 3.30;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 81) {
                    $grade2 = "A-";
                    $mutu2 = 3.70;
                    $status2 = "Lulus";
                }
                if ($nilaiAkhir2 >= 91) {
                    $grade2 = "A";
                    $mutu2 = 4.00;
                    $status2 = "Lulus";
                }
            }

            if ($nilaiHadir3 < 70) {
                $grade3 = "E";
            }
            else {
                if ($nilaiAkhir3 >= 0) {
                    $grade3 = "E";
                    $mutu3 = 0.00;
                    $status3 = "Gagal";
                }
                if ($nilaiAkhir3 >= 36) {
                    $grade3 = "D";
                    $mutu3 = 1.00;
                    $status3 = "Gagal";
                }
                if ($nilaiAkhir3 >= 51) {
                    $grade3 = "C-";
                    $mutu3 = 1.700;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 56) {
                    $grade3 = "C";
                    $mutu3 = 2.00;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 61) {
                    $grade3 = "C+";
                    $mutu3 = 2.30;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 66) {
                    $grade3 = "B-";
                    $mutu3 = 2.70;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 71) {
                    $grade3 = "B";
                    $mutu3 = 3.00;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 76) {
                    $grade3 = "B+";
                    $mutu3 = 3.30;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 81) {
                    $grade3 = "A-";
                    $mutu3 = 3.70;
                    $status3 = "Lulus";
                }
                if ($nilaiAkhir3 >= 91) {
                    $grade3 = "A";
                    $mutu3 = 4.00;
                    $status3 = "Lulus";
                }
            }

            if ($nilaiHadir4 < 70) {
                $grade4 = "E";
            }
            else {
                if ($nilaiAkhir4 >= 0) {
                    $grade4 = "E";
                    $mutu4 = 0.00;
                    $status4 = "Gagal";
                }
                if ($nilaiAkhir4 >= 36) {
                    $grade4 = "D";
                    $mutu4 = 1.00;
                    $status4 = "Gagal";
                }
                if ($nilaiAkhir4 >= 51) {
                    $grade4 = "C-";
                    $mutu4 = 1.700;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 56) {
                    $grade4 = "C";
                    $mutu4 = 2.00;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 61) {
                    $grade4 = "C+";
                    $mutu4 = 2.30;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 66) {
                    $grade4 = "B-";
                    $mutu4 = 2.70;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 71) {
                    $grade4 = "B";
                    $mutu4 = 3.00;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 76) {
                    $grade4 = "B+";
                    $mutu4 = 3.30;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 81) {
                    $grade4 = "A-";
                    $mutu4 = 3.70;
                    $status4 = "Lulus";
                }
                if ($nilaiAkhir4 >= 91) {
                    $grade4 = "A";
                    $mutu4 = 4.00;
                    $status4 = "Lulus";
                }
            }

            if ($nilaiHadir5 < 70) {
                $grade5 = "E";
            }
            else {
                if ($nilaiAkhir5 >= 0) {
                    $grade5 = "E";
                    $mutu5 = 0.00;
                    $status5 = "Gagal";
                }
                if ($nilaiAkhir5 >= 36) {
                    $grade5 = "D";
                    $mutu5 = 1.00;
                    $status5 = "Gagal";
                }
                if ($nilaiAkhir5 >= 51) {
                    $grade5 = "C-";
                    $mutu5 = 1.700;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 56) {
                    $grade5 = "C";
                    $mutu5 = 2.00;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 61) {
                    $grade5 = "C+";
                    $mutu5 = 2.30;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 66) {
                    $grade5 = "B-";
                    $mutu5 = 2.70;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 71) {
                    $grade5 = "B";
                    $mutu5 = 3.00;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 76) {
                    $grade5 = "B+";
                    $mutu5 = 3.30;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 81) {
                    $grade5 = "A-";
                    $mutu5 = 3.70;
                    $status5 = "Lulus";
                }
                if ($nilaiAkhir5 >= 91) {
                    $grade5 = "A";
                    $mutu5 = 4.00;
                    $status5 = "Lulus";
                }
            }

            $bobot1 = $mutu1 * $sksMatkul1;
            $bobot2 = $mutu2 * $sksMatkul2;
            $bobot3 = $mutu3 * $sksMatkul3;
            $bobot4 = $mutu4 * $sksMatkul4;
            $bobot5 = $mutu5 * $sksMatkul5;

            $totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
            $totalSKS = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
            $IPK = $totalBobot / $totalSKS;
        ?>

        <h2>Nilai Saya</h2>
        <p><strong>Nama Matakuliah ke-1:</strong>
            <?php
                echo $namaMatkul1;
            ?>
        </p>
        <p><strong>SKS:</strong>
            <?php
                echo $sksMatkul1;
            ?>
        </p>
        <p><strong>Kehadiran:</strong>
            <?php
                echo $nilaiHadir1;
            ?>
        </p>
        <p><strong>Tugas:</strong>
            <?php
                echo $nilaiTugas1;
            ?>
        </p>
        <p><strong>UTS:</strong>
            <?php
                echo $nilaiUTS1;
            ?>
        </p>
        <p><strong>UAS:</strong>
            <?php
                echo $nilaiUAS1;
            ?>
        </p>
        <p><strong>Nilai Akhir:</strong>
            <?php
                echo $nilaiAkhir1;
            ?>
        </p>
        <p><strong>Grade:</strong>
            <?php
                echo $grade1;
            ?>
        </p>
        <p><strong>Angka Mutu:</strong>
            <?php
                echo $mutu1;
            ?>
        </p>
        <p><strong>Bobot:</strong>
            <?php
                echo $bobot1;
            ?>
        </p>
        <p><strong>Status:</strong>
            <?php
                echo $status1;
            ?>
        </p>

        <hr>

        <p><strong>Nama Matakuliah ke-2:</strong>
            <?php
                echo $namaMatkul2;
            ?>
        </p>
        <p><strong>SKS:</strong>
            <?php
                echo $sksMatkul2;
            ?>
        </p>
        <p><strong>Kehadiran:</strong>
            <?php
                echo $nilaiHadir2;
            ?>
        </p>
        <p><strong>Tugas:</strong>
            <?php
                echo $nilaiTugas2;
            ?>
        </p>
        <p><strong>UTS:</strong>
            <?php
                echo $nilaiUTS2;
            ?>
        </p>
        <p><strong>UAS:</strong>
            <?php
                echo $nilaiUAS2;
            ?>
        </p>
        <p><strong>Nilai Akhir:</strong>
            <?php
                echo $nilaiAkhir2;
            ?>
        </p>
        <p><strong>Grade:</strong>
            <?php
                echo $grade2;
            ?>
        </p>
        <p><strong>Angka Mutu:</strong>
            <?php
                echo $mutu2;
            ?>
        </p>
        <p><strong>Bobot:</strong>
            <?php
                echo $bobot2;
            ?>
        </p>
        <p><strong>Status:</strong>
            <?php
                echo $status2;
            ?>
        </p>

        <hr>

        <p><strong>Nama Matakuliah ke-3:</strong>
            <?php
                echo $namaMatkul3;
            ?>
        </p>
        <p><strong>SKS:</strong>
            <?php
                echo $sksMatkul3;
            ?>
        </p>
        <p><strong>Kehadiran:</strong>
            <?php
                echo $nilaiHadir3;
            ?>
        </p>
        <p><strong>Tugas:</strong>
            <?php
                echo $nilaiTugas3;
            ?>
        </p>
        <p><strong>UTS:</strong>
            <?php
                echo $nilaiUTS3;
            ?>
        </p>
        <p><strong>UAS:</strong>
            <?php
                echo $nilaiUAS3;
            ?>
        </p>
        <p><strong>Nilai Akhir:</strong>
            <?php
                echo $nilaiAkhir3;
            ?>
        </p>
        <p><strong>Grade:</strong>
            <?php
                echo $grade3;
            ?>
        </p>
        <p><strong>Angka Mutu:</strong>
            <?php
                echo $mutu3;
            ?>
        </p>
        <p><strong>Bobot:</strong>
            <?php
                echo $bobot3;
            ?>
        </p>
        <p><strong>Status:</strong>
            <?php
                echo $status3;
            ?>
        </p>

        <hr>

        <p><strong>Nama Matakuliah ke-4:</strong>
            <?php
                echo $namaMatkul4;
            ?>
        </p>
        <p><strong>SKS:</strong>
            <?php
                echo $sksMatkul4;
            ?>
        </p>
        <p><strong>Kehadiran:</strong>
            <?php
                echo $nilaiHadir4;
            ?>
        </p>
        <p><strong>Tugas:</strong>
            <?php
                echo $nilaiTugas4;
            ?>
        </p>
        <p><strong>UTS:</strong>
            <?php
                echo $nilaiUTS4;
            ?>
        </p>
        <p><strong>UAS:</strong>
            <?php
                echo $nilaiUAS4;
            ?>
        </p>
        <p><strong>Nilai Akhir:</strong>
            <?php
                echo $nilaiAkhir4;
            ?>
        </p>
        <p><strong>Grade:</strong>
            <?php
                echo $grade4;
            ?>
        </p>
        <p><strong>Angka Mutu:</strong>
            <?php
                echo $mutu4;
            ?>
        </p>
        <p><strong>Bobot:</strong>
            <?php
                echo $bobot4;
            ?>
        </p>
        <p><strong>Status:</strong>
            <?php
                echo $status4;
            ?>
        </p>

        <hr>
        
        <p><strong>Nama Matakuliah ke-5:</strong>
            <?php
                echo $namaMatkul5;
            ?>
        </p>
        <p><strong>SKS:</strong>
            <?php
                echo $sksMatkul5;
            ?>
        </p>
        <p><strong>Kehadiran:</strong>
            <?php
                echo $nilaiHadir5;
            ?>
        </p>
        <p><strong>Tugas:</strong>
            <?php
                echo $nilaiTugas5;
            ?>
        </p>
        <p><strong>UTS:</strong>
            <?php
                echo $nilaiUTS5;
            ?>
        </p>
        <p><strong>UAS:</strong>
            <?php
                echo $nilaiUAS5;
            ?>
        </p>
        <p><strong>Nilai Akhir:</strong>
            <?php
                echo $nilaiAkhir5;
            ?>
        </p>
        <p><strong>Grade:</strong>
            <?php
                echo $grade5;
            ?>
        </p>
        <p><strong>Angka Mutu:</strong>
            <?php
                echo $mutu5;
            ?>
        </p>
        <p><strong>Bobot:</strong>
            <?php
                echo $bobot5;
            ?>
        </p>
        <p><strong>Status:</strong>
            <?php
                echo $status5;
            ?>
        </p>

        <hr>

        <p><strong>Total Bobot:</strong>
            <?php
                echo $totalBobot;
            ?>
        </p>
        <p><strong>Total SKS:</strong>
            <?php
                echo $totalSKS;
            ?>
        </p>
        <p><strong>IPK:</strong>
            <?php
                echo $IPK;
            ?>
        </p>
    </section>

        <section id="contact">
            <h2>Kontak Kami</h2>
            <form action="" method="GET">
                <label for="txtNama">
                    <span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
                </label>

                <label for="txtEmail">
                    <span>Email:</span>
                    <input type="text" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
                </label>

                <label for="txtPesan">
                    <span>Pesan:</span>
                    <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
                    <small id="charCount">0/200 karakter</small>
                </label>

                <div class="button">
                    <button type="reset">Batal</button>
                    <button type="submit">Kirim</button>
                </div>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Widya Serena Mulyaputeri [2511500020]</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>