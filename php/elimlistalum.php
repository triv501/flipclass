<?php
	include ("conexion.php");
	$nc=($_GET['m']);
	echo $nc;
	
	$query="DELETE FROM listaalumnos where idMateria=$nc;";
	echo $query;
$result=$conexion->query($query);
if($result){
	//echo "Insersion exitosa";
	
	header("Location:../admin/listaalumnos.php?m=$nc");
}
else{
	echo "Error";
	
}
?>