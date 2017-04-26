<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <title>1 Col Portfolio - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/1-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
session_start();
$nc=($_GET['m']);
if(($_SESSION["nombre"])!=""){
	

?>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Biblioteca</a>
                    </li>
                    <li>
                        <a href="#">Foro de Discución</a>
                    </li>
                    <li>
                        <a href="../php/logout.php">Cerrar Sesión</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Alumnos<!--TOmado de la base de datos -->
                </h1>
            
                <div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#IngreseAlumn">Añadir Lista</button>
    <button type="button" class="btn btn-info btn-lg" onclick = "location='../php/elimlistalum.php?m=<?php echo $nc ?>'">Eliminar Lista</button>
    
   <br><br>

  <!-- Modal -->
  <div class="modal fade" id="IngreseAlumn" role="dialog">
   <form action="../php/inselistalum.php?m=<?php echo $nc ?>" enctype="multipart/form-data" method="post">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Seleccionar lista (.csv)</h4>
        </div>
        <div class="modal-body">
   <input id="archivo" accept=".csv" name="archivo" type="file" class="btn btn-default" /> 
   <input name="MAX_FILE_SIZE" type="hidden" value="20000" /> <br>
   <input name="enviar" type="submit" class="btn btn-success" value="Importar" />
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </form>
  </div>
  
  <div class="modal fade" id="EliminAlumn" role="dialog">
   
   
      <form action="../php/elimlistalum.php" method="post">
      </form>
  
  </div>

  
</div>
         </div>
         
  <table width="100%" class="table table-bordered">
		<tbody>
  <thead>
<tr>
<th colspan="4">  </th>
</tr>
</thead>
 
		<tr>
			<td><b>NÚMERO DE CONTROL</b></td>
			<td><b>NOMBRE</b></td>
			<td><b>APELLIDO PATERNO</b></td>
			<td><b>APELLIDO MATERNO</b></td>
	</tr>
		<?php
        include ("../php/conexion.php");
		$a = $_GET['m'];
$query= "SELECT *
FROM listaalumnos
WHERE idMateria =$a
ORDER BY nocontrol";
$result=$conexion->query($query);
while ($row=$result->fetch_assoc()){
		?>
		<tr>
		<td><?php echo $row['nocontrol']; ?></td>
	<td><?php echo $row['nombre']; ?></td>
	<td><?php echo $row['apepate']; ?></td>
	<td><?php echo $row['apemate']; ?></td>
		</tr>
		<?php
}
?>
</tbody>
</table>
<br>
<a href="../Libro1.csv" download="Libro1.csv">
Descargar Ejemplo
</a>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <div class="row">
            
        </div>
        <!-- /.row -->

        <hr>
   
</body>
<?php
}else{
	
	header("Location: ../index.html");
}
?>
</html>
