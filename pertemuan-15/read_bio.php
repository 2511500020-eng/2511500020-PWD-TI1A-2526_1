<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_biodata ORDER BY id DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses_bio = $_SESSION['flash_sukses_bio'] ?? ''; #jika query sukses
  $flash_error_bio  = $_SESSION['flash_error_bio'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses_bio'], $_SESSION['flash_error_bio']); 
?>

<?php if (!empty($flash_sukses_bio)): ?>
  <div style="padding:10px; margin-bottom:10px; 
    background:#d4edda; color:#155724; border-radius:6px;">
    <?= $flash_sukses_bio; ?>
  </div>
<?php endif; ?>

<?php if (!empty($flash_error_bio)): ?>
  <div style="padding:10px; margin-bottom:10px; 
    background:#f8d7da; color:#721c24; border-radius:6px;">
    <?= $flash_error_bio; ?>
  </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>ID</th>
    <th>NIM</th>
    <th>Nama Lengkap</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Orang Tua</th>
    <th>Kakak</th>
    <th>Adik</th>
    <th>Waktu Dibuat</th>
    <th>Terakhir Diubah</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_bio.php?id=<?= (int)$row['id']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['nim']); ?>?')" href="proses_delete_bio.php?id=<?= (int)$row['id']; ?>">Delete</a>
      </td>
      <td><?= $row['id']; ?></td>
      <td><?= htmlspecialchars($row['nim']); ?></td>
      <td><?= htmlspecialchars($row['namalengkap']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['tempat'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['tanggal'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['hobi'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['pasangan'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['pekerjaan'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['ortu'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['kakak'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['adik'])); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['waktu_buat'])); ?></td>
      <td><?= formatTanggal(htmlspecialchars($row['waktu_ubah'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>