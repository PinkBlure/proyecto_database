<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi detalle</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

  <?php
    if (!isset($_GET['id'])) {
      echo "<script>console.log(Error: 'No existe el producto con este ID')</script>";
      header('Location: listado.php');
      exit();
    }

    $id_producto = $_GET['id'];
  ?>

  <?php
    require_once __DIR__."/base/functions.php";
    enableErrorLog();
  ?>

  <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white">
    <div class="container-fluid">
      <ul class="navbar-nav d-flex justify-content-center w-100">
        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href="./index.php">Mis productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="crear.php">Crear un producto</a>
        </li>
      </ul>
    </div>
  </nav>

  <main class="flex-grow-1 container mt-4 mb-4">
    <h1 class="mb-4"> -- Mis Detalles -- </h1>

    <?php
      // Creación de la conexión
      $conn = createConnection("localhost", "proyecto", "root", "");

      if ($conn == null) {
        echo "<script>console.log('Error: No se pudo establecer conexión con la base de datos.')</script>";
      }

      $resultado_query = $conn->query("select * from productos where id = $id_producto");

      while($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
        echo "<div class='card text-center'>
                <div class='card-header'>{$row->nombre}</div>

                <div class='card-body'>
                  <p class='card-text'>Nombre: {$row->nombre}</p>
                  <p class='card-text'>Combre corto: {$row->nombre_corto}</p>
                  <p class='card-text'>Familia: {$row->familia}</p>
                  <p class='card-text'>Precio (€): {$row->pvp}</p>
                  <p class='card-text'>Descripción: {$row->descripcion}</p>
                </div>

                <div class='card-footer'>Código: {$row->id}</div>
              </div>
             ";
      }

      echo "<div class='d-flex justify-content-center mt-4'>
              <a class='btn btn-primary' href='index.php#".$id_producto."'>Volver a la página principal</a>
            </div>";

      // Cerrar la conexión
      $conn = null;
    ?>
  </main>

  <footer class="bg-dark text-light text-center py-3">
    <div class="container">
      <p class="mb-0">© 2024 Gestión de artículos</p>
      <ul class="list-inline">
        <li class="list-inline-item">
          <a href="#" class="text-light">Política de privacidad</a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="text-light">Términos de servicio</a>
        </li>
        <li class="list-inline-item">
          <a href="#" class="text-light">Contacto</a>
        </li>
      </ul>
    </div>
  </footer>
</body>
</html>
