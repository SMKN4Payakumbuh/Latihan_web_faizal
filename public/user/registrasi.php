<?php

include_once '../../config/function.php';

if (isset($_POST["daftar"])) {

  if (daftar($_POST) > 0) {
    echo "<script>
  alert ('user baru berhasil di tambahkan');
  </script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Registrasi</title>
  <style>
    label {
      display: block;
    }

    .h2 {
      margin-top: 20px;
    }

    .form {
      padding-left: 25%;
    }

    .form ul li {
      overflow: hidden;
    }
  </style>
</head>

<body>

  <h1 class="h2" align="center">Halaman Registrasi</h1>

  <form class="form" action="" method="POST">
    <ul>
      <li>
        <label>
          Username :
        </label>
        <input type="text" name="username" id="username">
      </li>
      <li>
        <label>
          password :
        </label>
        <input type="password" name="password" id="password">
      </li>
      <li>
        <label>konfirmasi password :
        </label>
        <input type="password" name="password2" id="password2">
      </li>
      <li>
        <button type="submit" name="daftar">daftar </button>
      </li>
    </ul>
  </form>

  <h3 align="center">sudah punya akun login disini!!</h3>
  <div class="reg">
    <ul>
      <li align="center"><a href="login.php">Login</a></li>
    </ul>
  </div>
</body>

</html>