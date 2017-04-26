<?php
	include ("conexion.php");
	
	$tema = $_POST['tema'];
	$mate = $_GET['m'];
	$rn = rand (0 ,99999 );
	$cadena = str_replace(' ', '', $tema.$rn);
	$cadena = str_replace('.', '', $cadena);
	$query="insert into temario (idTemario, nombre_tema, idMateria, tipo, link) Values (NULL, '$tema', '$mate', '1', '$cadena') ";
$result=$conexion->query($query);
if($result){
	//echo "Insersion exitosa";
	header("Location:../admin/materias.php?m=$mate");
}
else{
	echo "Error en insercion";
}