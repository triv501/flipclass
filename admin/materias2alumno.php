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
    <title>admin materias</title>

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
$nc=($_GET['nc']);
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
                <a class="navbar-brand" href="vistaalumno.php?nomusu=<?php echo $nc ?>">INICIO <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="vistaalumno.php?nomusu=<?php echo $nc ?>">Asignaturas <span class="glyphicon glyphicon-menu-down"></span></a>
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

    <!-- Page Content -->
    
    <div >
	<div class="colormenu2">
           	<h3 style="color: black">Temario</h3>
            	<?php
  include ("../php/conexion.php");
	$mate=$_GET['m'];
	$query="select * from temario where idMateria=$mate order by idTemario;";
	$result=$conexion->query($query);
	while ($row=$result->fetch_assoc()){
		
		if	($row['tipo']==1){
			echo "<ul class='menu'><li><a href='#'><font color='black'>".$row['nombre_tema']."</font></a></li>";
		}else if ($row['tipo']==2){
			echo "<li style='text-indent: 1em'><a href=materias2alumno.php?m=".$_GET['m']."&b=".$_GET['m']."&a=".$row['link']."><font color='black'>".$row['nombre_tema']."</font></a></li>";
		}else{
			echo "</ul>";
		}
	}
  ?> 
            </div>
        <!-- Page Heading -->
            
            
               <div style="display: inline-block; float: left;" class="archivos">
               	
                   
                <hr>
                <h3>Archivos</h3>
                <hr>
            <div >
            <?php
				include ("../php/conexion.php");
				$query= "select * from archivos where idMateria='".$_GET['b']."' and link='".$_GET['a']."'";
				$result=$conexion->query($query);
				if (isset($result)){
				while ($row=$result->fetch_assoc()){	
			?>
          
          
          	<div id="superior">
          			<h6>Titulo</h6>
         			<iframe src="http://docs.google.com/gview?url=http://materiasitz.pe.hu/<?php echo $row['ruta']; ?>&embedded=true" style="width:300px; height:400px;" frameborder="0" title="<?php echo $row['ruta']; ?>">
				</iframe>
        	</div>
            
            <?php
				}
				}
			?>
            </div>
            <div id="inferior">
           
       </div>
       
        </div>
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
