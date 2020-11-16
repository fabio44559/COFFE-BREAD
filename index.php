<?php
include "conexion.php";
error_reporting(E_ALL ^ E_NOTICE);
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>Coffee and Bread</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="estilos/main.css" />

</head>
<body>
<br><br>

<center><h2>Coffee And Bread</h2></center><br>
<hr><br>
<form method="POST" action="index.php">
	<center>
	<table width="250" align="center">
        <tr>
                      
            <td><center><label >Correo: </label><input type="text" class="form-control" required="required" name="usuario"></center></td> 
                    
        </tr>
        <tr>
           <td><center><label>Clave: </label><input type="password" class="form-control" required="required"  name="clave"></center></td> 
                    
        </tr>                 
	
        <tr>
            <th colspan="2">
             <center><br>
            <input type="submit" name="entrar" value="Ingresar">
			<input type="submit" name="registro" value="Registrarme">
            </th>
                    
        </tr>
				
				
				
</table>               
</center>
</form>
	
<?php
if (isset($_POST['entrar'])) { // funcion boton entrar
	$usuariof = $_POST['usuario'];// TOMAMOS LOS DATOS DEL FORMULARIO
	$clavef = $_POST['clave'];
	$consultag = "SELECT * FROM tbl_usuarios WHERE correo_usuario='$usuariof' AND clave_usuario='$clavef'"; // CREAMOS CONSULTA
	$ejecutarf = $conexion->query($consultag); // EJECUTAMOS LA CONSULTA
	if($row= mysqli_fetch_array ($ejecutarf)){
		$idd= $row["id_usuario"];
		header("location:menugeneral.php?usuario=$usuariof");
	}else{echo "Correo o clave desconocidos, por favor verifica tus datos";}

					

				
}

if (isset($_POST['registro'])) { // funcion boton entrar

		header("location:subpaginas/registrarme.php");


					

				
}

?>
</body>
</html>