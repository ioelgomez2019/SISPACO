<?php 

	class CuadronecesidadModel extends Mysql
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
		public function Selectallregcuanes(int $idreg)
		{
			$this->intIdregistropoi = $idreg;
			$sql = "SELECT
						cuadro_necesidades.*
					FROM
						cuadro_necesidades
						WHERE
						idNecesidad = $this->intIdregistropoi 
						LIMIT 1";

			$request = $this->select($sql);
			return $request;
		}
//insertar cuanes

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
//update
		public function updateCuanes(
			int $idCuadronecesidad, 
			string $Requerimiento, 
			int $Espgas, 
			string $Codigocn, 
			string $Unidadmed, 
			string $Cant, 
			string $Costunit, 
			string $Mes){
			//[idCuadronecesidad] => 3
		    //[txtRequerimiento] => Papel bond
		    //[txtEspgas] => 3
		    //[txtCodigocn] => 2.1.15.21
		    //[txtUnidadmed] => paquete
		   // [txtCant] => 3
		   // [txtCostunit] => 11
		   // [txtMes] => Enero

			$this->idCuadronecesidad = $idCuadronecesidad;
			$this->strRequerimiento = $Requerimiento;
			$this->intEspgas = $Espgas;
			$this->strCodigocn = $Codigocn;
			$this->strUnidadmed = $Unidadmed;
			$this->strCant = $Cant;
			$this->strCostunit = $Costunit;
			$this->strMes = $Mes;
			

			$sql = "SELECT
						insumos.espe_nombre 
					FROM
						insumos
						WHERE 
						insumos.idrequerimientos = '$this->intEspgas' LIMIT 1";
			$request = $this->select($sql);



			//if(empty($request))
			//{
				
			
				$sql = "UPDATE cuadro_necesidades SET requerimiento=?, espe_gas_cod=?, espe_gas_nombre=?, unidad_med=?, cantidad=?, costo_unitario=?,gastoMES=?,insumos_idrequerimientos =?
						WHERE idNecesidad  = $this->idCuadronecesidad ";
				$arrData = array(
						$this->strRequerimiento, //nombre_act
						$this->strCodigocn, //nombre_act
						$request['espe_nombre'], //programa_pre
						 //codigo_pp
						$this->strUnidadmed, //desc_act_ope
						$this->strCant, //desc_cua_met
						$this->strCostunit,
						$this->strMes,
						$this->intEspgas,
	       					);
				
				$request = $this->update($sql,$arrData);
			/*}else{
				$request = "exist";
			}*/
		return $request;
		
		}
		public function Selectcuanes(){
			
			$sql = "SELECT
						cuadro_necesidades.idNecesidad, 
						actividad.nombre_act, 
						cuadro_necesidades.requerimiento, 
						cuadro_necesidades.espe_gas_nombre, 
						cuadro_necesidades.cantidad, 
						cuadro_necesidades.gastoMES, 
						cuadro_necesidades.costo_unitario, 
						cuadro_necesidades.unidad_med
					FROM
						actividad
						INNER JOIN
						cuadro_necesidades
						ON 
							actividad.idcodigo_act = cuadro_necesidades.actividad_codActividad";
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