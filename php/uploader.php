<?php
include ("conexion.php");
$a = $_GET['a'];
$b = $_GET['b'];
$target_path =   basename( $_FILES['uploadedfile']['name']); 
$ruta = "php/".$target_path;
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
	echo  "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
	$nombre = basename( $_FILES['uploadedfile']['name']);
	$query="INSERT INTO `u987898536_itz`.`archivos` (`link`, `ruta`, `nombre`, `idMateria`) VALUES ('$b', '$ruta', '$nombre', '$a');";
	$result=$conexion->query($query);
	if($result){
	//echo "Insersion exitosa";
		header("Location:../admin/materias2.php?m=$a&b=$a&a=$b");
	}else{
		echo "Error en insercion";
	}
} else{
	echo "Ha ocurrido un error, trate de nuevo!";
}

?>