<?php require ROUT_APP.'/view/partials/header.php'; ?>
<?php require ROUT_APP.'/view/partials/nav.php';?>
	<br>
    <div class="container">
        <h1>
            <?php echo $data['tema']->nombreTema;  ?>
        </h1>
        <hr>   
        <?php echo html_entity_decode($data['desarrollo']['body']);  ?>
	</div>
<?php require ROUT_APP.'/view/partials/footer.php'; ?>
