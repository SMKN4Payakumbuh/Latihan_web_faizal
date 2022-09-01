<?php

include '../../config/function.php';


$id = $_GET["id"];

$databuku = query("SELECT * FROM buku WHERE id = $id")[0];



if (isset($_POST["submit"])) {

  if (update($_POST) > 0) {
    echo "
        <script>
            alert('data berhasil di update!!');
            document.location.href = '../../index.php';
        </script>
        ";
  } else {
    echo "
        <script>
            alert('data gagal di update kan!!');
            document.location.href = ../../index.php';
        </script>
        ";
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>Halaman edit Buku</title>
</head>

<body>
  <h1>Edit Data Buku</h1>

  <a href="../../index.php">Home</a>
  <form action="" method="post" name="editdata">
    <table border="1">
      <input type="hidden" name="id" value="<?= $databuku['id']; ?>">
      <tr>
        <td>Kode Buku</td>
        <td><input type="text" name="kodebuku" value="<?= $databuku['kodebuku']; ?>"></td>
      </tr>
      <tr>
        <td>Nama Buku</td>
        <td><input type="text" name="namabuku" value="<?= $databuku['namabuku']; ?>"></td>
      </tr>
      <tr>
        <td>kategori</td>
        <td><input type="text" name="kategori" value="<?= $databuku['kategori']; ?>"></td>
      </tr>
      <tr>
        <td>Penerbit</td>
        <td><input type="text" name="penerbit" value="<?= $databuku['penerbit']; ?>"></td>
      </tr>
      <tr>
        <td>Tahun Terbit</td>
        <td><input type="date" name="tahunterbit" value="<?= $databuku['tahunterbit']; ?>"></td>
      </tr>
      <tr>
        <td>Jumlah</td>
        <td><input type="int" name="jumlah" value="<?= $databuku['jumlah']; ?>"></td>
      </tr>
    </table>
    <input type="submit" name="submit" value="submit">
  </form>
</body>

</html>