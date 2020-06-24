<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<link rel="stylesheet"  type="text/css" href="fonts.css"> 
	

</head>

<body>

	<div class="header">
		<h1>Cursos de Reforzamiento </h1>
		
	</div>

<?php

$inc= include("conexion.php");




if($inc){
	$consulta = "SELECT * FROM tblasignatura";
	$resultado = mysqli_query($conex,$consulta);
	if($resultado){

		while($row = $resultado->fetch_array())
		{

			$IdAsignatura=$row['IdAsignatura'];
			$nombreAsig=$row['nombreAsig'];
			$Descripcion=$row['Descripcion'];
			$objetivoAsignatura=$row['objetivoAsignatura'];
			?>
			<div class="General">

             <div class="ContenidoBD">
             	<nav class="nav">
             		<ul class="Liasignatura">
             			<li class="lista"> 
             				<a href="articulo.php?curso=<?php echo $nombreAsig; ?>"><b><?php echo $nombreAsig; ?></b><span class="icon-circle-right"></span></a>
             			
             		   </li>
             	   </ul>
             		
             	</nav>
             	
             	
             </div>

             <div class="contenido2">
             		<p>
             			<b>Objetivo:</b> <?php echo $objetivoAsignatura; ?><br><br>
          
             			<b>Descripcion:</b> <?php echo $Descripcion; ?></b>
         

             		</p>
             		
             	</div>
             </div>

			<?php

		}

	}
}

?>
	<div class="footer">

		<div>

			<img src="logo01.jpg.">

		</div>

		<div class="footer1">
			<h3>Visitenos a nuestro chatbot estaremos pendiente para ayudarte</h3>
			<p><b>Contacto:</b> @mpb</p>
			<p><b>Informate:</b>@mpb</p>
			<p><b>Telefono:</b> 987654321</p>
			<p><b>Facebook:</b> MPB</p>
			<p><b>Instagram:</b> @mpb</p>
			<p><b>Contacto:</b> @mpb</p>


		</div>
				
			
	</div>

</body>
</html>



