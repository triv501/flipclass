<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
	 #superior{
		float: left;
 	}
		#inferior{
			clear:both;
		}
	</style>
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
                <a class="navbar-brand" href="index.php">Inicio <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Asignaturas </a>
                    </li>
                    <li>
                         <a href="listaalumnos.php?m=<?php echo $_GET['m']?>">Lista de Alumnos</a>
                    </li>
                    <li>
                        <a href="#">Biblioteca</a>
                    </li>
                    <li>
                        <a href="../php/logout.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php
  include ("../php/conexion.php");
   $mate = $_GET['m'];
	$query="select no_materia from materia where idMateria=$mate;";
	$result=$conexion->query($query);
    $row=$result->fetch_array();
?>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="container">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $row[0]; ?> <!--TOmado de la base de datos -->
                </h1>
                <h3>TEMARIO</h3>
                <hr>
                <div class="container">
  
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#tema">Añadir Tema</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#subtema">Añadir Subtema</button>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#elimina">Eliminar</button><br><br>

  <!-- Modal -->
  <div class="modal fade" id="tema" role="dialog">
   <form action="../php/insertart.php?m=<?php echo $_GET['m']; ?>" method="post">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Inserte su tema</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="tema">
        </div>
        <div class="modal-footer">
         <input type="submit" class="btn btn-success" value="Añadir" >
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    </form>
  </div>
  <div class="modal fade" id="subtema" role="dialog">
   
    <div class="modal-dialog">
       <form action="../php/insertars.php?m=<?php echo $_GET['m']; ?>" method="post">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Inserte su subtema</h4>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="subtema">
        </div>
        <div class="modal-footer">
         <input type="submit" class="btn btn-success" value="Añadir">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
   <div class="modal fade" id="elimina" role="dialog">
   
    <div class="modal-dialog">
       <form  method="post">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Elimina contenido del temario</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
          <tr>
          <td align="center"><b>TEMARIO</b></td>
          <td align="center"><b>ELIMINAR</b></td>
          </tr>
          <?php
          include ("../php/conexion.php");
          $query="SELECT * FROM temario where idMateria=5678";
		  $resultado=$conexion->query($query);
          while ($row=$resultado->fetch_assoc()){
          ?>
          <tr>
          <td><?php echo $row['nombre_tema']; ?></td>
          <td align="center">
          <a href="eliminatemario.php?id=<?php echo $row['idTemario'];?>&m=<?php echo $_GET['m']; ?>">
          <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>
          </tr>
          <?php
		  }
		  ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>
  
  
  
</div>
</div>
		</div>
         <div class="colormenu1">
  <?php
  include ("../php/conexion.php");
   $mate = $_GET['m'];
	$query="select * from temario where idMateria=$mate order by idTemario;";
	$result=$conexion->query($query);
	while ($row=$result->fetch_assoc()){
		
		if	($row['tipo']==1){
			echo "<ul class='menu'><li><a href='#'><font color='black'>".$row['nombre_tema']."</font></a></li>";
		}else if ($row['tipo']==2){
			echo "<li style='text-indent: 1em'><a href=materias2.php?m=".$_GET['m']."&b=".$_GET['m']."&a=".$row['link']."><font color='black'>".$row['nombre_tema']."</font></a></li>";
		}else{
			echo "</ul>";
		}
	}
  ?> 
           </div>
            
                <!--
                <hr>
                <h3>Archivos</h3>
                <hr>
            <div>
            <?php
			/*	include ("../php/conexion.php");
				$query= "select * from materias_doc where id_mat='5678'";
				$result=$conexion->query($query);
				while ($row=$result->fetch_assoc()){	
			?>
          
          
          	<div id="superior">
          			<h6>Titulo</h6>
         			<iframe src="http://docs.google.com/gview?url=http://materiasitz.pe.hu/<?php echo $row['ruta']; ?>&embedded=true" style="width:300px; height:400px;" frameborder="0" title="<?php echo $row['ruta']; ?>">
           	<h6><?php echo $row['ruta']; ?></h6>
				</iframe>
        	</div>
            
            <?php
				}*/
			?>
            </div>
            <div id="inferior">
            <form enctype="multipart/form-data" action="../php/uploader.php" method="POST">
				<input name="uploadedfile" type="file" /> <br>
				<input type="submit" class="btn btn-primary" value="Agregar documento">
			</form>
       </div>
       -->
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
