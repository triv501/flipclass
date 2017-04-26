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
  	<link rel="stylesheet" href="css/stylo.css">

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
include ("../php/conexion.php");
		if(($_SESSION["nombre"])!=""){
			
			
$nomusu=($_GET['nomusu']);



			$sql="select idMateria  from listaalumnos where nocontrol='$nomusu';";
		
			$result=$conexion->query($sql);
			$arr = $result->fetch_array();

			$query="select * from materia where idMateria='$arr[0]';";
		
			
			$result=$conexion->query($query);
		
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
                <a class="navbar-brand" href="#">Inicio <span class="glyphicon glyphicon-chevron-right"></span></a>
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

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sección
                    <small>Asignaturas</small>
      	 
                </h1>
               
               <hr>
            </div>
        </div>
        <!-- /.row -->

        <!-- Project One -->
        <!--WHile-->
        
        <div class="modal fade" id="materia" role="dialog">
   <form action="regasignatura.php" method="post" enctype="multipart/form-data">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registro de Asignatura</h4>
        </div>
        <div class="modal-body">
         <!-- Cuerpo -->
		<p>Nombre de la asignatura</p>
          <input type="text" class="form-control" name="nombre" id="nombre"><br>
        <p>Objetivo</p>
          <input type="text" class="form-control" name="objetivo" id="objetivo"><br>
        <p>Habilidades previas</p>
          <input type="text" class="form-control" name="habilidades" id="habilidades"><br>
        <p>Imagen</p>
          <input   type="file"  class="form-control" name="foto" id="foto"/><br>
          <!-- fin cuerpo --> 
        </div>
        <div class="modal-footer">
         <input type="submit" class="btn btn-success" value="Añadir" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
    </form>
  </div>
        
        
        <?php 
				while ($row=$result->fetch_assoc()){
				//echo "materia ".$row['no_materia'];	
			?>
        <div class="row">
          
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="<?php echo $row['ruta'] ?>" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><?php echo $row['no_materia'] ?></h3>
                <h4>Objetivo</h4>
                <p><?php echo $row['objetivo'] ?></p>
                <h4>Habilidades previas</h4>
                <p><?php echo $row['hab_prev'] ?></p>
                <a class="btn btn-primary" href="materiasalumno.php?m=<?php echo $row['idMateria']?>&b=<?php echo $nomusu ?>">Acceder <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <hr>
         <?php
				}
	      ?>
        <!--termina while-->
        <!-- /.row -->

        <hr>
</body>
<?php
}
else{
	
	header("Location: ../index.html");
}
?>
</html>