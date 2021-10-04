<?php

include_once('capa_datos/clsConexion.php');

class PlanPago extends Conexion
{
	//atributos
	private $id_plan;
	private $fecha;
	private $montoTotal;
	private $plazo;

	//construtor
	public function __construct()
	{
		parent::__construct();
		$this->id_plan = 0;
		$this->fecha = '';
		$this->montoTotal = 0;
		$this->plazo = "";
	}


	/**
	 * Get the value of id_plan
	 *
	 * @return  	private
	 */
	public function getIdPlan()
	{
		return $this->id_plan;
	}

	/**
	 * Set the value of id_plan
	 *
	 * @param  	private  $id_plan
	 *
	 * @return  self
	 */
	public function setIdPlan($id_plan)
	{
		$this->id_plan = $id_plan;

		return $this;
	}

	/**
	 * Get the value of fecha
	 *
	 * @return  	private
	 */
	public function getFecha()
	{
		return $this->fecha;
	}

	/**
	 * Set the value of fecha
	 *
	 * @param  	private  $fecha
	 *
	 * @return  self
	 */
	public function setFecha($fecha)
	{
		$this->fecha = $fecha;

		return $this;
	}

	/**
	 * Get the value of montoTotal
	 *
	 * @return  	private
	 */
	public function getMontoTotal()
	{
		return $this->montoTotal;
	}

	/**
	 * Set the value of montoTotal
	 *
	 * @param  	private  $montoTotal
	 *
	 * @return  self
	 */
	public function setMontoTotal($montoTotal)
	{
		$this->montoTotal = $montoTotal;

		return $this;
	}

	/**
	 * Get the value of plazo
	 *
	 * @return  	private
	 */
	public function getPlazo()
	{
		return $this->plazo;
	}

	/**
	 * Set the value of plazo
	 *
	 * @param  	private  $plazo
	 *
	 * @return  self
	 */
	public function setPlazo($plazo)
	{
		$this->plazo = $plazo;

		return $this;
	}

	public function guardar()
	{
		$sql = "insert into planpago(fecha,montoTotal,plazo)
				values(
					'$this->fecha',
					$this->montoTotal,
					'$this->plazo'
				)";

		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function modificar()
	{
		$sql = "update planpago
				set 
					fecha = '$this->fecha',
					montoTotal = $this->montoTotal,
					plazo = '$this->plazo'
				where id_plan=$this->id_plan";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql = "delete from planpago
				where id_plan = $this->id_plan";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function mostrar()
	{
		$sql = "select *from planpago";
		return parent::ejecutar($sql);
	}
	
	function buscarFecha()
	{
		$sql = "select *from planpago where fecha like '%$this->fecha'";
		return parent::ejecutar($sql);
	}
	
	function buscarMonto()
	{
		$sql = "select *from planpago where montoTotal like '$this->montoTotal%'";
		return parent::ejecutar($sql);
	}
	
	function buscarPlazo()
	{
		$sql = "select *from planpago where plazo like '%$this->plazo%'";
		return parent::ejecutar($sql);
	}

}
