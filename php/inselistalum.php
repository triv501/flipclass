<?php
include ("conexion.php");
$nc=($_GET['m']);
	echo $nc;
//obtenemos el archivo .csv
$tipo = $_FILES['archivo']['type'];
 
$tamanio = $_FILES['archivo']['size'];
 
$archivotmp = $_FILES['archivo']['tmp_name'];
 
//cargamos el archivo
$lineas = file($archivotmp);
 
//inicializamos variable a 0, esto nos ayudar� a indicarle que no lea la primera l�nea
$i=0;
 
//Recorremos el bucle para leer l�nea por l�nea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera l�nea 
   (con los t�tulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condici�n, solo entrar� en la condici�n a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto ir� 
       leyendo hasta que encuentre un ; */
       $datos = explode(",",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       $numcontrol = trim($datos[0]);
       $nombre = trim($datos[1]);
       $apepaterno = trim($datos[2]);
	   $apematerno = trim($datos[3]);
	   //echo $numcontrol,$nombre,$apepaterno,$apematerno;
       //guardamos en base de datos la l�nea leida
$query= "insert into listaalumnos (nocontrol,nombre,apepate,apemate,idMateria) values ('$numcontrol','$nombre','$apepaterno','$apematerno','$nc');";
$result=$conexion->query($query);
       //cerramos condici�n
   }
   /*Cuando pase la primera pasada se incrementar� nuestro valor y a la siguiente pasada ya 
   entraremos en la condici�n, de esta manera conseguimos que no lea la primera l�nea.*/
   $i++;
   //cerramos bucle
}
header("Location:../admin/listaalumnos.php?m=$nc");
?>