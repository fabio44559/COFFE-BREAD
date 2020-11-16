<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>CRUD Usuarios</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<center><h2>CRUD Usuarios</h2><br><hr>
	
<?php
$consulta = "SELECT * FROM tbl_usuarios"; // SE HACE LA CONSULTA
$ancho = 100;
$largo = 150;
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if ($ejecutar) {  // CONDICIONAL SI SE EJECUTO CORRECTAMENTE LA CONSULTA
	$row= mysqli_fetch_array ($ejecutar); // SE TOMAN LOS DATOS DE LA CONSULTA
     
	
	echo "<table  border='1' cellpadding='3' cellspacing='0' > \n"; // IMPRIMIMOS LA TABLA
	echo "<tr>
         <th align=center >Id
         <th align=center >Nombre
		 <th align=center >Celular
		 <th align=center >Correo
		 <th align=center >Clave
		 <th align=center >Estado
		 <th align=center >Foto		 

         </tr> \n";
     do { // CICLO DO QUE TOMA TODOS LOS DATOS DE LA TABLA Y LOS LISTA EN UNA TABLA HTML
	$estado = "Inactivo";
	if ($row["estado"] == 1) {
		$estado = "Activo";
		}
	else{
		 $estado = "Inactivo";
		 }
	echo     "<tr class=modo1>
              <th>".$row["id_usuario"].
              "<td>".$row["nombre_usuario"].
			  "<td>".$row["celular_usuario"].
			  "<td>".$row["correo_usuario"].
			  "<td>".$row["clave_usuario"].
			  "<td>".$estado.
			  "<td><img src=".$row["imagen_usuario"]." width=".$ancho." height=".$largo.">";			  
              "<td>"	;
	 }while ( $row = mysqli_fetch_assoc($ejecutar) ); // NOS DA LA CONDICION DEL DO
	echo "</table> \n"; // TERMINAMOS DE INDICAR QUE ES UNA TABLA
				
}
?>
		
<br><hr><br>	
<form method="POST">
	<label>Edicion o borrar usuario: </label><input type="number" class="fw-medium fg-grey" required="required"  name="busqueda" placeholder="ID Usuario"><br><br>
	<input type="submit"  name="borrar" value="Eliminar">
	<input type="submit"  name="editar" value="Modificar">
	<br><br>
	<input type="submit"  name="volver" value="Volver al menu general">
</form>

<?php
$idproducto = $_POST['busqueda'];

if ($_POST['volver']) {header("location:../menugeneral.php?usuario=$idusuario");}

if ($_POST['editar']) {
	$consulta = "SELECT * FROM tbl_usuarios WHERE id_usuario = $idproducto"; // SE HACE LA CONSULTA
	$ejecutar = $conexion->query($consulta); // SE EJECUTA
	if($row= mysqli_fetch_array ($ejecutar)){header("location:editarusuario.php?id=$idproducto&usuario=$idusuario");}else{echo "<br>No se encontro el usuario";}
}

if ($_POST['borrar']) {
$consulta = "SELECT * FROM tbl_usuarios WHERE id_usuario = $idproducto"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
	if($row= mysqli_fetch_array ($ejecutar)){
		$consulta2 = "DELETE FROM tbl_usuarios WHERE id_usuario = $idproducto"; // SE HACE LA CONSULTA
		$ejecutar2 = $conexion->query($consulta2); // SE EJECUTA
		echo'<script type="text/javascript">
		alert("Se ha borrado el usuario correctamente");
		</script>';
	}
	else{
		echo "<br>No se encontro el usuario";
	}

}

?>
		
<br><br><br><hr>
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