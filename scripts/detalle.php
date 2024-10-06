<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi detalle</title>   
</head>
<body>
  <?php
    if (!isset($_GET['id'])) {
      echo "<script>console.log(Error: 'No existe el producto con este ID')</script>";
      header('Location: listado.php');
      exit();
    }

    $id_producto = $_GET['id'];
  ?>
</body>
</html>