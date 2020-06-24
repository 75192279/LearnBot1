<?php require ROUT_APP.'/view/partials/header.php'; ?>
<?php require ROUT_APP.'/view/partials/nav.php';?>
	<br>
    <div class="container">
    	<div class="row">
		<?php
			foreach($data as $item){
				?>
					<div class="col-md-6">
						<div class="card mb-3" style="max-width: 540px;">
							<div class="row no-gutters">
								<div class="col-md-4">
									<?php
										$imagen="public/assets/images/asig.jpg";
										if($item->imagen!=""){
											$imagen='public/assets/images/'.$item->imagen;
										}
									?>
									<img src="<?php echo $imagen; ?>" class="card-img" alt="...">
								</div>
								<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title"><a href="?url=temas/list/<?php echo $item->IdAsignatura; ?>"><?php echo $item->nombreAsig; ?></a></h5>
									<p class="card-text">
										<b>Objetivo:</b><?php echo $item->objetivoAsignatura; ?><br>

										<b>Descripcion:</b><?php echo $item->Descripcion; ?>
									</p>
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
