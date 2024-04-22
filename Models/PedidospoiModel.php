<?php

class PedidospoiModel extends Mysql
{
	
	public function Selectregistrop()
	{

		$sql = "SELECT
					registropoi.idregistro, 
					registropoi.centrocosto, 
					registropoi.objestrinst, 
					registropoi.indicadoroe, 
					registropoi.accestrinst, 
					registropoi.indicadorae, 
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
	public function Selectallregistropoiact(int $idreg)
	{
		$this->intIdregistropoi = $idreg;
		$sql = "SELECT
					actividad.idcodigo_act, 
					actividad.nombre_act, 
					actividad.programa_pre, 
					actividad.codigo_pp, 
					actividad.desc_act_ope, 
					actividad.desc_cua_met, 
					actividad.responsable, 
					actividad.registropoi_idregistro, 
					actividad.programa_pre_idprograma_pre
				FROM
					actividad
					WHERE registropoi_idregistro= $this->intIdregistropoi
					LIMIT 1 ";
		$request = $this->select($sql);
		return $request;
	}
	public function Selectallregistropoicua(int $idreg)
	{
		$this->intIdregistropoi = $idreg;
		$sql = "SELECT
	cuadro_necesidades.idNecesidad, 
	cuadro_necesidades.requerimiento, 
	cuadro_necesidades.espe_gas_cod, 
	cuadro_necesidades.espe_gas_nombre, 
	cuadro_necesidades.unidad_med, 
	cuadro_necesidades.cantidad, 
	cuadro_necesidades.costo_unitario, 
	cuadro_necesidades.gastoMES, 
	cuadro_necesidades.actividad_codActividad, 
	cuadro_necesidades.insumos_idrequerimientos
FROM
	cuadro_necesidades
	WHERE actividad_codActividad =  $this->intIdregistropoi ";
		$request = $this->select_all($sql);
		return $request;
	}











	public function selectpedidos()
	{

		$sql = "SELECT
					*
				FROM
					registropoi
					INNER JOIN
					actividad
					ON 
						registropoi.idregistro = actividad.registropoi_idregistro
						";
		$request = $this->select_all($sql);
		return $request;
	}


}
