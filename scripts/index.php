<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">

    <?php
      require __DIR__."/base/functions.php";
      enableErrorLog();
    ?>

    <nav class="navbar navbar-expand-lg p-3 mb-2 bg-secondary text-white">
      <div class="container-fluid">
        <ul class="navbar-nav d-flex justify-content-center w-100">
          <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="./index.php">Mis productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Crear un producto</a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="flex-grow-1 container mt-4 mb-4">
      <h1 class="mb-2"> -- Mis Productos -- </h1>
      <div class="row g-4 mt-2">
        <?php
          // Creación de la conexión
          $conn = createConnection("localhost", "proyecto", "root", "");

          if ($conn == null) {
            echo "<script>console.log('Error: No se pudo establecer conexión con la base de datos.')</script>";
          }

          $resultado_query = $conn->query('select * from productos');

          while($row = $resultado_query->fetch(PDO::FETCH_OBJ)) {
            echo "<div class='col-sm-6 col-md-4 col-lg-3'>
                    <article class='card text-center h-100'>
                      <div class='card-header'>Código: {$row->id}</div>
                      <div class='card-body'>
                        <h3 class='card-title'>{$row->nombre}</h3>
                        <a class='btn btn-primary' href='detalle.php?id={$row->id}'>Ver Detalle</a>
                      </div>
                      <div class='card-footer text-body-secondary'>
                        Botones que no he hecho todavia
                      </div>
                    </article>
                  </div>";
          }

          // Cerrar la conexión
          $conn = null;
        ?>
      </div>
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
