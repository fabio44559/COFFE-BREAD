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
		
$consulta = "SELECT * FROM tbl_usuarios WHERE id_usuario = $idusuario"; // SE HACE LA CONSULTA
$ejecutar = $conexion->query($consulta); // SE EJECUTA
$row= mysqli_fetch_array ($ejecutar);
?>

<br><br>
<center><h2>Editar usuarios</h2></center><br><hr>
	<form method="POST" >
		<center>
		<table width="250" align="center">
             <tr>
                 <td><center><label>Id: </label><br><input type="text" value="<?php echo($row["id_usuario"]);?>" required="required" readonly = "readonly"name="usuario" maxlength="64"></center></td> 
				                     
            </tr>

                
			<tr>
                      
                 <td><center><label>Nombre: </label><br><input type="text"  value="<?php echo($row["nombre_usuario"]);?>" required="required" name="nombre" maxlength="64"></center></td> 
				                     
            </tr>
				
            <tr>
                 <td><center><label>Correo: </label><input type="text"  value="<?php echo($row["correo_usuario"]);?>"  required="required" name="correo" maxlength="100"></center></td> 
                    
           </tr>  				
				
            <tr>
                 <td><center><label>Clave: </label><input type="text" maxlength="64 " value="<?php echo($row["clave_usuario"]);?>" required="required"  name="clave"></center></td> 
				                 
           </tr>  				
				
           <tr>
                 <td><center><label>Celular: </label><br><input type="number"  value="<?php echo($row["celular_usuario"]);?>" required="required"  name="celular" maxlength="20"></center></td> 
                   
           </tr>   
				
				
            <tr>
                    <th colspan="2">
                        <center><br>
                       <input type="submit" name="editar"  value="Modificar Usuario"><br><br>
					   <input type="submit" name="volver" value="Volver a la CRUD usuarios">
                    </th>
                    
           </tr>
				
				
</table>    

<hr>
	
	
	
	
<?php
if ($_POST['volver']) { // funcion boton entrar
				
header("location:menuusuarios.php?usuario=$idusuario2");	
				
}

if ($_POST['editar']) { // funcion boton entrar
							    
$nombre = $_POST['nombre'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
		
          
$consulta = "UPDATE tbl_usuarios SET nombre_usuario='$nombre',celular_usuario='$celular',correo_usuario='$correo',clave_usuario='$clave'
WHERE id_usuario = $idusuario";// creamos la consulta
$ejecutar = $conexion->query($consulta);// ejecutamos la consulta	

if ($ejecutar) { // si la consulta funciona correctamente
echo'<script type="text/javascript">
alert("Usuario editado correctamente");
</script>';
header("location:verusuarios.php?usuario=$idusuario2");
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