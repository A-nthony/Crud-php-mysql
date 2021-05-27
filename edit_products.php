<?php include("includes/header.php") ?>

<?php

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM producto WHERE id = '$id'";
  $result = $conn->query($query);
  if ($result->rowCount() == 1) {
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $name = $row['nombre_prod'] ;
    $description = $row['descripcion_prod'] ;
    $category = $row['categoria_prod'] ;
    $stock = $row['stock_prod'] ;
    $price = $row['precio_prod'] ;
  }
}

if (isset($_POST['update_prod'])) {
  $id = $_GET['id'];
  $name_prod = $_POST['name_prod'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $stock = $_POST['stock'];
  $price = $_POST['price'];
  $query = "UPDATE  producto SET nombre_prod = '$name_prod', descripcion_prod = '$description', categoria_prod = '$category', stock_prod = '$stock', precio_prod = '$price' WHERE id = '$id' ";
  $result = $conn->query($query);
  if (!$result) {
    die("Query Failed");
  }

  $_SESSION['message'] = 'Producto actualizado con exito';
  $_SESSION['message_type'] = 'info';

  header("Location: add_prod.php");
}



?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form class="" action="edit_products.php?id= <?php echo $_GET['id']; ?>" method="post">
          <div class="form-group">
            <div class="form-group mb-3">
              <input type="text" name="name_prod" class="form-control" placeholder="Nombre del Producto"  value="<?php echo $name; ?>" autofocus>
            </div>
            <div class="form-group my-3">
              <textarea name="description" rows="2" class="form-control" placeholder="Descripción" > <?php echo $description; ?> </textarea>
            </div>
            <div class="form-group my-3">
              <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                <select class="form-select" id="inputGroupSelect01" name="category" >
                  <option selected><?php echo $category;?></option>
                  <option value="Consumo Humano">Consumo Humano</option>
                  <option value="Electrodomesticos">Electrodomesticos</option>
                  <option value="Aseo personal">Aseo personal</option>
                  <option value="Otro">Otro</option>
                </select>
              </div>
            </div>
            <div class="form-group my-3">
              <div class="input-group">
                <span class="input-group-text">Stock: </span>
                <input type="number" class="form-control" name="stock" min="1" placeholder="Stock" value="<?php echo $stock; ?>">
              </div>
            </div>
            <div class="form-group my-3">
              <div class="input-group">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" name="price" step="0.01" min="1" placeholder="Precio" value="<?php echo $price; ?>">
                <span class="input-group-text">.00</span>
              </div>
            </div>
            <div class="form-group my-3">
              <div class="mb-3">
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
              </div>
            </div>
            <div class="d-grid gap-2">
              <input type="submit" name="update_prod" value="Actualizar" class="btn btn-success btn-block">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include("includes/footer.php") ?>
