<?php
    include 'action.php';
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
</head>

<body>
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg bg-success text-white">
      <div class="container">
        <a href="index.php" class="navbar-brand text-white fw-bold">Farmer
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
                <li><a href="buah.php" class="dropdown-item">Buah</a></li>
                <li><a href="sayur.php" class="dropdown-item">Sayur</a></li>
              </ul>
            </li>
            <li class="nav-item"><a href="cart.php" class="nav-link active px-2 text-white"
                aria-current="page">Keranjang</a></li>
            <li class="nav-item"><a href="tips.php" class="nav-link px-2 text-white">Smart Tips</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link px-2 text-white">Contact</a></li>
          </ul>

          <form class="d-flex" action="store.php" method="GET">
            <input type="search" class="form-control form-control-dark me-2 mb-auto" name="search" placeholder="Search..."
              aria-label="search">
          </form>

          <div class="d-flex justify-content-center">
            <?php
            include 'db.php';
            if(isset($_SESSION["uid"])){
              $sql = "SELECT nama FROM user WHERE user_id='$_SESSION[uid]'";
              $query = mysqli_query($con,$sql);
              $row=mysqli_fetch_array($query);

              echo '
              <div class="dropdown">
                <a href="#" class="nav-link dropdown-toggle px-2 text-white" id="profileDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">Hi, '.$row["nama"].'</a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                  <li><a href="#" class="dropdown-item">Profile</a></li>
                  <li><a href="logout.php" class="dropdown-item">Logout</a></li>
                </ul>
              </div>
              ';
            } else {
              echo '
              <a href="login.php" class="btn btn-outline-light me-2">Login</a>
              <a href="signup.php" class="btn btn-warning">Sign Up</a>
              ';
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>