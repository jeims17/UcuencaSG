<?php
	
	//incluimos la direccion donde esta nuestra clase para la conexion
	$ds = DIRECTORY_SEPARATOR;
	$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
	$file = "{$base_dir}ucuencasg{$ds}conexion.php"; 
	include_once($file); 		
	
	//metodo para guardar los datos de la plantilla de agregar una aula
	$con = new conexion();
	$con->abrirConexion("localhost","root","1234");
	$con->seleccionarBD("mydb");
	
	$result = $con->ejecutarConsulta("SELECT * FROM encuesta WHERE encuesta.estado = 1");

	while ($row = mysql_fetch_row($result)){   
		echo "<tr>";  
		echo "<td>$row[0]</td>";  
		echo "<td>$row[1]</td>";  
		echo "<td>$row[5]</td>";  
		echo "<td class=\"text-center\"><a class='btn btn-info btn-xs' href=\"#\"><span class=\"glyphicon glyphicon-edit\"></span> Llenar</a> </td>";
		echo "</tr>";  
	}  

	//$con->ejecutarQuery("INSERT INTO usuario VALUES(".$_REQUEST['id'].", '".$_REQUEST['nombre']."', '".$_REQUEST['apellido']."', ".$_REQUEST['cedula'].", '".$_REQUEST['correo']."', '".$_REQUEST['contrasenia']."', '".$_REQUEST['rol']."' )");

?>