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
				echo "<div class='d-flex justify-content-center mt-4'>
								<a class='btn btn-primary' href='listado.php#".$id_producto."'>Volver a mis productos</a>
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

</body>
</html>
