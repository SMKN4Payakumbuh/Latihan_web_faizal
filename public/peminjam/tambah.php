<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>tambah data peminjam</title>
</head>

<body>
  <h1>TAMBAH DATA</h1>

  <form action="" method="post">
    <table border="0" cellpadding="10" cellspacing="0">
      <tr>
        <td width="120">Nama peminjam </td>
        <td><input type="text" name="nama"></td>
      </tr>
      <tr>
        <td width="100">Tanggal pinjam</td>
        <td><input type="date" name="tanggalpinjam"></td>
      </tr>
      <tr>
        <td width="100">Tanggal kembali</td>
        <td><input type="date" name="tanggalkembali"></td>
      </tr>
      <tr>
        <td>nama buku</td>
        <td><select name="id_buku">
            <option>----</option>
            <?php
            include 'koneksi.php';
            $query = mysqli_query($koneksi, "select* from buku");
            while ($data = mysqli_fetch_array($query)) {
              echo "<option value= $data[id_buku] > $data[id_buku] - $data[namabuku]</option></option>";
            }

            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>status</td>
        <td><input type="text" name="status"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="simpan" name="proses"></td>
      </tr>
    </table>

    <a href="index.php">home</a>
  </form>

  <?php
  include 'koneksi.php';
  function tambah($data)
  {
    global $koneksi;
    $id_buku = htmlspecialchars($data['id_buku']);
    $nama = htmlspecialchars($data['nama']);
    $tanggalpinjam = ($data['tanggalpinjam']);
    $tanggalkembali = ($data['tanggalkembali']);
    $status = htmlspecialchars($data['status']);

    $query = "insert into peminjam
      values ('','$id_buku','$nama','$tanggalpinjam','$tanggalkembali','$status')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
  }
  if (isset($_POST['proses'])) {
    if (tambah($_POST) > 0) {
      echo "
            <script>
                alert('data berhasil di tambah kan!!');
                document.location.href = 'index.php';
            </script>
            ";
    } else {
      echo "
            <script>
                alert('data gagal di tambah kan!!');
                document.location.href = 'index.php';
            </script>
            ";
    }
  }

  ?>


</body>

</html>