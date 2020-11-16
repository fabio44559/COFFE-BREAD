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
		$ancho = 200;
		$largo = 300;
		$shet = $_GET['identi'];
		if (empty($shet))
		{

			echo'<script type="text/javascript">
			alert("Debe estar logueado para poder estar aqui");
			window.location.href="index.php";
			</script>';
			header("location:../index.php");
		}
		
		
		?>
		<center><h2>Coffee And Bread</h2></center><br><hr>
		
	    <?php 
		echo "<center>";
		$consulta = "SELECT * FROM tbl_usuarios WHERE id_usuario ='$shet'"; // SE HACE LA CONSULTA
		$ejecutarf = $conexion->query($consulta); // SE EJECUTA
		if($row= mysqli_fetch_array ($ejecutarf)) {  // CONDICIONAL SI SE EJECUTO CORRECTAMENTE LA CONSULTA
		
		echo "<br><h6>Nombre: ",$row["nombre_usuario"],"</h6>";
		echo "<img src=".$row["imagen_usuario"]." width=".$ancho." height=".$largo.">";
		echo "<br><br><h6>Celular: ",$row["celular_usuario"],"</h6>";
		echo "<h6>Correo: ",$row["correo_usuario"],"</h6>";
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
		
		<center>
		
		<form method="POST">
		<input type="submit"  name="crear" value="Hacer una nueva reserva">
		<input type="submit"  name="ver" value="Ver mis reservas">
		</form>

<?php 
    if ($_POST['crear']) 
	{
		header("location:../crearreserva.php?identi=$shet");
	}
	if ($_POST['ver']) 
	{
		header("location:../verreservas.php?identi=$shet");
	}


?>


	
		<br><br>
		<a  href="../index.php">Cerrar sesión</a>
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