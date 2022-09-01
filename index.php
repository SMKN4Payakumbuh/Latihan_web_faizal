<?php

session_start();

if (!isset($_SESSION["login"])) {
  header("location: public/user/login.php");
  exit;
}
include_once 'config/function.php';

$data = query("select * from buku ");

if (isset($_POST["cari"])) {
  $data = cari($_POST["keyword"]);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <h1>Data Buku</h1>

  <span><a href="public/buku/tambah.php">Tambah Data</a></span>
  <br><br>
  <form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
  </form>
  <br>
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>NO</th>
      <th>Kode Buku</th>
      <th>Nama Buku</th>
      <th>Kategori</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Jumlah</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($data as $row) : ?>
      <tr>
        <td><?= $i++; ?></td>
        <td><?= $row['kodebuku']; ?></td>
        <td><?= $row['namabuku']; ?></td>
        <td><?= $row['kategori']; ?></td>
        <td><?= $row['penerbit']; ?></td>
        <td><?= $row['tahunterbit']; ?></td>
        <td><?= $row['jumlah']; ?></td>
        <td>
          <a href="public/buku/edit.php?id=<?= $row['id']; ?>">Edit</a> |
          <a href="public/buku/hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('yakin?')">Hapus</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>

  <a href="public/user/login.php">Logout</a>

</body>

</html>