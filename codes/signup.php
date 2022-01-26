<?php
include "db.php";
include "action.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="assets/img/icon.png">
  <title>Farmer Market</title>

  <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/signup.css">

</head>

<body>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-success text-white">
      <div class="container">
        <a href="index.html" class="navbar-brand text-white fw-bold">Farmer
          Market</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle naviagation">
          <span class="navbar-toggler-icon"><img src="assets/img/menu.png"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle px-2 text-white" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="buah.html" class="dropdown-item">Buah</a></li>
                <li><a href="sayur.html" class="dropdown-item">Sayur</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="cart.html" class="nav-link active px-2 text-white"
                aria-current="page">Keranjang</a></li>
            <li class="nav-item"><a href="tips.html" class="nav-link px-2 text-white">Smart Tips</a></li>
            <li class="nav-item"><a href="contact.html" class="nav-link px-2 text-white">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <main class="form-signin mt-5 text-center">
    <form method="POST">
      <img class="mb-4" src="assets/img/icon.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

      <div class="form-floating">
        <input type="text" class="form-control bg-light" name="nama" id="nama" placeholder="Nama Lengkap">
        <label for="nama">Nama Lengkap</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control bg-light" name="mobile" id="mobile" placeholder="Nomor HP">
        <label for="mobile">Nomor HP</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control bg-light" name="address1" id="address1" placeholder="Alamat">
        <label for="address1">Alamat</label>
      </div>
      <div class="form-floating">
        <input type="text" class="form-control bg-light" name="address2" id="address2" placeholder="Kota">
        <label for="address2">Kota</label>
      </div>
      <div class="form-floating">
        <input type="email" class="form-control bg-light" name="email" id="email" placeholder="example@gmail.com">
        <label for="email">Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control bg-light" name="password" id="password" placeholder="Password">
        <label for="password">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" type="submit" name="signup">Sign Up</button>
    </form>
  </main>

<?php
include 'footer.php';
?>