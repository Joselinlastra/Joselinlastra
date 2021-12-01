<?php
session_start();
if(isset($_SESSION['nombreusu']))
{
	$codigo = $_GET['codigo'];
	$mysqli = new mysqli("localhost", "root", "", "farmacia");		
	$sql = $mysqli->query("DELETE from farmacia where codigo='$codigo'");
	echo "
	<script>
	alert('Registro eliminado');
	</script>";

	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>