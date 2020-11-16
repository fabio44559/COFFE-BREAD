<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Panel Administrativo - Agregar reserva</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="../estilos/main.css" />
</head>
<body>

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

<br><br>
		<center><h2>Nueva reserva</h2></center><br><hr>
		<form method="POST" enctype="multipart/form-data">
			<center>
			<table width="1000" height ="350" align="center">
               
                                    
                 <td><center><label>Id usuario a asignar la reserva: </label><input type="text"  name="usuario" maxlength="64"></center></td> 
                 
                </tr>
               <tr>
                 <td>
				 <center>
		<br><label>Producto: </label>		 
<?php
$consulta = "SELECT * FROM tbl_productos";
					$ejecutar = $conexion->query($consulta);
						if($ejecutar)
						{
							$row= mysqli_fetch_array ($ejecutar);
							echo "<select name='producto'>";
							do { // CICLO DO QUE TOMA TODOS LOS DATOS DE LA TABLA Y LOS LISTA EN UNA TABLA HTML
								echo     "<option value=".$row['nombre'].">".$row['nombre']."</option>";
							}while ( $row = mysqli_fetch_assoc($ejecutar) );
								echo "</select>";

	
						}
				 ?>
				 </center>
				 
				 
				 
				 
				 
				 
				 </td> 
                </tr>  
                <tr>
                 <td><center><label>Cantidad: </label><input type="text"  name="cantidad" maxlength="150"></center></td> 
                 </tr>  
		

 				
                <tr>
                    <th colspan="2">
                        <center><br>
                       <input type="submit" name="enviar" value="Agregar Reserva" ><br><br>
					   <input type="submit" name="vmclientes" value="Volver al menu de reservas" >
                    </th>
                    
                </tr>
				
				
				
                </table>    

<hr>
	
	
	
	
<?php

if ($_POST['vmclientes']) { // funcion boton entrar
				
header("location:menureservas.php?usuario=$shet");
								
				
			}

if ($_POST['enviar']) { // funcion boton entrar
				
			    $usuario = $_POST['usuario'];
				$producto = $_POST['producto'];
				$cantidad = $_POST['cantidad'];
 
 $consulta2 = "INSERT INTO tbl_reservar 
(id_cliente,fecha_hora) 
VALUES ('$usuario',NOW())";// creamos la consulta
$ejecutar2 = $conexion->query($consulta2);// ejecutamos la consulta	

 $consulta = "INSERT INTO tbl_detalle_reserva 
(producto,cantidad) 
VALUES ('$producto','$cantidad')";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

		if ($ejecutar) { // si la consulta funciona correctamente
echo'<script type="text/javascript">
alert("Reserva hecha con éxito");
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