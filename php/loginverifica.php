<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
	session_start();
	
	include ("conexion.php");
	
	session_start();
	$_SESSION['idProf']=18672;
	
	
	
	$nomusu=$_POST['txtcontrol'];
	$pass=$_POST['txtpass'];
	$bandera = false;
	$query= "select * from usuario";
	$result=$conexion->query($query);
	
	while ($row=$result->fetch_assoc()){
		if($pass==$row['pass'] && $nomusu == $row['nocontrol']){
			if	($row['tipo']== 1){
				$_SESSION['inicio'] = true;
				$_SESSION['tipo'] = 1;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 600);
				$bandera = true;
				header ("location:../admin/index.php");
			}
			if	($row['tipo']== 2){
				$_SESSION['inicio'] = true;
				$_SESSION['tipo'] = 1;
				$_SESSION['start'] = time();
				$_SESSION['expire'] = $_SESSION['start'] + (10 * 600);
				$bandera = true;
				header ("location:../admin/vistaalumno.php?nomusu=$nomusu");
			}
		}else if($bandera== false){
				header ("location:error.php");
			}
	}
	
	$_SESSION["nombre"]=$nomusu['nocontrol'];
?>