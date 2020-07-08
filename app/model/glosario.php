<?php

	class glosario{
		private $db;
		public function __construct(){
			$this->db=new Bd;
			
		}
		public function insertar($titulo,$descripcion,$idTema=''){
			$this->db->query("INSERT INTO `tblglosario`(`TituloGlosario`, `DefinicionGlosario`, `IdTema`) VALUES ('$titulo','$descripcion','$idTema')");
			return $this->db->insertar();
		}
		public function editar($titulo,$descripcion,$idGlosario){
			$this->db->query("UPDATE `tblglosario` SET `TituloGlosario`='$titulo',DefinicionGlosario='$descripcion' WHERE IdGlosario=$idGlosario");
			$this->db->editar();
		}
		public function registros($curso){
			$this->db->query("SELECT * FROM tbldesarrollo INNER JOIN tblasignatura ON tbldesarrollo.IdAsignatura=tblasignatura.IdAsignatura WHERE tblasignatura.IdAsignatura='$curso'");
			return $this->db->registros();
		}
		public function registro($idTema){
			$this->db->query("SELECT * FROM tblglosario WHERE IdTema='$idTema'");
			return $this->db->registros();
		}
	}
