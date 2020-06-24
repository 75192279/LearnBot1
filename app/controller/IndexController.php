<?php 
	class Index extends Controller{
		public function __construct(){
			$this->curso=$this->model('curso');
		}
		public function index(){
			$data=$this->curso->registros();
			
			$this->view('pages/index',$data);
		}
		public function list(){
			
		}
		
		
	}
