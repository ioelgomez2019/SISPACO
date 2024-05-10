<?php 

	class Objetivoestrategico extends Controllers{
		public function __construct()
		{
			parent::__construct();
			session_start();
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(4);
		}

		public function Objetivoestrategico()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_id'] = 4;
			$data['page_tag'] = "Objetivoestrategico Usuario";
			$data['page_name'] = "rol_usuario";
			$data['page_title'] = "Objetivoestrategico Usuario <small> Tienda PACO</small>";
			$data['page_functions_js'] = "functions_Objetivoestrategico.js";
			$this->views->getView($this,"Objetivoestrategico",$data);
		}

		public function getObjetivoestrategico()
		{
			$btnView = '';
			$btnEdit = '';
			$btnDelete = '';
			$arrData = $this->model->selectCentrocosto();

			for ($i=0; $i < count($arrData); $i++) {

				if($arrData[$i]['status'] == 1)
				{
					$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
				}else{
					$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
				}

				if($_SESSION['permisosMod']['u']){
					$btnView = '<button class="btn btn-secondary btn-sm btnPermisosRol" onClick="fntPermisos('.$arrData[$i]['idrol'].')" title="Permisos"><i class="fas fa-key"></i></button>';
					$btnEdit = '<button class="btn btn-primary btn-sm btnEditRol" onClick="fntEditRol('.$arrData[$i]['idrol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
				}
				if($_SESSION['permisosMod']['d']){
					$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idrol'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
				</div>';
				}
				$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
			}
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			die();
		}

		public function getSelectObjetivoestricoNombre()
		{
			//echo '<script>alert("Estoy entrandoa qui")</script>';
			$htmlOptions = "";
			//codificamos y consultamos la tabla objetivo estrategico
			$arrData = $this->model->SelectObjetivoestricoNombre();
			$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);
			//traemos y consultamos la tabla indicador de objetivo estrategico isntitucional
			$arrDataindicadoroei = $this->model->Select();
			$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);
			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					}
				}
			}
			$data = json_decode($datajson,JSON_UNESCAPED_UNICODE);
			//echo 'status = '.$data[1]['idobjestr'].'<br>';
			echo $datajson;
			//echo $data[2]['idobjestr'];
			//echo $htmlOptions;
			die();		
		}
		public function getSelectObjetivoestricooei()
		{
			//echo '<script>alert("Estoy entrandoa qui")</script>';
			$htmlOptions = "";
			$arrData = $this->model->SelectObjetivoestricoNombre();

			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idobjestr'].'">'.$arrData[$i]['nomobjestr'].'</option>';
					}
				}
			}
			
			echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			//return $arrData;
			die();		
		}



	}
 ?>