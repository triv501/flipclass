<?php 
include ("../php/conexion.php");
$id = $_REQUEST['id'];
$query="delete from materia where idMateria='$id'";
$result=$conexion->query($query);

if($result){
	
	header("Location:index.php");
}
else{
	echo "Error al eliminar asignatura";
}