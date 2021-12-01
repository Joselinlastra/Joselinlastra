<?php

session_start();

	$mysqli =new mysqli("localhost", "root", "", "farmacia");	
	$codigo =$_POST['codigo'];
	$productos =$_POST['productos'];
	$tipo =$_POST['tipo'];
	$stock =$_POST['stock'];	
	$marca =$_POST['marca'];
	$precio =$_POST['precio'];
	$sql= $mysqli->query("UPDATE farmacia SET codigo='$codigo',productos='$productos',tipo='$tipo',
		stock='$stock',precio='$precio' WHERE codigo=$'codigo'");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Registro actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">