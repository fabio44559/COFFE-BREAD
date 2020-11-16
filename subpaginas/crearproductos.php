<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Añadir producto</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
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
<center><h2>Añadir producto</h2></center><br><hr>
<form method="POST"  enctype="multipart/form-data">
	<center>
	<table width="1000" height ="350" align="center">
		<tr>
			<td><center><label>Nombre: </label><input type="text"   name="nombre" maxlength="64"></center></td> 
        </tr>
        <tr>
            <td><center><label>Stock: </label><input type="number"  name="stock" maxlength="64"></center></td> 
        </tr>  
        <tr>
            <td><center><label>Precio: </label><input type="number"    name="precio"></center></td> 
        </tr>  
		<tr>
            <td><center><label>Imagen: </label><input type="file"    name="foto"></center></td> 
        </tr>  
		<tr>
			<td><center><label>Descripcion: </label><input type="textarea"    name="descripcion"></center></td> 
        </tr>  				 
		<tr>
            <td><center><label>Referencia: </label>
				<select  name='referencia'>
					<option value="Pasteleria">Pasteleria</option>
					<option value="Panaderia">Panaderia</option>
					<option value="Cafeteria">Cafeteria</option>
				</select>";
		</center></td> 
        </tr> 
        <tr>
            <th colspan="2">
            <center><br>
            <input type="submit" name="enviar" value="Añadir Producto" >
            </th>
		</tr>
	</table>    
<hr>
	

<form method="POST">
	<input type="submit"  name="vmproductos" value="Volver a la CRUD productos"><br>
</form>	
	
<?php

if ($_POST['vmproductos']) 
{
	header("location:menuproductos.php?usuario=$idusuario");
}

if ($_POST['enviar']) { // funcion boton entrar
				
$referencia = $_POST['referencia'];
$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$precio = $_POST['precio'];  
$descripcion = $_POST['descripcion']; 
$nombref = $_FILES['foto']['name'];
$archivo = $_FILES['foto']['tmp_name'];
$ruta = "../images";
$ruta=$ruta."/".$nombref;
$publicacion = 1;
move_uploaded_file($archivo,$ruta);
               
$consulta = "INSERT INTO tbl_productos 
(referencia,nombre,stock,precio,descripcion,imagen,publicacion) 
VALUES ('$referencia','$nombre','$stock','$precio','$descripcion','$ruta','$publicacion')";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

if ($ejecutar) { // si la consulta funciona correctamente
	echo'<script type="text/javascript">
	alert("Producto agregado correctamente");
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