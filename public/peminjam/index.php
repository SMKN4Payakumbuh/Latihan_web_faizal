  <?php
  include 'koneksi.php';

  $query = mysqli_query($koneksi, "select buku.id_buku,buku.kodebuku,buku.namabuku,peminjam.nama,peminjam.tanggalpinjam,peminjam.status 
                from buku inner join peminjam on buku.id_buku = peminjam.id_buku 
        ");
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data peminjam</title>
  </head>

  <body>
    <h1>Data Peminjam</h1>

    <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>NO</th>
        <th>Kode Buku</th>
        <th>Nama Buku</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Pinjam</th>
        <th>Status</th>
      </tr>
      <?php $i = 1 ?>
      <?php while ($data = mysqli_fetch_array($query)) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?= $data['kodebuku']; ?></td>
          <td><?= $data['namabuku']; ?></td>
          <td><?= $data['nama']; ?></td>
          <td><?= $data['tanggalpinjam']; ?></td>
          <td><?= $data['status']; ?></td>
        </tr>
      <?php endwhile; ?>

    </table>

  </body>

  </html>