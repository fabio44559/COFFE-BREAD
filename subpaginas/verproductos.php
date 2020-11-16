<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD Productos</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

<br><br>
<?php
		
$idusuario = $_GET['usuario'];
if (empty($idusuario))
{

	echo'<script type="text/javascript">
	alert("Sesión expirada");
	window.location.href="../index.php";
	</script>';
}
		
?>
<center><h2>Listado de productos</h2><br><hr>
	
<?php
$consulta = "SELECT * FROM tbl_productos"; // SE HACE LA CONSULTA
$ancho = 100;
$largo = 150;
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if ($ejecutar) {  // CONDICIONAL SI SE EJECUTO CORRECTAMENTE LA CONSULTA
$row= mysqli_fetch_array ($ejecutar); // SE TOMAN LOS DATOS DE LA CONSULTA
     
	
	echo "<table  border='1' cellpadding='3' cellspacing='0' > \n"; // IMPRIMIMOS LA TABLA
	echo "<tr>
         <th align=center >Id
         <th align=center >Referencia
		 <th align=center >Nombre
		 <th align=center >Stock
		 <th align=center >Precio
		 <th align=center >Descripcion
		 <th align=center >Imagen

         </tr> \n";
     do { // CICLO DO QUE TOMA TODOS LOS DATOS DE LA TABLA Y LOS LISTA EN UNA TABLA HTML
	 echo     "<tr class=modo1>
              <th>".$row["id_producto"].
              "<td>".$row["referencia"].
			  "<td>".$row["nombre"].
			  "<td>".$row["stock"].
			  "<td>".$row["precio"].
			  "<td>".$row["descripcion"].
			  "<td><img src=".$row["imagen"]." width=".$ancho." height=".$largo.">";
              "<td>"	;

	 }while ( $row = mysqli_fetch_assoc($ejecutar) ); // NOS DA LA CONDICION DEL DO
echo "</table> \n"; // TERMINAMOS DE INDICAR QUE ES UNA TABLA
				
			}
?>
		
	<br><hr><br>	
<form method="POST">
	<label>Cual producto deseas modificar: </label><input type="number" class="fw-medium fg-grey" required="required"  name="busqueda" placeholder="ID Producto"><br>
	<input type="submit"  name="borrar" value="Eliminar">
	<input type="submit"  name="editar" value="Modificar">
	
	<br><br>
	<input type="submit"  name="vmproductos" value="Volver a la CRUD productos">
	</form>
<?php

$idproducto = $_POST['busqueda'];
if ($_POST['vmproductos']) {header("location:menuproductos.php?usuario=$idusuario");}
if ($_POST['editar']) {
$consulta = "SELECT * FROM tbl_productos WHERE id_producto = $idproducto"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if($row= mysqli_fetch_array ($ejecutar)){header("location:editarproducto.php?id=$idproducto&usuario=$idusuario");}else{echo "<br>No se encontro el producto";}
}

if ($_POST['borrar']) {
$consulta = "SELECT * FROM tbl_productos WHERE id_producto = $idproducto"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if($row= mysqli_fetch_array ($ejecutar)){
	$consulta2 = "DELETE FROM tbl_productos WHERE id_producto = $idproducto"; // SE HACE LA CONSULTA
    $ejecutar2 = $conexion->query($consulta2); // SE EJECUTA
	echo'<script type="text/javascript">
	alert("Se ha borrado el producto correctamente");
	</script>';
	header("location:verproductos.php?usuario=$idusuario");
}
else{
	echo "<br>No se encontro el producto";
	}

}

?>
		
<br><br>

<br>
<hr>
</center>


<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>
</html>