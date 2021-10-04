<?php

include_once('capa_datos/clsConexion.php');

class Cuota extends Conexion
{
	//atributos
	private $id_cuota;
	private $fecha;
	private $monto;
	private $id_plan;

	//construtor
	public function __construct()
	{
		parent::__construct();
		$this->id_cuota = 0;
		$this->fecha = '';
		$this->monto = 0;
		$this->id_plan = 0;
	}

	public function getIdCuota()
	{
		return $this->id_cuota;
	}

	public function setIdCuota($id_cuota)
	{
		$this->id_cuota = $id_cuota;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	/**
	 * Get the value of monto
	 *
	 * @return  	private
	 */
	public function getMonto()
	{
		return $this->monto;
	}

	/**
	 * Set the value of monto
	 *
	 * @param  	private  $monto
	 *
	 * @return  self
	 */
	public function setMonto($monto)
	{
		$this->monto = $monto;

		return $this;
	}

	public function getIdPlan()
	{
		return $this->id_plan;
	}

	public function setIdPlan($id_plan)
	{
		$this->id_plan = $id_plan;

		return $this;
	}

	public function guardar()
	{
		$sql = "insert into cuota(fecha,monto,id_plan)
				values(
					'$this->fecha',
					$this->monto,
					$this->id_plan
				)";

		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function modificar()
	{
		$sql = "update cuota
				set fecha = '$this->fecha',
					monto = $this->monto
				where id_cuota=$this->id_cuota and id_plan = $this->id_plan";
		if (parent::ejecutar($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function eliminar()
	{
		$sql = "delete from cuota
				where id_cuota = $this->id_cuota and id_plan = $this->id_plan";
		if (parent::ejecutar($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function mostrar()
	{
		$sql = "select *from cuota";
		return parent::ejecutar($sql);
	}
}
