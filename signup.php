<?php include("includes/header.php") ?>

<?php

if (isset($_POST['signup'])) {
  
    $email = $_POST['email'];

    $queryS = "SELECT * FROM usuarios WHERE usuario = '$email'";
    $resultS = $conn->query($queryS);
    $row = $resultS->fetch(PDO::FETCH_ASSOC);
    if ($row['usuario'] == $email) {
      $_SESSION['message'] = 'Ya existe un usuario con ese email';
      $_SESSION['message_type'] = 'warning';
    } else {
      $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $query = "INSERT INTO usuarios (usuario, password) VALUES ('$email', '$pass')";
      $result = $conn->query($query);
      if (!$result) {
        die("Query Failed");
      }

      $_SESSION['message'] = 'Se registro con exito';
      $_SESSION['message_type'] = 'success';

      header("Location: login.php");
    }


}
?>




<div class="container p-5">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card text-center">
        <?php if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php unset($_SESSION['message']);  } ?>
        <div class="card-header"><i class="fas fa-user-plus me-2"></i>
          Sign Up
        </div>
        <div class="card-body">
          <form class="" action="" method="post">
            <div class="form-group">
              <div class="form-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" autofocus required>
              </div>
              <div class="form-group my-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              </div>
              <div class="d-grid gap-2">
                <input type="submit" name="signup" value="Sign Up" class="btn btn-success btn-block">
              </div>
            </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          <span>Ya tienes cuenta? <a href="login.php" class="card-link">Login</a> </span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>
