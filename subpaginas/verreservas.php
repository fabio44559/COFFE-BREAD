<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee and Bread, Panel Administrativo</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

<br><br>
		<?php
		
		$shet = $_GET['identi'];
		
		?>
		<center><h2>Tus Reservas</h2><br><hr>
	
		<?php
$consulta = "SELECT * FROM tbl_reservar WHERE id_cliente = $shet"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if ($ejecutar) {  // CONDICIONAL SI SE EJECUTO CORRECTAMENTE LA CONSULTA
$row= mysqli_fetch_array ($ejecutar); // SE TOMAN LOS DATOS DE LA CONSULTA
$whatreserva = $row["id_reserva"];     
$consulta2 = "SELECT * FROM tbl_detalle_reserva WHERE id_reserva = $whatreserva"; // SE HACE LA CONSULTA
$ejecutar2 = $conexion->query($consulta2); // SE EJECUTA	
$row2 = mysqli_fetch_array ($ejecutar2);
	
	
	echo "<table  border='1' cellpadding='3' cellspacing='0' > \n"; // IMPRIMIMOS LA TABLA
echo "<tr>
         <th align=center >Id
		 <th align=center >Producto
		 <th align=center >Cantidad

         </tr> \n";
     do { // CICLO DO QUE TOMA TODOS LOS DATOS DE LA TABLA Y LOS LISTA EN UNA TABLA HTML
	 echo     "<tr class=modo1>
              <th>".$row2["id_reserva"].
              "<td>".$row2["producto"].
			  "<td>".$row2["cantidad"].
	  
              "<td>"	;

	 }while ( $row = mysqli_fetch_assoc($ejecutar2) ); // NOS DA LA CONDICION DEL DO
echo "</table> \n"; // TERMINAMOS DE INDICAR QUE ES UNA TABLA
				
			}
?>
		
	<br><hr><br>	
	<form method="POST">
		<label>Borrar reserva: </label><input type="number"  required="required"  name="busqueda" placeholder="ID Reserva">
		<input type="submit"  name="borrar" value="Borrar">
		
		</form>
		
		<form method="POST">
		<br><br>
		<input type="submit"  name="volver" value="Volver al menu de reservas">
		<br>
		<hr>
		
		</form>
		
		</center>
		
		
		
		<?php
$idproducto = $_POST['busqueda'];

if ($_POST['borrar']) {
$consulta = "SELECT * FROM tbl_reservar WHERE id_reserva = $idproducto AND id_cliente = $shet"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
if($row= mysqli_fetch_array ($ejecutar)){
	$consulta2 = "DELETE FROM tbl_reservar WHERE id_reserva = $idproducto"; // SE HACE LA CONSULTA
    $ejecutar2 = $conexion->query($consulta2); // SE EJECUTA
	$consulta3= "DELETE FROM tbl_detalle_reserva WHERE id_reserva = $idproducto"; // SE HACE LA CONSULTA
    $ejecutar3 = $conexion->query($consulta3); // SE EJECUTA
	echo'<script type="text/javascript">
alert("Se ha borrado la reserva correctamente");
</script>';
	}
	else{
		echo "<br>No hay reservas a tu nombre con ese ID";
	}

}

if ($_POST['volver']) {
header("location:reservas.php?identi=$shet");

}

?>
		



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