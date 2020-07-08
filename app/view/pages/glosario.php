<?php require ROUT_APP.'/view/partials/header.php'; ?>
<?php require ROUT_APP.'/view/partials/nav.php';?>
	<br>
    <div class="container">
        <h1>
            <?php echo $data['tema']->nombreTema;  ?>
        </h1>
        <hr> 
        <h2>Glosario</h2>
        <ul>
            <?php foreach ($data['glosario'] as $glosario) { ?>
            <li>
                <b><?php echo $glosario->TituloGlosario ?></b>:<?php echo $glosario->DefinicionGlosario ?>
            </li>
            <?php } ?>

        </ul>  
	</div>
<?php require ROUT_APP.'/view/partials/footer.php'; ?>
