<?php

class RegistropoiModel extends Mysql
{
	private $strCc;
	private $strOei;
	private $strCoe;
	private $strIoe;
	private $strUmoe;
	private $intMoe;
	private $strAei;
	private $strCae;
	private $strIae;
	private $strUmae;
	private $intMae;

	public function __construct()
	{
		parent::__construct();
	}
	public function insertRegistropoi(
		string $cc,
		string $oei,
		int $ioe,
		int $moe,
		string $aei,
		string $iae,
		int $mae
	) {
		// [Cc] => 4
		// [Oei] => 3
		// [Ioe] => 2
		// [Moe] => 100
		// [Aei] => 2
		// [Iae] => 1
		// [Mae] => 100
		$this->strCc = $cc;
		$this->strOei = $oei;
		//$this->strCoe = $coe;
		$this->strIoe = $ioe;
		//$this->strUmoe = $umoe;
		$this->intMoe = $moe;
		$this->strAei = $aei;
		//$this->strCae = $cae;
		$this->strIae = $iae;
		//$this->strUmae = $umae;
		$this->intMae = $mae;

		$query_strCc = "SELECT nomcentrocosto  from  centro_costo where idcentrocosto = '$this->strCc' limit 1 ";

		$query_strOei = "SELECT nomobjestr, codoe  from  obj_estrategico where idobjestr = '$this->strOei' limit 1 ";

		$query_strIoe = "SELECT nombreoei, nombre  from  indicadoroei 
						join unidad_medidaoei on idunidad_medidaoei = obj_estrategico_idobjestr
						where idindicadoroei = '$this->strIoe' limit 1 ";

		$query_strAei = "SELECT accionestr, codigoaei  from  acc_estrategica where idaccestr = '$this->strAei' limit 1 ";

			$query_strIae = "SELECT
								indicadoraei.idindicadoraei,
								indicadoraei.nombreaei, 
								unidad_medidaaei.nombre
							FROM
								indicadoraei
								INNER JOIN
								unidad_medidaaei
								ON 
									indicadoraei.idindicadoraei = unidad_medidaaei.indicadoraei_idindicadoraei
								INNER JOIN
								acc_estrategica
								ON 
									indicadoraei.acc_estrategica_idaccestr = acc_estrategica.idaccestr
									WHERE indicadoraei.idindicadoraei= '$this->strIae' limit 1 ";

		$request_strCc = $this->select($query_strCc);
		$request_strOei = $this->select($query_strOei);
		$request_strIoe = $this->select($query_strIoe);
		$request_strAei = $this->select($query_strAei);
		$request_strIae = $this->select($query_strIae);



		$data = [
			$request_strCc['nomcentrocosto'],  //centrocosto
			$request_strOei['nomobjestr'], // objestrinst
			$request_strOei['codoe'], //codigooe
			$request_strIoe['nombreoei'], //indicadoroe
			$request_strIoe['nombre'], //unidmedidaoe
			$this->intMoe, //metaoe
			$request_strAei['accionestr'], //accestrinst
			$request_strAei['codigoaei'], //codigoae
			$request_strIae['nombreaei'], //indicadorae
			$request_strIae['nombre'], //unidmedidaae
			$this->intMae, //metaae
			sessionUser($_SESSION['idUser'])['idpersona'], //persona_idpersona 
			$this->strCc, //centro_costo_idcentrocosto
			$this->strOei, //obj_estrategico_idobjestr
			$this->strAei //acc_estrategica_idaccestr
		];

		//var_dump($data);

		$query_insert  = "INSERT INTO registropoi(
			centrocosto,
			objestrinst,
			codigooe,
			indicadoroe,
			unidmedidaoe,
			metaoe,
			accestrinst,
			codigoae,
			indicadorae,
			unidmedidaae,

			metaae,
			persona_idpersona,
			centro_costo_idcentrocosto,
			obj_estrategico_idobjestr,
			acc_estrategica_idaccestr
		) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$res = $this->insert($query_insert, $data);
		//var_dump($res);
		$return = $res;
		return $return;
	}

	public function insertActestr(
		string $Nombreao,
		string $Progp,
		string $Descao,
		string $Descma,
		string $Resp,
		string $Numficha
	) {
	//[idActividadestrategica] => 
    //[txtNombreao] => asdw
    //[txtProgp] => 2
    //[txtDescao] => asdsa
    //[txtDescma] => sadsa
    //[txtResp] => Esp. Planificador
    //[txtNumficha] => 24
		$this->strNombreao = $Nombreao;
		$this->strProgp = $Progp;
		//$this->strCoe = $coe;
		$this->strDescao = $Descao;
		//$this->strUmoe = $umoe;
		$this->strDescma = $Descma;
		$this->strResp = $Resp;
		$this->strNumficha = $Numficha;
		
		$query_strProgp = "SELECT
							nombre_pp,cod_pp
						FROM
							programa_pre
							WHERE 
							idprograma_pre = '$this->strProgp' 
							
							LIMIT 1";

		$request_strProgp = $this->select($query_strProgp);
		$data = [
			$this->strNombreao, //nombre_act
			$request_strProgp['nombre_pp'], //programa_pre
			$request_strProgp['cod_pp'], //codigo_pp
			$this->strDescao, //desc_act_ope
			$this->strDescma, //desc_cua_met
			$this->strResp, //responsable
			$this->strNumficha, //registropoi_idregistro 
			$this->strProgp //programa_pre_idprograma_pre
		];

		//var_dump($data);

		$query_insert  = "INSERT INTO actividad(
			nombre_act,
			programa_pre,
			codigo_pp,
			desc_act_ope,
			desc_cua_met,
			responsable,
			registropoi_idregistro,
			programa_pre_idprograma_pre
		) VALUES(?,?,?,?,?,?,?,?)";

		$res = $this->insert($query_insert, $data);
		//var_dump($res);
		$return = $res;
		return $return;
	}

	public function Selectallregistropoi(int $idreg)
	{
		$this->intIdregistropoi = $idreg;
		$sql = "SELECT
					registropoi.idregistro, 
					registropoi.centrocosto, 
					registropoi.objestrinst, 
					registropoi.codigooe, 
					registropoi.indicadoroe, 
					registropoi.unidmedidaoe, 
					registropoi.metaoe, 
					registropoi.accestrinst, 
					registropoi.codigoae, 
					registropoi.indicadorae, 
					registropoi.unidmedidaae, 
					registropoi.metaae, 
					registropoi.persona_idpersona, 
					registropoi.centro_costo_idcentrocosto, 
					registropoi.obj_estrategico_idobjestr, 
					registropoi.acc_estrategica_idaccestr
				FROM
					registropoi
					WHERE
					registropoi.idregistro =  $this->intIdregistropoi";

		$request = $this->select($sql);
		return $request;
	}

	public function SelectObjetivoestricooei1(int $idoei)
	{
		$this->intIdindicadoroei = $idoei;
		$sql = "SELECT
					indicadoroei.idindicadoroei, 
					indicadoroei.nombreoei, 
					indicadoroei.obj_estrategico_idobjestr
				FROM
					indicadoroei
					WHERE obj_estrategico_idobjestr =  $this->intIdindicadoroei";
		$request = $this->select_all($sql);
		return $request;
	}
	public function SelectAccionestrategica(int $idoei)
	{
		$this->intIdindicadoroei = $idoei;
		$sql = "SELECT
						acc_estrategica.idaccestr, 
						acc_estrategica.accionestr, 
						acc_estrategica.codigoaei, 
						acc_estrategica.obj_estrategico_idobjestr, 
						acc_estrategica.`status`
					FROM
						acc_estrategica
					WHERE acc_estrategica.obj_estrategico_idobjestr = $this->intIdindicadoroei";

		$request = $this->select_all($sql);
		return $request;
	}


	public function SelectObjetivoestrategico()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
			$whereAdmin = " and idrol != 1 ";
		}
		//EXTRAE nombre
		$sql = "SELECT * FROM obj_estrategico WHERE status != 0" . $whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}

	public function SelectObjetivoestricooei()
	{
		$whereAdmin = "";
		if ($_SESSION['idUser'] != 1) {
			$whereAdmin = " and idrol != 1 ";
		}
		//EXTRAE nombre
		$sql = "SELECT * FROM indicadoroei" . $whereAdmin;
		$request = $this->select_all($sql);
		return $request;
	}
	public function selectobjetivoestra(int $idoei)
	{
		$this->intIdindicadoroei = $idoei;
		$sql = "SELECT
				obj_estrategico.nomobjestr, 
				obj_estrategico.codoe, 
				obj_estrategico.`status`, 
				obj_estrategico.idobjestr
			FROM
				obj_estrategico
				WHERE
				idobjestr  = $this->intIdindicadoroei LIMIT 1";
		$request = $this->select($sql);
		return $request;
	}
	public function SelectUnidadMOE(int $idoei)
	{
		$this->intIdindicadoroei = $idoei;
		$sql = "SELECT
						unidad_medidaoei.idunidad_medidaoei, 
						unidad_medidaoei.nombre, 
						unidad_medidaoei.indicadoroei_idindicadoroei
					FROM
						unidad_medidaoei
					WHERE unidad_medidaoei.indicadoroei_idindicadoroei = $this->intIdindicadoroei";
		$request = $this->select($sql);
		return $request;
	}
	public function SelectCAE(int $idaei)
	{
		$this->intIdaei = $idaei;
		$sql = "SELECT
					acc_estrategica.idaccestr, 
					acc_estrategica.accionestr, 
					acc_estrategica.codigoaei, 
					acc_estrategica.`status`, 
					acc_estrategica.obj_estrategico_idobjestr
				FROM
					acc_estrategica
					WHERE idaccestr=  $this->intIdaei LIMIT 1";
		$request = $this->select($sql);
		return $request;
	}
	public function SelectIAE(int $idiae)
	{
		$this->intIdiae = $idiae;
		$sql = "SELECT
						indicadoraei.idindicadoraei, 
						indicadoraei.nombreaei, 
						indicadoraei.acc_estrategica_idaccestr
					FROM
						indicadoraei
					WHERE indicadoraei.acc_estrategica_idaccestr =  $this->intIdiae";
		$request = $this->select_all($sql);
		return $request;
	}

	public function SelectUnidadMAE(int $idumae)
	{
		$this->intIdumae = $idumae;
		$sql = "SELECT
						unidad_medidaaei.idunidad_medidaaei, 
						unidad_medidaaei.nombre, 
						unidad_medidaaei.indicadoraei_idindicadoraei
					FROM
						unidad_medidaaei
					WHERE unidad_medidaaei.indicadoraei_idindicadoraei =  $this->intIdumae";
		$request = $this->select($sql);
		return $request;
	}

	public function Selectpp()
	{

		$sql = "SELECT
						programa_pre.*
					FROM
						programa_pre";
		$request = $this->select_all($sql);
		return $request;
	}

	public function Selectregistrop()
	{

		$sql = "SELECT
						registropoi.idregistro, 
						registropoi.objestrinst, 
						registropoi.indicadoroe, 
						registropoi.metaoe, 
						registropoi.accestrinst, 
						registropoi.indicadorae, 
						registropoi.metaae
					FROM
						registropoi";
		$request = $this->select_all($sql);
		return $request;
	}
	public function Selectcc()
	{
		$sql = "SELECT * FROM centro_costo ";
		$request = $this->select_all($sql);
			
		return $request;
	}








	public function selectRol(int $idrol)
	{
		//BUSCAR ROLE
		$this->intIdrol = $idrol;
		$sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
		$request = $this->select($sql);
		return $request;
	}

	public function insertRol(string $rol, string $descripcion, int $status)
	{

		$return = "";
		$this->strRol = $rol;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $status;

		$sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert  = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
			$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
			$request_insert = $this->insert($query_insert, $arrData);
			$return = $request_insert;
		} else {
			$return = "exist";
		}
		return $return;
	}

	public function updateRol(int $idrol, string $rol, string $descripcion, int $status)
	{
		$this->intIdrol = $idrol;
		$this->strRol = $rol;
		$this->strDescripcion = $descripcion;
		$this->intStatus = $status;

		$sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol ";
			$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
			$request = $this->update($sql, $arrData);
		} else {
			$request = "exist";
		}
		return $request;
	}

	public function deleteRol(int $idrol)
	{
		$this->intIdrol = $idrol;
		$sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
		$request = $this->select_all($sql);
		if (empty($request)) {
			$sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol ";
			$arrData = array(0);
			$request = $this->update($sql, $arrData);
			if ($request) {
				$request = 'ok';
			} else {
				$request = 'error';
			}
		} else {
			$request = 'exist';
		}
		return $request;
	}
}
