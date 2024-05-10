<?php 

	class Centrocosto extends Controllers{
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

		public function Centrocosto()
		{
			if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
			$data['page_id'] = 4;
			$data['page_tag'] = "Centrocosto Usuario";
			$data['page_name'] = "rol_usuario";
			$data['page_title'] = "Centrocosto Usuario <small> Tienda PACO</small>";
			$data['page_functions_js'] = "functions_Centrocosto.js";
			$this->views->getView($this,"Centrocosto",$data);
		}

		public function getCentrocosto()
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

		public function getSelectCentrocosto()
		{
			//echo '<script>alert("Estoy entrandoa qui")</script>';
			$htmlOptions = "";
			$arrData = $this->model->selectCentrocosto();

			if(count($arrData) > 0 ){
				for ($i=0; $i < count($arrData); $i++) { 
					if($arrData[$i]['status'] == 1 ){
					$htmlOptions .= '<option value="'.$arrData[$i]['idcentrocosto'].'">'.$arrData[$i]['nomcentrocosto'].'</option>';
					}
				}
			}
			echo $htmlOptions;
			die();		
		}


	}
 ?>