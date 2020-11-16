<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Crear cliente</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

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

<br><br>
<center><h2>Añadir un nuevo cliente</h2></center><br><hr>
<form method="POST" enctype="multipart/form-data">
	<center>
	<table width="1000" height ="350" align="center">
	    <tr>
			<td><center><label>Nombre: </label><input type="text" class="form-control" name="nombre" maxlength="64"></center></td> 
        </tr>
        <tr>
			<td><center><label>Direccion: </label><input type="text" class="form-control" name="direccion" maxlength="150"></center></td> 
        </tr>       
		<tr>
            <td><center><label>Telefono: </label><input type="number" class="form-control" name="telefono" maxlength="15"></center></td> 
        </tr>  
        <tr>
            <th colspan="2">
				<center><br>
				<input type="submit" name="enviar"  value="Añadir">
				<br>
				<input type="submit" name="vmclientes"  value="Volver a la CRUD clientes">
            </th>
		</tr>
	</table>    
<hr>
	
	
	
	
<?php

if ($_POST['vmclientes']) 
{ // funcion boton entrar
	header("location:menuclientes.php?usuario=$idusuario");
}

if ($_POST['enviar']) 
{ // funcion boton entrar
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
 
$consulta = "INSERT INTO tbl_cliente 
(nombre_cliente,telefono_cliente,direccion_cliente) 
VALUES ('$nombre','$telefono','$direccion')";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

if ($ejecutar) { // si la consulta funciona correctamente
	echo'<script type="text/javascript">
	alert("Cliente agregado correctamente");
	</script>';
}
}
?>
		
</center>
</form>
	
	



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