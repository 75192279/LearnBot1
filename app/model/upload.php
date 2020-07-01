<?php

	class upload{
		private $db;
		public function __construct(){
			$this->db=new Bd;
			
		}
		public function insertar($name,$url=''){
			$this->db->query("INSERT INTO `tlbupload`(`name`, `url`) VALUES ('$name','$url')");
			return $this->db->insertar();
		}
		public function registros(){
			$this->db->query("SELECT `id`, `name`, `url` FROM `tlbupload`");
			return $this->db->registros();
		}
		public function registro($name){
			$this->db->query("SELECT `id`, `name`, `url` FROM `tlbupload` WHERE  name='$name'");
			return $this->db->registro();
		}
	}
