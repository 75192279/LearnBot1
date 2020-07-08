
<?php 
	class Dashboard extends Controller{
		public function __construct(){
			$this->curso=$this->model('curso');
			$this->tema=$this->model('tema');
			$this->desarrollo=$this->model('desarrollo');
			$this->glosario=$this->model('glosario');
			$this->upload=$this->model('upload');
		}
		public function index(){
			$this->view('pages/dashboard/index');
		}
		public function curso(){
			$data=$this->curso->registros();
			$this->view('pages/dashboard/curso',$data);
		}
		public function glosario(){
			$this->view('pages/dashboard/glosario');
		}
		public function tema($idTema){
			$this->view('pages/dashboard/tema');
		}
		public function desarrollo($idTema){
			$tema=$this->tema->registro($idTema);
			$desarrollo=$this->desarrollo->registro($idTema);
			$data=[
				"desarrollo"=>["IdDesarrollo"=>$desarrollo->IdDesarrollo,"body"=>html_entity_decode($desarrollo->body)],
				"tema"=>$tema,
			];
			echo json_encode($data);
			return;
		}
		public function glosarios($idTema){
			$tema=$this->tema->registro($idTema);
			$glosario=$this->glosario->registro($idTema);
			$data=[
				"glosario"=>$glosario,
				"tema"=>$tema,
			];
			echo json_encode($data);
			return;
		}
		
		public function listtema($curso){

			$data=$this->tema->registros($curso);
			echo json_encode($data);
			return;
		}
		public function listcurso(){
			$data=$this->curso->registros();
			echo json_encode($data);
			return;
		}
		public function createtema(){
			if ($_POST['nombre']) {
				$nombre=trim($_POST['nombre']);		
				$idAsignatura=trim($_POST['idAsignatura']);		
				$objetivo=trim($_POST['objetivo']);
				$mapa=trim($_POST['mapa']);

				
				if (!empty($nombre)&&!empty($idAsignatura)) {
					$uploadDir = 'public/assets/images/'; 
					$fileName =$this->generateRandomString().''.basename($_FILES["file"]["name"]); 
					$targetFilePath = $uploadDir . $fileName; 
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
					
					// Allow certain file formats 
					$allowTypes = array('jpg', 'png', 'jpeg'); 
					$uploadedFile='';
					if(in_array($fileType, $allowTypes)){
						// Upload file to the server 
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
							$uploadedFile = $fileName; 
						}else{ 
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, there was an error uploading your file.'; 
						} 
					}
					else{ 
						$uploadStatus = 0; 
						$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
					}
					$this->tema->insertar($nombre,$mapa,$objetivo,$idAsignatura,$uploadedFile);
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function edittetema(){
			if ($_POST['nombre']) {
				$nombre=trim($_POST['nombre']);		
				$idTema=trim($_POST['idTema']);		
				$objetivo=trim($_POST['objetivo']);
				$mapa=trim($_POST['mapa']);
				$nameImage=trim($_POST['nameImage']);
				
				if (!empty($nombre)&&!empty($idTema)) {
					$uploadDir = 'public/assets/images/'; 
					$fileName =$this->generateRandomString().''.basename($_FILES["file"]["name"]); 
					$targetFilePath = $uploadDir . $fileName; 
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
					
					// Allow certain file formats 
					$allowTypes = array('jpg', 'png', 'jpeg'); 
					$uploadedFile='';
					if(in_array($fileType, $allowTypes)){
						// Upload file to the server 
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
							$uploadedFile = $fileName; 
						}else{ 
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, there was an error uploading your file.'; 
						} 
					}
					else{ 
						$uploadStatus = 0; 
						$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
					}

					$nameImage=$uploadedFile==''?$nameImage:$uploadedFile;
					$this->tema->editar($nombre,$mapa,$objetivo,$idTema,$nameImage);
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function createcurso(){
			if ($_POST['nombre']) {
				$nombre=trim($_POST['nombre']);					
				$descripcion=trim($_POST['descripcion']);
				$objetivo=trim($_POST['objetivo']);
				
				if (!empty($nombre)&&!empty($descripcion)) {
					$uploadDir = 'public/assets/images/'; 
					$fileName =$this->generateRandomString().''.basename($_FILES["file"]["name"]); 
					$targetFilePath = $uploadDir . $fileName; 
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
					
					// Allow certain file formats 
					$allowTypes = array('jpg', 'png', 'jpeg'); 
					$uploadedFile='';
					if(in_array($fileType, $allowTypes)){
						// Upload file to the server 
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
							$uploadedFile = $fileName; 
						}else{ 
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, there was an error uploading your file.'; 
						} 
					}
					else{ 
						$uploadStatus = 0; 
						$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
					}
					$this->curso->insertar($nombre,$descripcion,$objetivo,$uploadedFile);
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function editcurso(){
			if ($_POST['nombre']) {
				$nombre=trim($_POST['nombre']);		
				$idAsignatura=trim($_POST['idAsignatura']);		
				$objetivo=trim($_POST['objetivo']);
				$descripcion=trim($_POST['descripcion']);
				$nameImage=trim($_POST['nameImage']);
				
				if (!empty($nombre)&&!empty($idAsignatura)) {
					$uploadDir = 'public/assets/images/'; 
					$fileName =$this->generateRandomString().''.basename($_FILES["file"]["name"]); 
					$targetFilePath = $uploadDir . $fileName; 
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
					
					// Allow certain file formats 
					$allowTypes = array('jpg', 'png', 'jpeg'); 
					$uploadedFile='';
					if(in_array($fileType, $allowTypes)){
						// Upload file to the server 
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
							$uploadedFile = $fileName; 
						}else{ 
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, there was an error uploading your file.'; 
						} 
					}
					else{ 
						$uploadStatus = 0; 
						$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
					}

					$nameImage=$uploadedFile==''?$nameImage:$uploadedFile;
					$this->curso->editar($nombre,$descripcion,$objetivo,$idAsignatura,$nameImage);
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function createdesarrollo(){
			if ($_POST['id']) {
				$body=trim($_POST['body']);		
				$idTema=trim($_POST['id']);	
				$idDesarrollo=trim($_POST['idDesarrollo']);	
				if (!empty($body)&&!empty($idTema)) {
					$uploadDir = 'public/assets/images/'; 
				
					if($idDesarrollo==''){
						$this->desarrollo->insertar(htmlentities($body),$idTema);
					}
					else{
						$this->desarrollo->editar(htmlentities($body),$idDesarrollo);
					}
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function createglosario(){
			if ($_POST['id']) {
				$titulo=trim($_POST['titulo']);		
				$idTema=trim($_POST['id']);	
				$descripcion=trim($_POST['descripcion']);	
				if (!empty($titulo)&&!empty($idTema)) {
				
					$this->glosario->insertar($titulo,$descripcion,$idTema);

					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}
		}
		
		public function updateglosario(){
			if ($_POST['id']) {
				$titulo=trim($_POST['titulo']);		
				$idGlosario=trim($_POST['id']);	
				$descripcion=trim($_POST['descripcion']);	
				if (!empty($titulo)&&!empty($idGlosario)) {
				
					$this->glosario->editar($titulo,$descripcion,$idGlosario);

					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se actualizaron con exito',
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}
		}
		public function uploadarchive(){
			if ($_FILES["file"]) {
				if (!empty($_FILES["file"])) {
					$uploadDir = 'public/assets/images/'; 
					$fileName =$this->generateRandomString().''.basename($_FILES["file"]["name"]); 
					$targetFilePath = $uploadDir . $fileName; 
					$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
					
					// Allow certain file formats 
					$allowTypes = array('jpg', 'png', 'jpeg'); 
					$uploadedFile='';
					if(in_array($fileType, $allowTypes)){
						// Upload file to the server 
						if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
							$uploadedFile = $fileName; 
						}else{ 
							$uploadStatus = 0; 
							$response['message'] = 'Sorry, there was an error uploading your file.'; 
						} 
					}
					else{ 
						$uploadStatus = 0; 
						$response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
					}

					$nameImage=$uploadedFile;
					$this->upload->insertar($fileName,$nameImage);
					echo json_encode([
						'error'=>false,
						'message'=>'Los datos se registraron con exito',
						'data'=>$nameImage,
					]);
				}
				else{
					echo json_encode([
						'error'=>true,
						'message'=>'Rellena todo los campos requeridos',
					]);
				}
			}
			else{
				echo json_encode([
					'error'=>true,
					'message'=>'acesso denegado',
				]);
			}	
		}
		public function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
		
	}
