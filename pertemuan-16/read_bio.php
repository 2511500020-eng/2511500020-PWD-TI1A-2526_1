<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_dosen ORDER BY did DESC";
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
    <th>Kode Dosen</th>
    <th>Nama Dosen</th>
    <th>Alamat Rumah</th>
    <th>Tanggal Jadi Dosen</th>
    <th>JJA Dosen</th>
    <th>Nomor HP</th>
    <th>Prodi</th>
    <th>Pasangan</th>
    <th>Anak</th>
    <th>Bidang Ilmu Dosen</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit_bio.php?did=<?= (int)$row['did']; ?>">Edit</a>
        <a onclick="return confirm('Hapus Kode Dosen <?= htmlspecialchars($row['dkode']); ?>?')" href="proses_delete_bio.php?did=<?= (int)$row['did']; ?>">Delete</a>
      </td>
      <td><?= $row['did']; ?></td>
      <td><?= htmlspecialchars($row['dkode']); ?></td>
      <td><?= htmlspecialchars($row['dnama']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dalamat'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dtanggal'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['djja'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dprodi'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dnohp'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dpasangan'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['danak'])); ?></td>
      <td><?= nl2br(htmlspecialchars($row['dbilmu'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>