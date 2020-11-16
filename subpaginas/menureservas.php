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
		
		$shet = $_GET['usuario'];
		if (empty($shet))
		{

			echo'<script type="text/javascript">
			alert("Debe estar logueado para poder estar aqui");
			window.location.href="../index.php";
			</script>';
		}
		
		?>
		<center><h2>Menu de reservas</h2></center><br><hr>
		<center>
		<form method="POST">
		<input type="submit"  name="ncliente" value="Agregar una nueva reserva">
		<input type="submit"  name="vclientes" value="Ver reservas">
		<br><br>
		<input type="submit"  name="atras" value="Volver al menu administrativo">
		</form>
		
		<?php 

		if ($_POST['ncliente']) 
		{
			header("location:crearreserva.php?usuario=$shet");
		}
		if ($_POST['vclientes']) 
		{
			header("location:verreservasadm.php?usuario=$shet");
		}
		if ($_POST['atras']) 
		{
			header("location:../menugeneral.php?usuario=$shet");
		}
			
		
		
		?>
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