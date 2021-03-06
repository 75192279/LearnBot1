<?php require ROUT_APP.'/view/partials/header.php'; ?>
<?php require ROUT_APP.'/view/partials/nav.php';?>
	<br>
    <div class="container">
    	<div class="row">
		<?php
			foreach($data as $item){
                $imagen="public/assets/images/matematica.jpeg";
                if($item->imagen!=""){
                    $imagen='public/assets/images/'.$item->imagen;
                }
				?>
					<div class="col-md-6">
						<div class="card mb-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<a href="?url=temas/desarrollo/<?php echo $item->IdTema; ?>">
										<img src="<?php echo $imagen;?>" class="card-img" alt="...">
									</a>
								</div>
								<div class="col-md-8">
								<div class="card-body">
                                
									<h5 class="card-title"><a href="?url=temas/desarrollo/<?php echo $item->IdTema; ?>"><?php echo $item->nombreTema; ?></a></h5>
									<p class="card-text">
                                       <b>Objetivo:</b> <?php echo $item->objetivoTema; ?><br><br>
                                        <b>MapaMental:</b><a href="<?php echo $item->mapaMentallTema; ?>">Visitar a esta pagina</a>
										<b>Glosario:</b><a href="?url=temas/glosario/<?php echo $item->IdTema; ?>">Ver glosario</a>
									</p>
									<a href="?url=temas/desarrollo/<?php echo $item->IdTema; ?>">Ver mas...</a>
								</div>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
		?>
		</div>
	</div>
<?php require ROUT_APP.'/view/partials/footer.php'; ?>
