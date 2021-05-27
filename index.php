<?php include("includes/header.php") ?>

<div class="container p-4">
  <?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['message'] ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php unset($_SESSION['message']);  } ?>

  <div class="row row-cols-4">
    <?php if (isset($_POST['search'])): ?>
      <?php
      $q = $_POST['search'];
      $query = "SELECT * FROM producto WHERE stock_prod > 0  AND (nombre_prod LIKE '%$q%' OR descripcion_prod LIKE '%$q%' OR categoria_prod LIKE '%$q%')";
      $result = $conn->query($query);
      if ($result->fetchColumn() > 0) {
      while ( $row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col text-center mb-2">
          <div class="card" style="width: 17rem;">
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" alt="image" width="304" height="236">
            <form class="" action="compra.php" method="post">
              <input type="hidden" class="form-control" name="id"  value="<?php echo $row['id'] ?>">
              <div class="card-body">
                <input type="text" class="form-control mb-2"  name="nombre_prod"  readonly value="<?php echo $row['nombre_prod'] ?>">
                <textarea name="descripcion_prod" rows="1" class="form-control"   readonly ><?php echo $row['descripcion_prod'] ?></textarea>

              </div>
              <ul class="list-group list-group-flush">

                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">Stock:</span>
                    <input type="text"  name="stock_prod" class="form-control"  readonly value="<?php echo $row['stock_prod'] ?>">
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">Cantidad:</span>
                    <input type="number" class="form-control" min="1" max="<?php echo $row['stock_prod'] ?>" required name="cantidad" >
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text"  name="precio_prod" class="form-control"  readonly value="<?php echo $row['precio_prod'] ?>">
                    <span class="input-group-text">.00</span>
                  </div>
                </li>
              </ul>
              <div class="card-body">
                <button type="submit" class="btn btn-primary" name="carrito"><i class="fas fa-shopping-cart me-2"></i>Agregar al carrito</button>
              </div>
            </form>

          </div>
        </div>
      <?php }}else { ?>
        <div class="alert alert-secondary col-md-9 mx-auto" role="alert">
          <img src="img/nopuedeser.png" class="card-img-top" alt="img">
          <h4 class="alert-heading">Lo sentimos! :c</h4>
          <p>El producto que busca no se encuentra en Stock</p>
          <hr>
          <p class="mb-0">Vuelva pronto</p>
        </div>

      <?php } ?>
    <?php else: ?>
      <?php
      $query = "SELECT * FROM producto WHERE stock_prod > 0";
      $result = $conn->query($query);
      while ( $row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col text-center mb-2">
          <div class="card" style="width: 17rem;">
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['img']); ?>" class="card-img-top" alt="image" width="304" height="236">
            <form class="" action="compra.php" method="post">
              <input type="hidden" class="form-control" name="id"  value="<?php echo $row['id'] ?>">
              <div class="card-body">
                <input type="text" class="form-control mb-2"  name="nombre_prod"  readonly value="<?php echo $row['nombre_prod'] ?>">
                <textarea name="descripcion_prod" rows="1" class="form-control"   readonly ><?php echo $row['descripcion_prod'] ?></textarea>

              </div>
              <ul class="list-group list-group-flush">

                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">Stock:</span>
                    <input type="text"  name="stock_prod" class="form-control"  readonly value="<?php echo $row['stock_prod'] ?>">
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">Cantidad:</span>
                    <input type="number" class="form-control" min="1" max="<?php echo $row['stock_prod'] ?>" required name="cantidad" >
                  </div>
                </li>
                <li class="list-group-item">
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="text"  name="precio_prod" class="form-control"  readonly value="<?php echo $row['precio_prod'] ?>">
                    <span class="input-group-text">.00</span>
                  </div>
                </li>
              </ul>
              <div class="card-body">
                <button type="submit" class="btn btn-primary" name="carrito"><i class="fas fa-shopping-cart me-2"></i>Agregar al carrito</button>
              </div>
            </form>

          </div>
        </div>
      <?php } ?>
    <?php endif; ?>
  </div>

</div>

<?php include("includes/footer.php") ?>
