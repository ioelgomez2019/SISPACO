<?php 

class Cuadronecesidad extends Controllers{
	public function __construct()
	{
		parent::__construct();
		session_start();
		session_regenerate_id(true);
		if(empty($_SESSION['login']))
		{
			header('Location: '.base_url().'/login');
		}
		getPermisos(4);
	}

	public function Cuadronecesidad()
	{
		if(empty($_SESSION['permisosMod']['r'])){
			header("Location:".base_url().'/dashboard');
		}
		$data['page_tag'] = "Cuadronecesidad";
		$data['page_title'] = "Cuadro nesesidad <small>Tienda PACO</small>";
		$data['page_name'] = "cuadronesesidad";
		$data['page_functions_js'] = "functions_cuadronecesidad.js";
		$this->views->getView($this,"Cuadronecesidad",$data);
	}
	public function getSelectcuanes(){
				$btnView = '';
				$btnEdit = '';
				$btnDelete = '';
				$arrData = $this->model->Selectcuanes();
				for ($i=0; $i < count($arrData); $i++) {
					if($_SESSION['permisosMod']['u']){
						
						$btnEdit = '<button class="btn btn-primary btn-sm btnEditCC" onClick="openModaleditcn('.$arrData[$i]['idNecesidad'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
					}
					if($_SESSION['permisosMod']['d']){
						$btnDelete = '<button class="btn btn-danger btn-sm btnDelRol" onClick="fntDelRol('.$arrData[$i]['idNecesidad'].')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
					</div>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';
				}
				$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo $datajson;
				die();
		}
	//insertamos
		
	//empezamos con la actualizacion
	public function setCuadronesesidad(){
		//error_reporting(0);
			//[idCuadronecesidad] => 3
    //[txtRequerimiento] => Papel bond
    //[txtEspgas] => 1
    //[txtCodigocn] => 	2.1.15.11
    //[txtUnidadmed] => paquete
    //[txtCant] => 3
    //[txtCostunit] => 11
    //[txtMes] => Enero
	//idactestrategica
		if($_POST){
			//dep($_POST);exit;
			if (
				empty($_POST['txtRequerimiento']) || empty($_POST['txtEspgas'])
				|| empty($_POST['txtCodigocn']) || empty($_POST['txtUnidadmed'])
				|| empty($_POST['txtCant']) || empty($_POST['txtCostunit'])|| empty($_POST['txtMes'])
			)
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');
			}else{ 
				$idCuadronecesidad = strClean($_POST['idCuadronecesidad']);
				$strRequerimiento = strClean($_POST['txtRequerimiento']);
				$strEspgas = strClean($_POST['txtEspgas']);
				//$strCoe = ucwords(strClean($_POST['txtCoe']));
				$strCodigocn = strClean($_POST['txtCodigocn']);
				//$strUmoe = intval(strClean($_POST['txtUmoe']));
				$strUnidadmed = strClean($_POST['txtUnidadmed']);
				$strCant = strClean($_POST['txtCant']);

				$strCostunit = strClean($_POST['txtCostunit']);
				$strMes = strClean($_POST['txtMes']);
				$idactestrategica = strClean($_POST['idactestrategica']);

				$request_act = "";
				if($idCuadronecesidad == 0)
				{
					$option = 1;
					//if($_SESSION['permisosMod']['w']){
						$request_act = $this->model->insertCuanes($strRequerimiento, 
																	$strEspgas,
																	$strCodigocn, 
																	$strUnidadmed, 
																	$strCant, 
																	$strCostunit, 
																	$strMes,
																	$idactestrategica);
					//}
				}else{
					$option = 2;
					
					//if($_SESSION['permisosMod']['u']){
						$request_act = $this->model->updateCuanes($idCuadronecesidad,
																	$strRequerimiento, 
																	$strEspgas,
																	$strCodigocn, 
																	$strUnidadmed, 
																	$strCant, 
																	$strCostunit, 
																	$strMes);
					//}
				}
				//echo $request_act;

				if ($request_act > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
		public function getSelectallregcuanes(int $idregistropoi)
		{

			$idreg = intval($idregistropoi);


			$arrData = $this->model->Selectallregcuanes($idreg);
			$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
			//$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);

			if (empty($arrData)) {
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
			} else {
				$arrResponse = array('status' => true, 'data' => $arrData);
			}
			echo $datajson;

			die();
		}
	public function getinsumos2()
	{
		$arrData = $this->model->Selectinsumos2();
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);

		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo $datajson;

		die();
	}
	public function getinsumos()
	{
		$arrData = $this->model->Selectinsumos2();
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);

		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo $datajson;

		die();
	}

	}
 ?>