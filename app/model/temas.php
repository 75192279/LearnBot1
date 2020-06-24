<!DOCTYPE html>
<html>
<head>
	<title>Temas</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet"  type="text/css" href="fonts.css"> 
	

</head>

<body>

	<div class="header">
		<h1>Ciencia y Ambiente </h1>
		
	</div>

<?php

$inc= include("conexion.php");

if($inc){
	$consulta = "SELECT * FROM tbltemass";
	$resultado = mysqli_query($conex,$consulta);
	if($resultado){

		while($row = $resultado->fetch_array())
		{

			$IdTema=$row['IdTema'];
			$nombreTema=$row['nombreTema'];
			$ObejivoTema=$row['objetivoTema'];
			$mapaMentall=$row['mapaMentallTema'];
			$IdAsignatura=$row['IdAsignatura'];
			?>

			
			<div class="General">

             <div class="ContenidoBD">
             	<nav class="nav">
             		<ul class="ListaTema">
             			<li class="lista"> 
             				<a href="https://actividadeseducativas.net/sexto-grado-de-primaria/"><b><?php echo $nombreTema;?></b><span class="icon-circle-right"></span></a>
             			
             		   </li>
             	   </ul>
             		
             	</nav>
             	
             	
             </div>

             <div class="contenido2">
             		<p>
             			<b>Objetivo:</b> <?php echo $ObejivoTema; ?><br><br>
             			<b>MapaMental:</b><a href="http://angelamariasuarezramirez.blogspot.com/2019/07/geometria-quinto.html">Visitar a esta pagina</a>
         

             		</p>
             		
             	</div>
             </div>

			<?php

		}

	}
}

?>