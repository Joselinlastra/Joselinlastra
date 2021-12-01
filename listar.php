  <?php
	session_start();
	if(isset($_SESSION['nombreusu']))
	{
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>FARMACIA</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
	 <link type="text/css" href="css/jquery.dataTables_themeroller.css"rel="stylesheet"/>
	 <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
	</script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
	<script src="js/metodos.js"></script>
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Farmacia</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					
					<ul class="nav navbar-nav navbar-right">
					
				    </ul>			
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="row">	
			<a class="btn btn-success" data-toggle="modal" data-target="#nuevoUsu"href='insertar.php'>Nuevo</a><br><br>
			<table class='table'>
				<tr>
					<th>CODIGO</th><th>PRODUCTOS</th><th>TIPO</th><th>STOCK</th><th>MARCA</th><th>PRECIO</th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "farmacia");		
			if ($mysqli->connect_errno){
			    echo "Fallo al conectar a MySQL: (" .$mysqli->connect_errno.") ".$mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM farmacia";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' 
				    	data-codigo='".$fila[0]."' 
				    	data-productos='".$fila[1]."' 
				    	data-stock='".$fila[2]."' 
				    	data-tipo='".$fila[3]."' 
				    	data-marca='".$fila[4]."' 
				    	data-precio='".$fila[5]."' 
				    	class='btn btn-primary' href='actualiza.php'><span class='glyphicon glyphicon-edit'>Actualizar</span></a>";	
					echo "<a class='btn btn-danger' href='elimina.php?codigo=".$fila[0]."'>Eliminar<span class='glyphicon glyphicon-trash'></span></a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();			
?>
	        </table>
		</div> 
		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="post">              		
                       		<div class="form-group">
                       			<label for="codigo">CODIGO:</label>
                       			<input class="form-control" id="codigo" name="codigo" type="text" placeholder="Ingrese código"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="productos">Producto:</label>
                       			<input class="form-control" id="productos" name="productos" type="text" placeholder="Ingrese Producto"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="tipo">Tipo:</label>
                       			<input class="form-control" id="tipo" name="tipo" type="text" placeholder="Ingrese Tipo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="stock">Stock:</label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Ingrese Stock"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="marca">Marca:</label>
                       			<input class="form-control" id="marca" name="marca" type="text" placeholder="Ingrese Marca"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="precio">Precio:</label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Ingrese Precio"></input>
                       		</div>

							<button type="button" class="btn btn-primary" data-dismiss="modal" href='insertar.php'>Guardar</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                       </form>
                    </div>   
                </div>
            </div>
        </div> 
        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar datos</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST">                       		 
                      		<div class="form-group">
                       			<label for="codigo">CODIGO:</label>
                       			<input class="form-control" id="codigo" name="codigo" type="text" placeholder="Ingrese Código"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="productos">Productos:</label>
                       			<input class="form-control" id="productos" name="productos" type="text" placeholder="Ingrese Producto"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="tipo">Tipo:</label>
                       			<input class="form-control" id="tipo" name="tipo" type="text" placeholder="Ingrese Tipo"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="stock">Stock:</label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Ingrese Stock"></input>
                       		</div>
                       		<div class="form-group">
                       			<label for="marca">Marca:</label>
                       			<input class="form-control" id="marca" name="marca" type="text" placeholder="Ingrese Marca"></input>
                       		</div>
                      		<div class="form-group">
                       			<label for="precio">Precio:</label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Ingrese Precio"></input>
                       		</div>
									<button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>                      
									<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>							
                       </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('codigo')
		  var recipient1 = button.data('productos')
		  var recipient2 = button.data('tipo')
		  var recipient3 = button.data('stock')
		  var recipient4 = button.data('marca')
		  var recipient5 = button.data('precio')
		   // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		 
		  var modal = $(this)		 
		  modal.find('.modal-body #codigo').val(recipient0)
		  modal.find('.modal-body #productos').val(recipient1)
		  modal.find('.modal-body #tipo').val(recipient2)
		  modal.find('.modal-body #stock').val(recipient3)
		  modal.find('.modal-body #marca').val(recipient4)		 		 
		  modal.find('.modal-body #precio').val(recipient5)		 		 
		});
		
	</script>
	
</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>