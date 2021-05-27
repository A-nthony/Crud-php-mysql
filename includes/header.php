<?php
include("db.php");
$user='';

if (isset($_SESSION['user_id'])) {
  $id = $_SESSION['user_id'];
  $query = "SELECT * FROM usuarios WHERE id = '$id'";
  $result = $conn->query($query);
  if ($result->rowCount() == 1) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $user = $row['usuario'] ;

  }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Box Store</title>
    <link rel="icon" type="image/png" href="img/box.svg" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <!-- bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Awesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- SCROOLL REVEAL JS LIBRARY CDN -->
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a href="index.php" class="navbar-brand"><img src="img/box.svg" style="width: 30px; heigth: 30px;" class="me-2">Box Store</a>
        <form class="d-flex" method="post" action="index.php">

            <input name="search" class="form-control sm me-2" type="search" placeholder="Search" aria-label="Search" style="width:400px;">
            <button class="btn btn-outline-success" type="submit" >Search</button>


        </form>
        <div class="d-flex">

          <?php if (isset($_SESSION['user_id'])): ?>
            <span class="navbar-text text-white me-2"><i class="fas fa-user-circle me-2"></i><?= $user; ?></span>

            <?php if ($user == 'admin'): ?>
              <a href="carrito.php" class="btn btn-success me-2"><i class="fas fa-shopping-cart me-2"></i></a>
              <a href="add_prod.php" class="btn btn-success me-2"> <i class="fas fa-plus me-2"></i>Add Prod</a>
            <?php else: ?>
              <a href="carrito.php" class="btn btn-success me-2"><i class="fas fa-shopping-cart me-2"></i></a>
            <?php endif; ?>

            <a href="logout.php" class="btn btn-success">Logout</a>

          <?php else: ?>
            <a href="login.php" class="btn btn-success">Login</a>
          <?php endif; ?>

        </div>
    </nav>
