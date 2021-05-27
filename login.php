<?php include("includes/header.php") ?>
<?php

if (isset($_POST['login'])) {
      $records = $conn->prepare('SELECT id, usuario, password FROM usuarios WHERE usuario = :email');
      $records->bindParam(':email', $_POST['email']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);

      if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        if ($results['usuario']==$results['password']) {
          $_SESSION['user_id'] = $results['id'];
          header("Location: add_prod.php");
        }else {
          $_SESSION['user_id'] = $results['id'];
          header("Location: index.php");
        }


      } else {
        $_SESSION['message'] = 'Las credenciales no coinciden.';
        $_SESSION['message_type'] = 'danger';
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
        <div class="card-header"><i class="fas fa-user-circle me-2"></i>
          Login
        </div>
        <div class="card-body">
          <form class="" action="" method="post">
            <div class="form-group">
              <div class="form-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Email" autofocus required>
              </div>
              <div class="form-group my-3">
                <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
              </div>
              <div class="d-grid gap-2">
                <input type="submit" name="login" value="Login" class="btn btn-success btn-block">

              </div>
            </div>
          </form>
        </div>
        <div class="card-footer text-muted">
          <span>No tienes cuenta? <a href="signup.php" class="card-link">Sign Up</a> </span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php") ?>
