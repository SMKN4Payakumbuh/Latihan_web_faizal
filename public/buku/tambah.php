<?php

include '../../config/function.php';

if (isset($_POST["submit"])) {

  if (tambah($_POST) > 0) {
    echo "
        <script>
            alert('data berhasil di tambah kan!!');
            document.location.href = '../../index.php';
        </script>
        ";
  } else {
    echo "
        <script>
            alert('data gagal di tambah kan!!');
            document.location.href = ../../index.php';
        </script>
        ";
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>Halaman Tambah Buku</title>
</head>

<body>
  <h1>Tambah Data Buku</h1>

  <a href="../../index.php">Home</a>

  <form action="" method="post">
    <table border="1">
      <tr>
        <td>Kode Buku</td>
        <td><input type="text" name="kodebuku"></td>
      </tr>
      <tr>
        <td>Nama Buku</td>
        <td><input type="text" name="namabuku"></td>
      </tr>
      <tr>
        <td>kategori</td>
        <td><input type="text" name="kategori"></td>
      </tr>
      <tr>
        <td>Penerbit</td>
        <td><input type="text" name="penerbit"></td>
      </tr>
      <tr>
        <td>Tahun Terbit</td>
        <td><input type="date" name="tahunterbit"></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td><input type="int" name="jumlah"></td>
      </tr>
      <ul>
        <li>
          <button type="submit" name="submit">Tambah data</button>
        </li>
      </ul>
    </table>
  </form>
</body>

</html>