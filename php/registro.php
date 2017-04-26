<?php
include ("conexion.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$control  = $_POST['control'];
$pass = $_POST['pass'];


$cons="SELECT * FROM usuario WHERE nocontrol='$control';";
$re=$conexion->query($cons);
$row_cnt = $re->num_rows;
   if ($row_cnt==1){
	   echo"<script type='text/javascript'>
					alert('Este alumno ya se encuentra registrado');
					</script>";
					
		echo "<script type='text/javascript'>
					window.location='../index.html'
					</script>";
   }


$consulta="SELECT * FROM listaalumnos WHERE nocontrol='$control';";
$result1=$conexion->query($consulta);
$row_cnt = $result1->num_rows;
   if ($row_cnt==1){
	   $query="INSERT INTO usuario (`nocontrol`, `nombre`, `apellido`, `correo`, `pass`, `tipo`) VALUES ('$control', '$nombre', '$apellido', '$email', '$pass', '2');";
$result=$conexion->query($query);
if($result){
		
	   echo"<script type='text/javascript'>
					alert('El registro se ha completado con éxito');
					</script>";
					
		echo "<script type='text/javascript'>
					window.location='../index.html'
					</script>";
	   
}
   }
 if ($row_cnt==0){
	echo"<script type='text/javascript'>
					alert('Por favor póngase en contacto con el docente para agregarlo a su asignatura correspondiente');
					</script>";
					
				echo "<script type='text/javascript'>
					window.location='../index.html'
					</script>";
	
}
  


/*
if ($row_cnt==1){
	$query="INSERT INTO `u987898536_itz`.`usuario` (`nocontrol`, `nombre`, `apellido`, `correo`, `pass`, `tipo`) VALUES ('$control', '$nombre', '$apellido', '$email', '$pass', '1');";
$result=$conexion->query($query);
if($result){
	//echo "Insersion exitosa";
	echo"<script type='text/javascript'>
					alert('El registro se ha completado');
					</script>";
	header("Location:../index.html");
	*/

 ?>