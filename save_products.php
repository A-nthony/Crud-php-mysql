<?php include("includes/header.php") ?>
<?php

if (isset($_POST['save_prod'])) {
  $name_prod = $_POST['name_prod'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $stock = $_POST['stock'];
  $price = $_POST['price'];

    $imagen = $_FILES['image']['tmp_name'];
    $imgContenido = addslashes(file_get_contents($imagen));

    $query = "INSERT INTO producto (nombre_prod, descripcion_prod, categoria_prod, stock_prod, precio_prod, img) VALUES ('$name_prod', '$description', '$category', '$stock', '$price', '$imgContenido')";


    $result = $conn->query($query);

    if (!$result) {
      $_SESSION['message'] = 'Error al crear producto';
      $_SESSION['message_type'] = 'danger';
      die("Query Failed");
    }

    $_SESSION['message'] = 'Producto creado con exito';
    $_SESSION['message_type'] = 'success';

    header("Location: add_prod.php");



}
 ?>
