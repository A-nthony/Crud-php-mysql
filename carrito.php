<?php include("includes/header.php") ?>

<div class="container p-4">
  <div class="col-md-16">
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php unset($_SESSION['message']);  } ?>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Precio</th>
          <th>Cantidad</th>
          <th>Total</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="table-light">

        <?php
          $id_user = $_SESSION['user_id'];
          $query = "SELECT * FROM compras WHERE id_usuario='$id_user'";
          $result = $conn->query($query);
          while ( $row = $result->fetch(PDO::FETCH_ASSOC)) {
            $id_prod = $row['id_producto'] ;
            $queryP = "SELECT * FROM producto WHERE id='$id_prod'";
            $resultP = $conn->query($queryP);
            $rowP = $resultP->fetch(PDO::FETCH_ASSOC);
            ?>

            <tr>
              <td><?php echo $rowP['nombre_prod'] ?></td>
              <td><?php echo $rowP['descripcion_prod'] ?></td>
              <td class="text-center"><?php echo $rowP['precio_prod'] ?></td>
              <td class="text-center"><?php echo $row['cantidad'] ?></td>
              <td class="text-center"><?php echo $row['total'] ?></td>
              <td>
                <a href="delete_buy.php?id=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm"> <i class="far fa-trash-alt"></i></a>
              </td>
            </tr>

         <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<?php include("includes/footer.php") ?>
