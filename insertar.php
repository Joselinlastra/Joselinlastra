<?php
			$mysqli = new mysqli("localhost", "root", "", "farmacia");
				$codigo =$_POST['codigo'];
				$productos =$_POST['productos'];
				$tipo =$_POST['tipo'];	
				$stock =$_POST['stock'];
				$marca =$_POST['marca'];							
				$precio =$_POST['precio'];
										
			$sql = $mysqli->query( "INSERT INTO 'farmacia'('codigo','productos','tipo','stock','marca','precio') VALUES ('$codigo','$productos','$tipo','$stock','$marca','$precio')");			
	?>	
		    <SCRIPT LANGUAGE="javascript"> 
            alert("Producto Registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">