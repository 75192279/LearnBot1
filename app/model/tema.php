<?php

	class tema{
		private $db;
		public function __construct(){
			$this->db=new Bd;
			
		}
		public function insertar($nombre,$mapa,$objetivo,$id,$image=''){
			$this->db->query("INSERT INTO `tbltemass`(`nombreTema`, `objetivoTema`, `mapaMentallTema`, `IdAsignatura`, `imagen`) VALUES ('$nombre','$objetivo','$mapa',$id,'$image')");
			return $this->db->insertar();
		}
		public function editar($nombre,$mapa,$objetivo,$id,$image){
			$this->db->query("UPDATE `tbltemass` SET `nombreTema`='$nombre',`objetivoTema`='$objetivo',`mapaMentallTema`='$mapa',`imagen`='$image' WHERE IdTema=$id");
			$this->db->editar();
		}
		public function registros($curso){
			$this->db->query("SELECT * FROM tbltemass INNER JOIN tblasignatura ON tbltemass.IdAsignatura=tblasignatura.IdAsignatura WHERE tblasignatura.IdAsignatura='$curso'");
			return $this->db->registros();
		}
		public function registro($curso){
			$this->db->query("SELECT * FROM tbltemass INNER JOIN tblasignatura ON tbltemass.IdAsignatura=tblasignatura.IdAsignatura WHERE tblasignatura.nombreAsig='$curso'");
			return $this->db->registro();
		}
	}
