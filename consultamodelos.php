<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link href="css/estilos.css" rel="stylesheet" type="text/css">

<title>Coneccion con Base datos Mirla</title>
</head>

<body>
<header>
<h1> ELITO PROBANDO CONEXION A BASE DE DATOS :) </h1>
</header>
<?php 

	require("datos_coneccion.php");
		
	$conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
	mysqli_set_charset($conexion,"utf8");
		
		if(mysqli_connect_errno()){
		echo "Fallo al conectar con la base de datos :(";	
		exit();
		}
?>
<center>
<form action="" method="POST"> 
        
	<table class="busqueda" border="1" cellspacing="0" cellpadding="1">
      	<tr class="busqueda">
        	<td bgcolor="#FFFFFF">Seleccione Tipo de Modelo:</td>
            <td style="text-align: center">
				<select name="buscar"> 
					<?php  
						$columna= mysqli_query($conexion,'SELECT DISTINCT modelo_tipo from productos'); 
						$nec = mysqli_num_fields($columna);
						while($filas = mysqli_fetch_row($columna)){ 
							for($i=0;$i<$nec;$i++){
								echo "<option  value='".$filas[$i]."'>".$filas[$i]."</option>";
							}
						} 
					?>          		 
                </select>
            </td>    
            
			<td><input type="submit" name="btnlistar" value="Listar"/></td>            
        </tr>
        
     </table>
</form>
</center>

<?php	
		
/*	$conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
	mysqli_set_charset($conexion,"utf8");
		
		if(mysqli_connect_errno()){
		echo "Fallo al conectar con la base de datos :(";	
		exit();
		}
*/
?>
 <section>
     		
    <?php 
	 	echo "<br>";
		$busqueda = $_POST["buscar"];		
	 		
		$consultas = "select * from productos where modelo_tipo = '$busqueda'";					// aqui se almacena el codigo sql como texto	
		$resultados 	= mysqli_query($conexion,$consultas); 	//este de aqui es un objeto de consulta de la base datos
		$nc 			= mysqli_num_fields($resultados);		// aqui se consulta el numero de columnas y se almacena con un entero 
		$nf 			= mysqli_num_rows($resultados);			// aqui se consulta el numero de filas y se almacena con un entero 	 
	?>
     <center>
     <table border="1" width="700" cellspacing="0" cellpadding="1">
        <tr class="titulo"> 
      		<td> Id</td>
      		<td> Modelo</td>
      		<td> Piezaje</td>
      		<td> Horma</td>
      		<td> Linea</td>
      		<td> Tipo</td>
      		<td> Creado</td>    
    	</tr>
        
			<?php while($fila = mysqli_fetch_row($resultados)){ ?>
					
		<tr> 
			<?php for($i=0;$i<$nc;$i++){ ?> 
				<td> <?php echo $fila[$i]; ?></td>
			<?php } ?>
			
        </tr>
			<?php } ?>
        
 		<tr> 
      		<td colspan="6" id="texto"> 
				<?php echo 'EL TOTAL DE PRODUCTOS DIFERENTES SON: ' . $nf; ?>
			</td>       
    	</tr> 
	</table>
    </center>  
</section>

<?php echo "<br>"; ?>

</body>
<footer>
	Todos los derechos Reservados por Eli Mandujano inc.
</footer>
</html>