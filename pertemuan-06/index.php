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
            $nilaiTugas2 = 80;
            $nilaiTugas3 = 90;
            $nilaiTugas4 = 85;
            $nilaiTugas5 = 90;
            $nilaiUTS1 = 85;
            $nilaiUTS2 = 80;
            $nilaiUTS3 = 90;
            $nilaiUTS4 = 95;
            $nilaiUTS5 = 95;
            $nilaiUAS1 = 90;
            $nilaiUAS2 = 85;
            $nilaiUAS3 = 90;
            $nilaiUAS4 = 80;
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
                    $status1 = "GAGAL";
                }
                if ($nilaiAkhir1 >= 36) {
                    $grade1 = "D";
                    $mutu1 = 1.00;
                    $status1 = "GAGAL";
                }
                if ($nilaiAkhir1 >= 51) {
                    $grade1 = "C-";
                    $mutu1 = 1.700;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 56) {
                    $grade1 = "C";
                    $mutu1 = 2.00;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 61) {
                    $grade1 = "C+";
                    $mutu1 = 2.30;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 66) {
                    $grade1 = "B-";
                    $mutu1 = 2.70;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 71) {
                    $grade1 = "B";
                    $mutu1 = 3.00;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 76) {
                    $grade1 = "B+";
                    $mutu1 = 3.30;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 81) {
                    $grade1 = "A-";
                    $mutu1 = 3.70;
                    $status1 = "LULUS";
                }
                if ($nilaiAkhir1 >= 91) {
                    $grade1 = "A";
                    $mutu1 = 4.00;
                    $status1 = "LULUS";
                }
            }

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
         <p><strong>STATUS:</strong>
            <?php
                echo $status1;
            ?>
        </p>

            <hr>

        
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