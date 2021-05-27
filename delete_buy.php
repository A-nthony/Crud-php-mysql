<?php include("includes/header.php") ?>

<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM compras WHERE id = '$id'";
  $result = $conn->query($query);
  $row = $result->fetch(PDO::FETCH_ASSOC);
  $id_prod = $row['id_producto'];
  $cant = $row['cantidad'];

  $query = "UPDATE  producto SET stock_prod = stock_prod + '$cant' WHERE id = '$id_prod' ";
  $result = $conn->query($query);
  if (!$result) {
    $_SESSION['message'] = 'Error al actualizar stock de productos';
    $_SESSION['message_type'] = 'danger';
    die("Query Failed");
  }
  $query = "DELETE FROM compras WHERE id = '$id'";
  $result = $conn->query($query);
  if (!$result) {
    $_SESSION['message'] = 'Error al eliminar la compra';
    $_SESSION['message_type'] = 'danger';
    die("Query Failed");
  }else {

  }
  $_SESSION['message'] = 'Se elimino la compra';
  $_SESSION['message_type'] = 'danger';
  header("Location: carrito.php");



}

?>
