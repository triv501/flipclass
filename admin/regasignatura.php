<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
<?php
include ("../php/conexion.php");

$nombre=$_POST['nombre'];
$objetivo=$_POST['objetivo'];
$habilidades=$_POST['habilidades'];
$foto= $_FILES['foto']['name'];
$ruta= $_FILES['foto']['tmp_name'];
$destino='Img/'.$foto;
copy($ruta,$destino);
	
$idmat = rand (0 ,999);

echo($idmat);
echo($nombre);
echo($objetivo);
echo($habilidades);
	
$query="insert into materia (idMateria, no_materia, objetivo, hab_prev, ruta, id_prof) Values ('$idmat', '$nombre', '$objetivo', '$habilidades', '$destino', '18672') ";	
	
$result=$conexion->query($query);
if($result){
	//echo "Insersion exitosa";
	header("Location:index.php");
}
else{
	echo "Error en insercion";
}
?>
</body>
</html>