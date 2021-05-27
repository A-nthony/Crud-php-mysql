<?php include("includes/header.php") ?>

<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM producto WHERE id = '$id'";
  $result = $conn->query($query);
  if (!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'Producto eliminado con exito';
  $_SESSION['message_type'] = 'danger';

  header("Location: add_prod.php");

}

?>
