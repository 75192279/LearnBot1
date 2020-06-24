<?php 
	//cargamos librerias
	require_once 'config/config.php';
	//require_once 'library/BD.php';
	//require_once 'library/Controller.php';
	//require_once 'library/Core.php';

	//AutoLoad php
	spl_autoload_register(function($nombreClase){
		require_once 'library/'.$nombreClase.'.php';
	});
