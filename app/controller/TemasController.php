<?php 
	class Temas extends Controller{
		public function __construct(){
			$this->tema=$this->model('tema');
		}
		public function list($curso){
			
			$data=$this->tema->registros($curso);
			
            //echo json_encode($data);
            $this->view('pages/tema',$data);
        }
        
		
		
	}
