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