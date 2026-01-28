<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_pengunjung ORDER BY pid DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses_pengunjung = $_SESSION['flash_sukses_pengunjung'] ?? ''; #jika query sukses
  $flash_error_pengunjung  = $_SESSION['flash_error_pengunjung'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses_pengunjung'], $_SESSION['flash_error_pengunjung']); 
?>

<?php if (!empty($flash_sukses_pengunjung)): ?>
  <div style="padding:10px; margin-bottom:10px; 
    background:#d4edda; color:#155724; border-radius:6px;">
    <?= $flash_sukses_pengunjung; ?>
  </div>
<?php endif; ?>

<?php if (!empty($flash_error_pengunjung)): ?>
  <div style="padding:10px; margin-bottom:10px; 
    background:#f8d7da; color:#721c24; border-radius:6px;">
    <?= $flash_error_pengunjung; ?>
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
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_bio.php?pid=<?= (int)$row['pid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['pkode']); ?>?')" href="proses_delete_bio.php?pid=<?= (int)$row['pid']; ?>">Delete</a>
      </td>
      <td><?= $row['pid']; ?></td>
      <td><?= htmlspecialchars($row['pkode']); ?></td>
      <td><?= htmlspecialchars($row['pnama']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['ptempat'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['ptanggal'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['phobi'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['ppasangan'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['ppekerjaan'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['portu'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['pkakak'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['padik'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>