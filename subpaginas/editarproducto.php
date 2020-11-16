<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD productos</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

<?php
$idusuario = $_GET['id'];
$idusuario2 = $_GET['usuario'];
if (empty($idusuario2))
{

	echo'<script type="text/javascript">
	alert("Sesión expirada");
	window.location.href="../index.php";
	</script>';
}		
		
$consulta = "SELECT * FROM tbl_productos WHERE id_producto = $idusuario"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
$row= mysqli_fetch_array ($ejecutar);
?>

<br><br>
<center><h2>Editar producto</h2></center><br><hr>
<form method="POST" >
	<center>
	<table width="250" align="center">
		<tr>
			<td><center><label>Id: </label><br><input type="text" value="<?php echo($row["id_producto"]);?>" required="required" readonly = "readonly"name="usuario" maxlength="64"></center></td> 
		</tr>
		<tr>    
            <td><center><label>Nombre: </label><br><input type="text"  value="<?php echo($row["nombre"]);?>" required="required" name="nombre" maxlength="64"></center></td> 
		</tr>
				
        <tr>
            <td><center><label>Precio: </label><input type="number"  value="<?php echo($row["precio"]);?>"  required="required" name="precio" maxlength="64"></center></td> 
                    
        </tr> 				
				
        <tr>
            <td><center><label>Stock: </label><br><input type="number"  value="<?php echo($row["stock"]);?>" required="required"  name="stock" maxlength="64"></center></td> 
             
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
            <td><center><label>Descripcion: </label><input type="text"  value="<?php echo($row["descripcion"]);?>" required="required"  name="descripcion"></center></td> 
               
        </tr>  
        <tr>
            <th colspan="2">
                <center><br>
                <input type="submit" name="editar"  value="Editar Producto">
				<br><br>
				<input type="submit" name="vmproductos"  value="Volver la CRUD productos">
            </th>
                    
        </tr>
	
</table>    

<hr>

<?php

if ($_POST['vmproductos']) { 		header("location:menuproductos.php?usuario=$idusuario2");	}


if ($_POST['editar']) { // funcion boton entrar
				
$referencia = $_POST['referencia'];
$nombre = $_POST['nombre'];
$stock = $_POST['stock'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];  
	
          
$consulta = "UPDATE tbl_productos SET referencia='$referencia',nombre='$nombre',stock=$stock,precio=$precio,descripcion='$descripcion'
WHERE id_producto = $idusuario";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

if ($ejecutar) { // si la consulta funciona correctamente
	echo'<script type="text/javascript">
	alert("Producto editado correctamente");
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