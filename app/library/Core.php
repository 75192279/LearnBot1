<?php 
	/*
	Mapear el url ingresada en el navigador
	1-controller
	2-Metodo ==> es una funcion en programacio orientado objeto
	3-Parametro ingresada
	*/
	class Core{
		protected $controladorActual='Index';
		protected $metodoActual='index';
		protected $parametros=[];
		public function __construct(){
			//print_r($this->getUrl());
			$url=$this->getUrl();
			//buscar en controladores si existe el controller
			if (file_exists('app/controller/'.ucwords($url[0]).'Controller.php')) {
				//si existe se setea como controlador por defecto
				$this->controladorActual=ucwords($url[0]);

				//unset indece
				unset($url[0]);
				
			}
			/*
			0,1,2
			o=>controlADOR
			1=>metodo
			2=>parametro
			*/
			//requerir el controlador
			require_once "app/controller/".$this->controladorActual.'Controller.php';
			$this->controladorActual=new $this->controladorActual;
			//Chequear la segunda parte de la url que seria el metodo
			if (isset($url[1])) {
				if (method_exists($this->controladorActual, $url[1])) {
					//chequemos el metodo
					$this->metodoActual=$url[1];	
					unset($url[1]);

				}				
			}
			//probar traer metodo
			//echo $this->metodoActual;

			//obtener los posibles pararmetros
			$this->parametros=$url ? array_values($url) : [];
			//llamar callback con parametros array
			call_user_func_array([$this->controladorActual,$this->metodoActual],$this->parametros);

		}	
		public function getUrl(){
			//echo $_GET['url'];
			if(isset($_GET['url'])){
				$url=rtrim($_GET['url'],'/');
				$url=filter_var($url, FILTER_SANITIZE_URL);
				$url=explode('/', $url);
				return $url;
			}
		}
	}


