<?php

	class desarrollo{
		private $db;
		public function __construct(){
			$this->db=new Bd;
			
		}
		public function insertar($body,$idTema=''){
			$this->db->query("INSERT INTO `tbldesarrollo`(`body`, `IdTema`) VALUES ('$body','$idTema')");
			return $this->db->insertar();
		}
		public function editar($body,$idDesarrollo){
			$this->db->query("UPDATE `tbldesarrollo` SET `body`='$body' WHERE IdDesarrollo=$idDesarrollo");
			$this->db->editar();
		}
		public function registros($curso){
			$this->db->query("SELECT * FROM tbldesarrollo INNER JOIN tblasignatura ON tbldesarrollo.IdAsignatura=tblasignatura.IdAsignatura WHERE tblasignatura.IdAsignatura='$curso'");
			return $this->db->registros();
		}
		public function registro($idTema){
			$this->db->query("SELECT * FROM tbldesarrollo WHERE IdTema='$idTema'");
			return $this->db->registro();
		}
	}
