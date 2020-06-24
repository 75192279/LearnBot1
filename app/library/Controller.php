<?php 
	//clase controlador actual
	class Controller{
		//cargar el modelo
		public function model($model){
			//carga
			require_once 'app/model/'.$model.'.php';
			//Instanciar el modelo
			return new $model();
		}
		public function view($view,$data=[]){
			//chequear si el archivo existe 
			if (file_exists('app/view/'.$view.'.php')) {	
				require_once 'app/view/'.$view.'.php';
			}
			else{
				//si el archivo no existe 
				die('la vista no existe');
			}
		}
	}