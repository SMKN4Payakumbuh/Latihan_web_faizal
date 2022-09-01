<?php

// koneksi ke database 
$conn = mysqli_connect('localhost', 'root', '', 'db_buku');


function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data)
{
  global $conn;
  $kodebuku = htmlspecialchars($data['kodebuku']);
  $namabuku = htmlspecialchars($data['namabuku']);
  $kategori = htmlspecialchars($data['kategori']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahunterbit = htmlspecialchars($data['tahunterbit']);
  $jumlah = htmlspecialchars($data['jumlah']);

  $query = "insert into buku
                  values 
              ('','$kodebuku','$namabuku','$kategori','$penerbit','$tahunterbit',
              '$jumlah')";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE id= $id");

  return  mysqli_affected_rows($conn);
}

function update($data)
{
  global $conn;
  global $id;
  $id = $data['id'];
  $kodebuku = htmlspecialchars($data['kodebuku']);
  $namabuku = htmlspecialchars($data['namabuku']);
  $kategori = htmlspecialchars($data['kategori']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahunterbit = htmlspecialchars($data['tahunterbit']);
  $jumlah = htmlspecialchars($data['jumlah']);

  $query = "update buku set 
            kodebuku = '$kodebuku',
            namabuku = '$namabuku',
            kategori = '$kategori',
            penerbit = '$penerbit',
            tahunterbit = '$tahunterbit',
            jumlah = '$jumlah'
            where id = $id
      ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  global $conn;
  $query = "select * from buku where
                   namabuku like '%$keyword%' or
                   kodebuku like '%$keyword%' or
                   kategori like '%$keyword%' or
                   penerbit like '%$keyword%'
  ";

  return query($query);
}


function daftar($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  //cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>alert ('username sudah terdaftar!')</script>";
    return false;
  }

  //cek konfirmasi password

  if ($password !== $password2) {
    echo "<script>
    alert ('konfirmasi password tidak sesuai')
    </script>";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user baru ke database 
  mysqli_query($conn, "INSERT INTO user VALUES ('', '$username','$password'  )");

  return mysqli_affected_rows($conn);
}
