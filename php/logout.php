<?php
echo 	"<script type='text/javascript'>
					alert('Vuelve Pronto');
					</script>";
echo 	"<script type='text/javascript'>
					window.location='../index.html'
					</script>";
		session_start();
session_unset();
session_destroy();
		
?>