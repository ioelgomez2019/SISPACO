
<?php

class Pedidospoi extends Controllers
{
	public function __construct()
	{
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header('Location: ' . base_url() . '/login');
		}
		getPermisos(6);
	}
	public function getSelectregistrop()
	{
		
		$btnView = '';
		$btnEdit = '';
		$btnDelete = '';
		$arrData = $this->model->Selectregistrop();
		for ($i = 0; $i < count($arrData); $i++) {
			if ($_SESSION['permisosMod']['u']) {
				$btnView = '<button class="btn btn-info btn-sm btnView" onClick="btnimprimir(' . $arrData[$i]['idregistro'] . ')" title="Generar Actividad"><i class="fas fa-print"></i></button>';
				$btnEdit = '<button class="btn btn-primary btn-sm btnEditRegistro" onClick="fntviewInfo(' . $arrData[$i]['idregistro'] . ')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
			}
			if ($_SESSION['permisosMod']['d']) {
				
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


	public function Pedidospoi()
	{
		if (empty($_SESSION['permisosMod']['r'])) {
			header("Location:" . base_url() . '/dashboard');
		}
		$data['page_id'] = 4;
		$data['page_tag'] = "Pedidospaco ";
		$data['page_name'] = "Pedidospaco";
		$data['page_title'] = "Pedidospaco  <small> Tienda PACO</small>";
		$data['page_functions_js'] = "functions_pedidospoi.js";
		//$data['page_functions_js'] = "functions_actividadestrategica.js";
		$this->views->getView($this, "Pedidospoi", $data);
	}
	public function generarPdf($idregistro)
	{
		$idreg = intval($idregistro);


		$arrData = $this->model->Selectallregistropoi($idreg);
		$arrDataact = $this->model->Selectallregistropoiact($idreg);
		//$datajson =  json_encode($arrData, JSON_UNESCAPED_UNICODE);
		$idact =  $arrDataact['idcodigo_act'];
		$arrDatacua = $this->model->Selectallregistropoicua($idact);

	require('fpdf/fpdf.php');

	$fpdf = new FPDF();

	$fpdf->AddPage('LANDSCAPE', 'A4');
	//funete de texto
	$fpdf->SetFont('Arial', 'B', 12);
	//contenido de la pagina
	//$fpdf->Ln(10);
	$fpdf->SetY(25);
	//color de texto
	//$fpdf->SetTextColor(25,174,194);
	//PRIMER TITULO
	$fpdf->Cell(0, 10," $idact FICHA DE PLAN DE ACTIVIDADES OPERATIVAS UNAJ Nro $idreg", 0 , 1, 'C');

	//$fpdf->Cell(0, 10,  $arrData['unidmedidaoe']  , 0 , 1, 'C');
			
	//FIN DEL PRIMER TITULO

	$fpdf->Ln(1);
	//INICIO DE LA TABLA POI
	//parte de objetivo estrategico institucional
	$fpdf->SetFont('Arial', '', 10);
	$fpdf->Cell(280, 6, 'OBJETIVO DEL PER AL 2025: CONCERTAR UNA GESTION MODERNA, DESCENTRALIZADA, PARTICIPATIVA Y TRANSPARENTE EN LA REGION', 1, 0, false);
	$fpdf->Ln();
	//segunda fila
	$fpdf->SetFont('Arial', '', 8); //tipo y tamaño de letra 
	$fpdf->Cell(140, 5, 'OBJETIVO ESTRATEGICO INSTITUCIONAL', 1, 0, false);
	$fpdf->Cell(28, 5, 'CODIGO OE', 1, 0, false);
	$fpdf->Cell(56, 5, 'INDICADOR', 1, 0, false);
	$fpdf->Cell(28, 5, 'UNID. MEDIDA', 1, 0, false);
	$fpdf->Cell(28, 5, 'META', 1, 0, false);
	//salto de linea objetivo
	$fpdf->Ln();
	$fpdf->Cell(140, 6,  $arrData['objestrinst'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['codigooe'], 1, 0, false);
	$fpdf->Cell(56, 6, $arrData['indicadoroe'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['unidmedidaoe'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['metaoe'], 1, 0, false);
	$fpdf->Ln();

	//accion estrategica institucional
	$fpdf->Cell(140, 5, 'ACCION ESTRATEGICA INSTITUCIONAL', 1, 0, false);
	$fpdf->Cell(28, 5, 'CODIGO AE', 1, 0, false);
	$fpdf->Cell(56, 5, 'INDICADOR', 1, 0, false);
	$fpdf->Cell(28, 5, 'UNID. MEDIDA', 1, 0, false);
	$fpdf->Cell(28, 5, 'META', 1, 0, false);
	//salto de linea
	$fpdf->Ln();
	$fpdf->Cell(140, 6,  $arrData['accestrinst'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['codigoae'], 1, 0, false);
	$fpdf->Cell(56, 6, $arrData['indicadorae'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['unidmedidaae'], 1, 0, false);
	$fpdf->Cell(28, 6, $arrData['metaae'], 1, 0, false);
	$fpdf->Ln();

	//ACTIVIDAD OPERATIVA
	$fpdf->Cell(168, 5, 'NOMBRE DE LA ACTIVIDAD OPERATIVA', 1, 0, false);
	$fpdf->Cell(84, 5, 'PROGRAMA PRESUPUESTAL', 1, 0, false);
	$fpdf->Cell(28, 5, 'CODIGO PP', 1, 0, false);
	$fpdf->Ln();
	$fpdf->Cell(168, 6, $arrDataact['nombre_act'], 1, 0, false);
	$fpdf->Cell(84, 6,  $arrDataact['programa_pre'], 1, 0, false);
	$fpdf->Cell(28, 6,  $arrDataact['codigo_pp'], 1, 0, false);
	$fpdf->Ln();

	//DESCRIPCION DE LA ACTIVIDAD OPERATIVA
	$fpdf->Cell(140, 5, 'BREVE DESCRIPCION DE LA ACTIVDAD OPERATIVA', 1, 0, false);
	$fpdf->Cell(98, 5, 'BREVE DESCRIPCION Y CUANTIFICACION DE LA META A ALCANZAR', 1, 0, false);
	$fpdf->Cell(42, 5, 'RESPONSABLE', 1, 0, false);
	$fpdf->Ln();
	$fpdf->Cell(140, 6,  $arrDataact['desc_act_ope'], 1, 0, false);
	$fpdf->Cell(98, 6,  $arrDataact['desc_cua_met'], 1, 0, false);
	$fpdf->Cell(42, 6,  $arrDataact['responsable'], 1, 0, false);
	$fpdf->Ln();

	//detalle de insumo
	$fpdf->Cell(98, 6, 'DETALLE', 1, 0, false);
	$fpdf->Cell(182, 6, 'CRONOGRAMA DE GASTO', 1, 0, false);
	$fpdf->Ln();
	$fpdf->Cell(19, 6, 'Requerimiento', 1, 0, false);
	$fpdf->Cell(38, 6, 'Esp. de gasto', 1, 0, false);
	$fpdf->Cell(14, 6, 'U. de med', 1, 0, false);
	$fpdf->Cell(13, 6, 'cant.', 1, 0, false);
	$fpdf->Cell(14, 6, 'Cost. unit.', 1, 0, false);

	//MESES
	$fpdf->Cell(14, 6, 'E', 1, 0, false);
	$fpdf->Cell(14, 6, 'F', 1, 0, false);
	$fpdf->Cell(14, 6, 'M', 1, 0, false);
	$fpdf->Cell(14, 6, 'A', 1, 0, false);
	$fpdf->Cell(14, 6, 'M', 1, 0, false);
	$fpdf->Cell(14, 6, 'J', 1, 0, false);
	$fpdf->Cell(14, 6, 'J', 1, 0, false);
	$fpdf->Cell(14, 6, 'A', 1, 0, false);
	$fpdf->Cell(14, 6, 'S', 1, 0, false);
	$fpdf->Cell(14, 6, 'O', 1, 0, false);
	$fpdf->Cell(14, 6, 'N', 1, 0, false);
	$fpdf->Cell(14, 6, 'D', 1, 0, false);
	$fpdf->Cell(14, 6, 'Costo', 1, 0, false);
	$fpdf->Ln();



	if (count($arrDatacua) > 0) {
				for ($i = 0; $i < count($arrDatacua); $i++) {
					//$fpdf->Cell(14, 20, $arrDatacua[$i]['gastoMES'], 1, 0, false);
					
				}
			}



	//insumos
	if (count($arrDatacua) > 0) {
				for ($i = 0; $i < count($arrDatacua); $i++) {
					$fpdf->Cell(19, 20, $arrDatacua[$i]['requerimiento'], 1, 0, false);
					$fpdf->Cell(38, 20, $arrDatacua[$i]['costo_unitario'], 1, 0, false);
					$fpdf->Cell(14, 20, $arrDatacua[$i]['espe_gas_cod'], 1, 0, false);
					$fpdf->Cell(13, 20, $arrDatacua[$i]['unidad_med'], 1, 0, false);
					$fpdf->Cell(14, 20, $arrDatacua[$i]['cantidad'], 1, 0, false);
					$i=count($arrDatacua);
				}
			}
	
	//MESES
	$fpdf->Cell(14, 20, ' 	', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	if (count($arrDatacua) > 0) {
				for ($i = 0; $i < count($arrDatacua); $i++) {
					$fpdf->Cell(14, 20, $arrDatacua[$i]['gastoMES'], 1, 0, false);
					$i=count($arrDatacua);
				}
			}
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, '', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	
	//$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, ' ', 1, 0, false);
	$fpdf->Cell(14, 20, '12 ', 1, 0, false);
	$fpdf->Ln();
/**
	//segunda fila de insumos
	$fpdf->Cell(19, 20, 'contenido', 1, 0, false);
	$fpdf->Cell(38, 20, 'contenido', 1, 0, false);
	$fpdf->Cell(14, 20, 'contenido', 1, 0, false);
	$fpdf->Cell(13, 20, 'contenido', 1, 0, false);
	$fpdf->Cell(14, 20, 'contenido', 1, 0, false);
	//MESES
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Cell(14, 20, '1', 1, 0, false);
	$fpdf->Ln();
**/

	//costo total
	$fpdf->Cell(98, 5, 'TOTAL', 1, 0, 'C', false);
	//MESES
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, '12 ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, ' ', 1, 0, false);
	$fpdf->Cell(14, 5, '12.00', 1, 0, false);
	$fpdf->Ln();

	//datos de consulta de DB



	//cerrar el inicio del pdf
	$fpdf->Output('I', 'fichaPACO.pdf');
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













	public function getselectpedidos(){
				$arrData = $this->model->selectpedidos();
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

	
}
?>