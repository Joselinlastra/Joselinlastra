<?php
$servidor="localhost";
$usuario="root";
$clave="";
$bdd="farmacia";
$conectar=mysqli_connect($servidor,$usuario,$clave,$bdd);
if($conectar->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
?>