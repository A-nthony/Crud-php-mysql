<?php include("includes/header.php") ?>


  <div class="container p-4">
    <div class="row">
      <div class="col-md-4">

        <?php if (isset($_SESSION['message'])) { ?>
          <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php unset($_SESSION['message']);  } ?>

        <div class="card card-body">
          <form class=" " action="save_products.php" method="post" enctype="multipart/form-data">
            <div class="form-group mb-3">
              <input type="text" name="name_prod" class="form-control" placeholder="Nombre del Producto" autofocus required>
            </div>
            <div class="form-group my-3">
              <textarea name="description" rows="2" class="form-control" placeholder="Descripción" required></textarea>
            </div>
            <div class="form-group my-3">
                  <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                    <select class="form-select" id="inputGroupSelect01" name="category">
                      <option selected>Seleccione una categoría</option>
                      <option value="Consumo Humano">Consumo Humano</option>
                      <option value="Electrodomesticos">Electronicos</option>
                      <option value="Electrodomesticos">Electrodomesticos</option>
                      <option value="Aseo personal">Aseo personal</option>
                      <option value="Otro">Otro</option>
                    </select>
                  </div>
            </div>
            <div class="form-group my-3">
              <input type="number" class="form-control" name="stock" min="1" placeholder="Stock" required>
            </div>
            <div class="form-group my-3">
              <div class="input-group">
                <span class="input-group-text">$</span>
              <input type="number" class="form-control" name="price" step="0.01" min="1" placeholder="Precio" required>
              <span class="input-group-text">.00</span>
            </div>

            </div>
            <div class="form-group my-3">
              <div class="mb-3">
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
              </div>
            </div>
            <div class="d-grid gap-2">
              <input type="submit" name="save_prod" value="Crear" class="btn btn-success btn-block">
            </div>
          </form>

        </div>
      </div>
      <div class="col-md-8">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Categoría</th>
              <th>Stock</th>
              <th>Precio</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-light">
            <?php
              $query = "SELECT * FROM producto";
              $result = $conn->query($query);
              while ( $row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                  <td><?php echo $row['nombre_prod'] ?></td>
                  <td><?php echo $row['descripcion_prod'] ?></td>
                  <td><?php echo $row['categoria_prod'] ?></td>
                  <td><?php echo $row['stock_prod'] ?></td>
                  <td><?php echo $row['precio_prod'] ?></td>
                  <td>
                    <a href="edit_products.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary btn-sm"> <i class="fas fa-marker"></i> </a>
                    <a href="delete_products.php?id=<?php echo $row['id'] ?>" class="btn btn-danger  btn-sm"> <i class="far fa-trash-alt"></i> </a>
                  </td>
                </tr>

             <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>


<?php include("includes/footer.php") ?>
