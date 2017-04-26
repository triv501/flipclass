
<?php 
include ("../php/conexion.php");
$id = $_REQUEST['id'];
$mate = $_GET['m'];
$query="delete from temario where idTemario='$id'";
$result=$conexion->query($query);

if($result){
	
	header("Location:materias.php?m=$mate");
}
else{
	echo "Error en insercion";
}

