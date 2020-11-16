<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Registro</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

<br><br>
<center><h2>Registro</h2></center><br><hr>
<form method="POST" enctype="multipart/form-data">
	<center>
	<table width="1000" height ="350" align="center">
        <tr>
        <td><center><label>Nombre: </label><input type="text"  name="nombre" maxlength="64"></center></td> 
        </tr>
        <tr>
            <td><center><label>Foto: </label><input type="file"  name="foto"></center></td> 
        </tr>     
        <tr>
            <td><center><label>Correo: </label><input type="text"  name="correo" maxlength="100"></center></td> 
        </tr>
		<tr>
            <td><center><label>Celular: </label><input type="number"  name="celular" maxlength="20"></center></td> 
        </tr>  

        <tr>
            <td><center><label>Contraseña: </label><input type="text"  name="clave" maxlength="64"></center></td> 
        </tr>				 
        <tr>
            <th colspan="2">
            <center><br>
            <input type="submit" name="enviar" value="Registrarme">
            </th>
		</tr>
</table>    

<hr>
	
	
<?php

	
if ($_POST['enviar']) { // funcion boton entrar
				
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];  
$clave = $_POST['clave']; 
$estado = 1;
$nombref = $_FILES['foto']['name'];
$archivo = $_FILES['foto']['tmp_name'];
$ruta = "../images";
$ruta=$ruta."/".$nombref;
$publicacion = 1;
move_uploaded_file($archivo,$ruta);
   
$consulta = "INSERT INTO tbl_usuarios
(nombre_usuario,imagen_usuario,celular_usuario,correo_usuario,estado,clave_usuario) 
VALUES ('$nombre','$ruta','$celular','$correo','$estado','$clave')";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	
if ($ejecutar) { // si la consulta funciona correctamente
	echo'<script type="text/javascript">
	alert("Registro exitoso");
	window.location.href="../index.php";
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