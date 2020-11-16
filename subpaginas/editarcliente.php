<?php
include "../conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Panel Administrativo - Lista de Clientes</title>
<!-- cargar estilos -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
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
		$consulta = "SELECT * FROM tbl_cliente WHERE id_cliente = $idusuario"; // SE HACE LA CONSULTA
		$ejecutar = $conexion->query($consulta); // SE EJECUTA
		$row= mysqli_fetch_array ($ejecutar);
		?>

<br><br>
		<center><H2>Editar cliente</H2></center><br><hr>
		<form method="POST" >
			<center>
			<table width="250" align="center">
            
              

			  <tr>
                      
                 <td><center><label>Id: </label><br><input type="text" value="<?php echo($row["id_cliente"]);?>" required="required" class="form-control" readonly = "readonly"name="usuario" maxlength="64"></center></td> 
				                     
                </tr>


			<tr>
                      
                 <td><center><label>Nombre: </label><br><input type="text"  value="<?php echo($row["nombre_cliente"]);?>" required="required"  class="form-control" name="nombre" maxlength="64"></center></td> 
				                     
                </tr>
                <tr>
                 <td><center><label>Telefono: </label><br><input type="number"  value="<?php echo($row["telefono_cliente"]);?>" required="required" class="form-control" name="telefono" maxlength="15"></center></td> 
                   
                </tr>   
                <tr>
                 <td><center><label>Direccion: </label><input type="text"  value="<?php echo($row["direccion_cliente"]);?>"  required="required"  class="form-control" name="direccion" maxlength="150"></center></td> 
                    
                </tr>  
              			
				
                <tr>
                    <th colspan="2">
                        <center><br>
                       <input type="submit" name="editar"   value="Editar Cliente"><br><br>
					   <input type="submit" name="volvermclientes"  value="Volver al menu de clientes">
                    </th>
                    
                </tr>
				
				
				
                </table>    

<hr>
	
	
	
	
<?php


if ($_POST['editar']) { // funcion boton entrar
				
				$nombre = $_POST['nombre'];
				$telefono = $_POST['telefono'];
				$direccion = $_POST['direccion'];
	
          
$consulta = "UPDATE tbl_cliente SET nombre_cliente='$nombre',telefono_cliente='$telefono',direccion_cliente='$direccion'
WHERE id_cliente = $idusuario";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

		if ($ejecutar) { // si la consulta funciona correctamente
echo'<script type="text/javascript">
alert("Cliente editado correctamente");
</script>';
				}
								
				
			}
			
if ($_POST['volvermclientes']) { // funcion boton entrar
				
		header("location:menuclientes.php?usuario=$idusuario2");
			
				
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