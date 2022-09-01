<?php

session_start();
include_once '../../config/function.php';

if (isset($_POST['login'])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  //cek username

  if (mysqli_num_rows($result) === 1) {

    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      // set session 
      $_SESSION['login'] = true;
      header('location: ../../index.php');
      exit;
    }
  }

  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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

    .reg ul li {
      overflow: hidden;
    }
  </style>
</head>

<body>
  <h1 class="login" align="center">Login</h1>

  <?php if (isset($error)) :  ?>
    <p style="color: red; font-style: italic;" align="center">username / password salah</p>
  <?php endif; ?>

  <form class="form" action="" method="post">
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
        <button type="submit" name="login">Login</button> </button>
      </li>
    </ul>
  </form>
  <h3 align="center">belum punya akun buat disini!!</h3>
  <div class="reg">
    <ul>
      <li align="center"><a href="registrasi.php">Registrasi</a></li>
    </ul>
  </div>
  </div>
</body>

</html>