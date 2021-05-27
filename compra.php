<?php include("includes/header.php") ?>

<?php
if (!isset($_SESSION['user_id'])) {

    $_SESSION['message'] = 'Por favor inicie sesion para continuar';
    $_SESSION['message_type'] = 'warning';

}elseif (isset($_POST['carrito'])) {
  $id_prod = $_POST['id'];
  $id_user = $_SESSION['user_id'];
  $cant = $_POST['cantidad'];
  $precio = $_POST['precio_prod'];
  $total = (int)$cant * (int)$precio;
  $queryP = "UPDATE  producto SET stock_prod = stock_prod - '$cant' WHERE id = '$id_prod' ";
  $resultP = $conn->query($queryP);
  if (!$resultP) {
    $_SESSION['message'] = 'Error al Actualizar stock';
    $_SESSION['message_type'] = 'danger';
    die("Query Failed");
  }
  $query = "INSERT INTO compras (id_usuario, id_producto, cantidad, precio, total) VALUES ('$id_user','$id_prod','$cant','$precio','$total')";
  $result = $conn->query($query);
  if (!$result) {
    $_SESSION['message'] = 'Error al agregar al carrito';
    $_SESSION['message_type'] = 'danger';
    die("Query Failed");
  }

  $_SESSION['message'] = 'Agregado con exito al carrito';
  $_SESSION['message_type'] = 'success';
}

header("Location: index.php");

?>

<?php include("includes/footer.php") ?>
