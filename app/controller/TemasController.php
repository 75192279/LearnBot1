<?php 
	class Temas extends Controller{
		public function __construct(){
			$this->tema=$this->model('tema');
			$this->desarrollo=$this->model('desarrollo');
			$this->glosario=$this->model('glosario');
		}
		public function list($curso){
			
			$data=$this->tema->registros($curso);
			
            //echo json_encode($data);
            $this->view('pages/tema',$data);
        }
        public function desarrollo($idTema){
			$tema=$this->tema->registro($idTema);
			$desarrollo=$this->desarrollo->registro($idTema);
			$data=[
				"desarrollo"=>["IdDesarrollo"=>$desarrollo->IdDesarrollo,"body"=>html_entity_decode($desarrollo->body)],
				"tema"=>$tema,
			];
            $this->view('pages/desarrollo',$data);
			return;
		}
		public function glosario($idTema){
			$tema=$this->tema->registro($idTema);
			$glosario=$this->glosario->registro($idTema);
			$data=[
				"glosario"=>$glosario,
				"tema"=>$tema,
			];
            $this->view('pages/glosario',$data);
			return;
		}		
	}
