<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi borrar</title>

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
          <a class="nav-link text-white active" aria-current="page" href="./index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active" aria-current="page" href="./listado.php">Mis productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="crear.php">Crear un producto</a>
        </li>
      </ul>
    </div>
  </nav>

	<main class="flex-grow-1 container mt-4 mb-4">
		<h1 class="mb-4"> -- Borrar producto -- </h1>

    <?php

      if (!isset($_GET['confirm']) || $_GET['confirm'] !== 'true') {
        echo "<div class='d-flex justify-content-center mt-4'>
                <button class='btn btn-danger' onclick='checkDelete($id_producto)'>Si, quiero borrar este producto</button>
              </div>";
}
      
      if (isset($_GET['confirm']) && $_GET['confirm'] == 'true') {

        $conn = createConnection("localhost", "proyecto", "root", "");

        if ($conn == null) {
          echo "<script>console.log('Error: No se pudo establecer conexión con la base de datos.')</script>";
        }

        try {
          $reg = $conn->exec("DELETE FROM productos WHERE `productos`.`id` = '".$id_producto."'");

          if ($reg == 1) {
            echo "<p class='alert alert-success mt-4' role='alert'>El producto se ha eliminado con éxito</p>";
          }

        } catch (PDOException $ex) {
          echo "<p class='alert alert-danger mt-4' role='alert'>";
          echo "Error en la base de datos: " . $ex->getMessage() . "<br>";
          echo "Código de error: " . $ex->getCode() . "<br>";
          echo "</p>";
        }
      
        $conn = null;
      }
    ?>

		<?php
				echo "<div class='d-flex justify-content-center mt-4'>
								<a class='btn btn-primary' href='listado.php'>Volver a mis productos</a>
							</div>";
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

  <script>
    function checkDelete(id) {
      const check = confirm("¿Estás seguro de que deseas borrar este producto?");
      if (check) {
        window.location.href = "borrar.php?id=" + id + "&confirm=true";
      }
    }
  </script>

</body>
</html>
