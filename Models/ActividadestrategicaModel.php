<?php 

	class ActividadestrategicaModel extends Mysql
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
		private $intIdindicadoroei;
		
		public function __construct()
		{
			parent::__construct();
		}

		public function Selectinsumos(){
			
			$sql = "SELECT
						insumos.idrequerimientos, 
						insumos.espe_identificador, 
						insumos.espe_nombre
					FROM
						insumos";
			$request = $this->select_all($sql);
			return $request;
		}

		public function Selectpp(){
			
			$sql = "SELECT
						programa_pre.*
					FROM
						programa_pre";
			$request = $this->select_all($sql);
			return $request;
		}
//insertar cuadro de nesesidad
		public function insertCuanes(
			string $Requerimiento, 
			int $Espgas, 
			string $Codigocn, 
			string $Unidadmed, 
			string $Cant, 
			string $Costunit, 
			string $Mes,
			int $idactestrategica
		) {
		//[txtRequerimiento] => sadsa
    	//[txtEspgas] => 3
    	//[txtCodigocn] => 2.1.15.21
    	//[txtUnidadmed] => paquete
    	//[txtCant] => 231
    	//[txtCostunit] => 124
    	//[txtMes] => Marzo
			//idactestrategica
			$this->strRequerimiento = $Requerimiento;
			$this->intEspgas = $Espgas;
			$this->strCodigocn = $Codigocn;
			$this->strUnidadmed = $Unidadmed;
			$this->strCant = $Cant;
			$this->strCostunit = $Costunit;
			$this->strMes = $Mes;
			$this->idactestrategica = $idactestrategica;
			
			
			$sql = "SELECT
						insumos.espe_nombre 
					FROM
						insumos
						WHERE 
						insumos.idrequerimientos = '$this->intEspgas' LIMIT 1";
			$request = $this->select($sql);

			$data = [
				$this->strRequerimiento, //requerimiento
				$this->strCodigocn, //espe_gas_cod
				$request['espe_nombre'], //espe_gas_nombre
				$this->strUnidadmed, //unidad_med
				$this->strCant, //cantidad
				$this->strCostunit, //costo_unitario
				$this->strMes, //gastoMES 
				$this->idactestrategica,//actividad_codActividad
				$this->intEspgas //insumos_idrequerimientos
			];

			//var_dump($data);

			$query_insert  = "INSERT INTO cuadro_necesidades(
				requerimiento,
				espe_gas_cod,
				espe_gas_nombre,
				unidad_med,
				cantidad,
				costo_unitario,
				gastoMES,
				actividad_codActividad,
			insumos_idrequerimientos
			) VALUES(?,?,?,?,?,?,?,?,?)";

			$res = $this->insert($query_insert, $data);
			var_dump($res);
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

	 	//[idActividadestrategica] => 5
	    //[txtNombreao] => Asd
	    //[txtProgp] => 2
	    //[txtCodpp] => 9002
	    //[txtDescao] => asd
	    //[txtDescma] => asd
	    //[txtResp] => 1
		public function updateActestr(
			int $idActividadestrategica, 
			string $Nombreao, 
			int $Progp, 
			string $Descao, 
			string $Descma, 
			string $Resp){

			$this->idActividadestrategica = $idActividadestrategica;
			$this->strNombreao = $Nombreao;
			$this->strProgp = $Progp;
			$this->strDescao = $Descao;
			$this->strDescma = $Descma;
			$this->strResp = $Resp;
			

			$sql = "SELECT
					actividad.*
				FROM
					actividad
					WHERE
					actividad.idcodigo_act =  '$this->idActividadestrategica' ";
			$request = $this->select_all($sql);


			
			$query_strProgp = "SELECT
							programa_pre.nombre_pp, 
							programa_pre.cod_pp, 
							actividad.responsable
						FROM
							actividad
							INNER JOIN
							programa_pre
							ON 
								actividad.programa_pre_idprograma_pre = programa_pre.idprograma_pre
								WHERE 
								actividad.idcodigo_act = '$this->strProgp' 
							
							LIMIT 1";

			$request_strProgp = $this->select($query_strProgp);

			//if(empty($request))
			//{
				
			
				$sql = "UPDATE actividad SET nombre_act=?, programa_pre=?, codigo_pp=?, desc_act_ope=?, desc_cua_met=?, responsable=? 
						WHERE idcodigo_act = $this->idActividadestrategica ";
				$arrData = array(
						$this->strNombreao, //nombre_act
						$request_strProgp['nombre_pp'], //programa_pre
						$request_strProgp['cod_pp'], //codigo_pp
						$this->strDescao, //desc_act_ope
						$this->strDescma, //desc_cua_met
						$this->strResp
	       					);
				
				$request = $this->update($sql,$arrData);
			/*}else{
				$request = "exist";
			}*/
		return $request;
		
		}
		public function Selectinsumos2(){
			
			$sql = "SELECT
						insumos.idrequerimientos, 
						insumos.espe_identificador, 
						insumos.espe_nombre
					FROM
						insumos";
			$request = $this->select_all($sql);
			return $request;
		}

		public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE persona SET status = ? WHERE idpersona = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->update($sql,$arrData);
			return $request;
		}

		public function Selectallregistroact(int $idreg)
		{
			$this->intIdregistroact = $idreg;
			$sql = "SELECT
							actividad.idcodigo_act, 
							actividad.nombre_act, 
							actividad.programa_pre, 
							actividad.codigo_pp, 
							actividad.desc_act_ope, 
							actividad.desc_cua_met, 
							actividad.responsable, 
							actividad.registropoi_idregistro, 
							actividad.programa_pre_idprograma_pre, 
							registropoi.codigooe, 
							registropoi.objestrinst, 
							registropoi.codigoae, 
							registropoi.accestrinst
						FROM
							actividad
							INNER JOIN
							registropoi
							ON 
								actividad.registropoi_idregistro = registropoi.idregistro
								WHERE 
								actividad.idcodigo_act = $this->intIdregistroact
						LIMIT 1";

			$request = $this->select($sql);
			return $request;
		}

		public function Selectactest(){
			
			$sql = "SELECT
						registropoi.idregistro,
						 actividad.idcodigo_act,
						registropoi.objestrinst, 
						registropoi.accestrinst, 
						actividad.nombre_act, 
						actividad.desc_act_ope, 
						actividad.responsable
					FROM
						registropoi
						INNER JOIN
						actividad
						ON 
							registropoi.idregistro = actividad.registropoi_idregistro";
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

		public function insertRol(string $rol, string $descripcion, int $status){

			$return = "";
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO rol(nombrerol,descripcion,status) VALUES(?,?,?)";
	        	$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
	        	$request_insert = $this->insert($query_insert,$arrData);
	        	$return = $request_insert;
			}else{
				$return = "exist";
			}
			return $return;
		}	

		public function updateRol(int $idrol, string $rol, string $descripcion, int $status){
			$this->intIdrol = $idrol;
			$this->strRol = $rol;
			$this->strDescripcion = $descripcion;
			$this->intStatus = $status;

			$sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, status = ? WHERE idrol = $this->intIdrol ";
				$arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}

		public function deleteRol(int $idrol)
		{
			$this->intIdrol = $idrol;
			$sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol";
			$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE rol SET status = ? WHERE idrol = $this->intIdrol ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}
	}
 ?>