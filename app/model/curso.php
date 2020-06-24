<?php

	class curso{
		private $db;
		public function __construct(){
			$this->db=new Bd;
			
		}
		public function registros(){
			$this->db->query("SELECT * FROM tblasignatura ORDER BY tblasignatura.IdAsignatura DESC");
			return $this->db->registros();
		}
		public function editar($nombre,$descripcion,$objetivo,$id,$image){
			$this->db->query("UPDATE `tblasignatura` SET `nombreAsig`='$nombre',`Descripcion`='$descripcion',`objetivoAsignatura`='$objetivo',`imagen`='$image' WHERE IdAsignatura=$id");
			$this->db->editar();
		}
		public function insertar($nombre,$descripcion,$objetivo,$image=''){
			$this->db->query("INSERT INTO tblasignatura(nombreAsig, Descripcion, objetivoAsignatura, imagen) values('$nombre','$descripcion','$objetivo','$image')");
			return $this->db->insertar();
		}
		public function registro($codigo,$dni){
			$this->db->query("SELECT * from tbl_votos where ( id_codigo='".$codigo."' OR id_codigo='".$dni."' ) ");
			return $this->db->registro();
		}
	}
