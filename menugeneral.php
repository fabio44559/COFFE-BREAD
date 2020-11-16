<?php
include "conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee and Bread, Menu General</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="estilos/main.css" />
</head>
<body>
<br><br>
<?php
		
$idusuario = $_GET['usuario'];
	if (empty($idusuario))
	{

		echo'<script type="text/javascript">
		alert("Sesión expirada");
		window.location.href="index.php";
		</script>';
	}
	
echo "<center>";
$consulta = "SELECT * FROM tbl_usuarios WHERE correo_usuario ='$idusuario'"; // SE HACE LA CONSULTA
$ejecutarf = $conexion->query($consulta); // SE EJECUTA
if($row= mysqli_fetch_array ($ejecutarf)) {  // CONDICIONAL SI SE EJECUTO CORRECTAMENTE LA CONSULTA

echo "<h3>Información sesión</h3>";		
echo "<br><h5>Nombre: ",$row["nombre_usuario"],"</h5>";
echo "<h5>Celular: ",$row["celular_usuario"],"</h5>";
echo "<h5>Correo: ",$row["correo_usuario"],"</h5>";
echo "</center><br>";
}
else
{
echo'<script type="text/javascript">
alert("Debes estar logueado para poder estar aqui");
window.location.href="../index.php";
</script>';
}	
	
?>


<hr>	
<center><h2>Opciones</h2><hr>
<br>
<form method="POST">
<input type="submit" name="clientes" value="CRUD Clientes"><br><br>
<input type="submit" name="productos" value="CRUD Productos"><br><br>
<input type="submit" name="reservas" value="CRUD Reservas"><br><br>
<input type="submit" name="usuarios" value="Vista de Usuarios"><br><br>		
<br><br>
<input type="submit" name="cerrars" value="Cerrar Sesion">
</form>
<br><br><br><br><hr>
</center>

<?php




if ($_POST['productos']) {header("location:subpaginas/menuproductos.php?usuario=$idusuario");}
if ($_POST['clientes']) {header("location:subpaginas/menuclientes.php?usuario=$idusuario");}
if ($_POST['usuarios']) {header("location:subpaginas/verusuarios.php?usuario=$idusuario");}
if ($_POST['reservas']) {header("location:subpaginas/menureservas.php?usuario=$idusuario");}
if ($_POST['cerrars']) {header("location:index.php");}

?>
</body>
</html>