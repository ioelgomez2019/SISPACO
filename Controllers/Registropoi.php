<?php

class Registropoi extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(4);
	}
	public function getSelectregistrop()
	{
		
		$btnView = '';
		$btnEdit = '';
		$btnDelete = '';
		$arrData = $this->model->Selectregistrop();
		for ($i = 0; $i < count($arrData); $i++) {
			if ($_SESSION['permisosMod']['u']) {
				$btnView = '<button class="btn btn-info btn-sm btnView" onClick="fntGenAct(' . $arrData[$i]['idregistro'] . ')" title="Generar Actividad"><i class="fas fa-eye"></i></button>';
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditRegistro" onClick="fntEditInfo(' . $arrData[$i]['idregistro'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}
			if ($_SESSION['permisosMod']['d']) {
				$btnDelete = '<button class="btn btn-danger btn-sm btnDelRegistropoi" onClick="fntDelRegistro(' . $arrData[$i]['idregistro'] . ')" title="Eliminar"><i class="far fa-trash-alt"></i></button>
					</div>';
			}
			$arrData[$i]['options'] = '<div class="text-center">' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
		}
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		if (empty($arrData)) {
			$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
		} else {
			$arrResponse = array('status' => true, 'data' => $arrData);
		}
		echo $datajson;
		die();
	}
	
	public function getSelectallregistropoi(int $idregistropoi)
	{

		$idreg = intval($idregistropoi);


		$arrData = $this->model->Selectallregistropoi($idreg);
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
	public function putRegistropoi()
	{
		if ($_POST) {
			//dep($_POST);

			// [txtCc] => 4
			// [txtOei] => 3
			// [txtIoe] => 2
			//     [txtMoe] => 100
			//     [txtAei] => 2
			//     [txtIae] => 1
			//     [txtMae] => 100



			if (
				empty($_POST['txtCc']) || empty($_POST['txtOei'])
				|| empty($_POST['txtIoe']) || empty($_POST['txtMoe'])
				|| empty($_POST['txtAei'])
				|| empty($_POST['txtIae'])
				|| empty($_POST['txtMae'])
			) {
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos. joel');
			} else {
				//$idUsuario = intval($_POST['idUsuario']);
				$strCc = strClean($_POST['txtCc']);
				$strOei = strClean($_POST['txtOei']);
				//$strCoe = ucwords(strClean($_POST['txtCoe']));
				$strIoe = strClean($_POST['txtIoe']);
				//$strUmoe = intval(strClean($_POST['txtUmoe']));
				$intMoe = strClean($_POST['txtMoe']);
				$strAei = strClean($_POST['txtAei']);
				//$strCae = strClean($_POST['txtCae']);
				$strIae = strClean($_POST['txtIae']);
				//$strUmae = intval(strClean($_POST['txtUmae']));
				$intMae = strClean($_POST['txtMae']);

				$request_poi = $this->model->insertRegistropoi(
					$strCc,
					$strOei,
					//$strCoe,
					$strIoe,
					//$strUmoe,
					$intMoe,
					$strAei,
					//$strCae,
					$strIae,
					//$strUmae,
					$intMae
				);


				if ($request_poi > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	public function putActividadestr()
	{
	/**
		if ($_POST) 
			dep($_POST);
		**/
		if ($_POST) {
			

			//[idActividadestrategica] => 
		    //[txtNombreao] => accion para maestros
		    //[txtProgp] => 2
		    //[txtDescao] => ACCION DE GRACIA
		    //[txtDescma] => DESCRIPCION DE METAS
		    //[txtResp] => Esp. Planificador



			if (
				empty($_POST['txtNombreao']) || empty($_POST['txtProgp'])
				|| empty($_POST['txtDescao']) || empty($_POST['txtDescma'])
				|| empty($_POST['txtResp'])
			) 
			{
				$arrResponse = array("status" => false, "msg" => 'Datos incorrectos. joel');
			}else {
				//$idUsuario = intval($_POST['idUsuario']);
				$strNombreao = ucwords(strClean($_POST['txtNombreao']));
				$strProgp = strClean($_POST['txtProgp']);
				//$strCoe = ucwords(strClean($_POST['txtCoe']));
				$strDescao = strClean($_POST['txtDescao']);
				//$strUmoe = intval(strClean($_POST['txtUmoe']));
				$strDescma = strClean($_POST['txtDescma']);
				$strResp = strClean($_POST['txtResp']);

				$strNumficha = strClean($_POST['txtNumficha']);

				$request_act = $this->model->insertActestr(
					$strNombreao,
					$strProgp,
					//$strCoe,
					$strDescao,
					//$strUmoe,
					$strDescma,
					$strResp,
					$strNumficha
				);


				if ($request_act > 0) {
					$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
				} else {
					$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		
		die();
	}

	public function Registropoi()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_id'] = 4;
		$data['page_tag'] = "Registropoi ";
		$data['page_name'] = "Registropoi";
		$data['page_title'] = "Registropoi  <small> Tienda PACO</small>";
		$data['page_functions_js'] = "functions_registropoi.js";
		//$data['page_functions_js'] = "functions_actividadestrategica.js";
		$this->views->getView($this, "Registropoi", $data);
	}
	public function getSelectcc(){
				$arrData = $this->model->Selectcc();
				$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);
				//$datajson =  json_encode($arrData,JSON_UNESCAPED_UNICODE);
					
				if(empty($arrData))
				{
					$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
				}else{
					$arrResponse = array('status' => true, 'data' => $arrData);
				}
				echo $datajson;
				
				die();
			}
	public function getObjetivoestrategico()
	{
		$btnView = '';
		$btnEdit = '';
		$btnDelete = '';
		$arrData = $this->model->selectCentrocosto();
		echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
		die();
	}
	public function getSelectObjetivoestricoNombre()
	{
		//echo '<script>alert("Estoy entrandoa qui")</script>';
		$htmlOptions = "";
		//codificamos y consultamos la tabla objetivo estrategico
		$arrData = $this->model->SelectObjetivoestrategico();
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		//codificamos y consultamos la tabla objetivo estrategico
		//$arrData2 = $this->model->SelectObjetivoestricooei();
		//$datajson2 =  json_encode($arrData2, JSON_UNESCAPED_UNICODE);
		//traemos y consultamos la tabla indicador de objetivo estrategico isntitucional
		//$arrDataindicadoroei = $this->model->Select();
		//$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
				if ($arrData[$i]['status'] == 1) {
				}
			}
		}

		echo $datajson;

		die();
	}

	public function getSelectObjetivoestricooei()
	{
		//echo '<script>alert("Estoy entrandoa qui")</script>';
		
		//codificamos y consultamos la tabla objetivo estrategico
		$arrData = $this->model->SelectObjetivoestricooei();
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		if (count($arrData) > 0) {
			for ($i = 0; $i < count($arrData); $i++) {
			}
		}

		echo $datajson;

		die();
	}

	public function getSelectIndicadorOE(int $idindicadoroei)
	{

		$idoei = intval($idindicadoroei);


		$arrData = $this->model->SelectObjetivoestricooei1($idoei);
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
	public function getSelectUnidadMOE(int $idindicadoroei)
	{

		$idoei = intval($idindicadoroei);


		$arrData = $this->model->SelectUnidadMOE($idoei);
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
	public function getSelectCAE(int $AEIseleccionado)
	{

		$idaei = intval($AEIseleccionado);


		$arrData = $this->model->SelectCAE($idaei);
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
	public function getSelectAccionestrategica(int $idindicadoroei)
	{

		$idoei = intval($idindicadoroei);


		$arrData = $this->model->SelectAccionestrategica($idoei);
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
	public function getSelectIAE(int $idindicadoriae)
	{
		$idiae = intval($idindicadoriae);

		$arrData = $this->model->SelectIAE($idiae);
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
	public function getSelectUnidadMAE(int $iaeseleccionado)
	{
		$idumae = intval($iaeseleccionado);


		$arrData = $this->model->SelectUnidadMAE($idumae);
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
	public function getselectobjetivoestra(int $iaeseleccionado)
	{
		$idumae = intval($iaeseleccionado);


		$arrData = $this->model->selectobjetivoestra($idumae);
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
	public function getSelectpp()
	{
		$arrData = $this->model->Selectpp();
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