<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/stl_formulario.css" rel="stylesheet" type="text/css">
<title>Ingresar Productos</title>
</head>

<body>

<section>

	<form method="post" action="">
    	<h2> REGISTAR</h2>
    	<table border="0" width="550">
        	<tr>
            	<td>Id</td>
                <td><input type="text" name="txtid" value=""/></td>
            </tr>
        	<tr>
            	<td>Modelo</td>
                <td><input type="text" name="txtmodelo" value=""/></td>
            </tr>
            <tr>
            	<td>Piezaje</td>
                <td><input type="text" name="txtpiezaje" value=""/></td>
            </tr>
            <tr>
            	<td>Horma</td>
                <td><input type="text" name="txthorma" value=""/></td>
            </tr>
            <tr>
            	<td>Linea</td>
                <td><input type="text" name="txtlinea" value=""/></td>
            </tr>
            <tr>
            	<td>Tipo</td>
                <td><input type="text" name="txtmodelo_tipo" value=""/></td>
            </tr>
            <tr>
            	<td>Creado</td>
                <td><input type="text" name="txtcreado" value=""/></td>
            </tr>
            <tr>
            	<td></td>
               
            </tr>
            <tr>
            	<td colspan="2"> 
                	<?php 
						if (isset($_POST['btnregistrar'])){
							$id = $_POST['txtid'];
							$modelo= $_POST['txtmodelo'];
							$piezaje= $_POST['txtpiezaje'];
							$horma= $_POST['txthorma'];
							$linea = $_POST['txthorma'];
							$modelo_tipo = $_POST['txtmodelo_tipo'];
							$creado = $_POST['txtcreado'];
							
							require("datos_coneccion.php");
		
							$conexion = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);
							mysqli_set_charset($conexion,"utf8");
		
							if(mysqli_connect_errno()){
							echo "Fallo al conectar con la base de datos :(";	
							exit();
							}
							$rs = mysqli_query($conexion,"CALL sp_insert_productos('id','$modelo','$piezaje','$horma','$linea','$modelo_tipo','$creado')");
							if($rs){
								echo "<script> alert('registro correcto'); </script>";
							}else{
								echo "Ocurrio un error al registrar el producto :(" . mysqli_error();
							}
						}
						?>
                   </td>
               </tr>
                <tr><input type="submit" name="btnregistrar" value="Registrar" id="registrar" /></tr>
           </table> 
           </form>    
							
    	

</section>


</body>
</html>