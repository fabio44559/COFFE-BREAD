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

<center><h2>CRUD productos</h2></center><br><hr>
<center>
<form method="POST">
<input type="submit"  name="nproducto" value="Añadir producto">
<input type="submit"  name="vproductos" value="Lista de productos">
<br><br>
<input type="submit"  name="atras" value="Regresar al Menu">
</form>

<?php 

		if ($_POST['nproducto']) {header("location:crearproductos.php?usuario=$idusuario");	}
		if ($_POST['vproductos']) 		{			header("location:verproductos.php?usuario=$idusuario");		}
		if ($_POST['atras']) 		{			header("location:../menugeneral.php?usuario=$idusuario");		}
		
?>

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