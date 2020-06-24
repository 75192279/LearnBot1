<!DOCTYPE html>
<html>
<head>
	<title>TemasCienciaYAmbiente</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet"  type="text/css" href="fonts.css"> 
	

</head>

<body>


<?php

 $inc= include("conexion.php");

if($inc){
	$curso = $_GET['curso'];
	$consulta = "SELECT * FROM tbltemass INNER JOIN tblasignatura ON tbltemass.IdAsignatura=tblasignatura.IdAsignatura WHERE tblasignatura.nombreAsig='$curso'";
	$resultado = mysqli_query($conex,$consulta);
	if($resultado){
		?>
		<div class="header">
		<h1><?php echo $curso; ?></h1>
		
	</div>
	<?php
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
</body>
</html>
