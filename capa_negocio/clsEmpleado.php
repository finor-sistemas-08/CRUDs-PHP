<?php

include_once('capa_datos/clsConexion.php');

class Empleado extends Conexion
{
	//atributos
	private $ci;
	private $nombres;
	private $paterno;
	private $materno;
	private $sueldo;
	private $vel_typeo;
	private $grado;
	private $tipo;

	//construtor
	public function __construct()
	{
		parent::__construct();
		$this->ci = 0;
		$this->nombres = "";
		$this->paterno = "";
		$this->materno = "";
		$this->sueldo = 0;
		$this->vel_typeo = 0;
		$this->grado = "";
		$this->tipo = "";
	}
	//propiedades de acceso
	/**
	 * Get the value of ci
	 */
	public function getCi()
	{
		return $this->ci;
	}

	/**
	 * Set the value of ci
	 *
	 * @return  self
	 */
	public function setCi($ci)
	{
		$this->ci = $ci;

		return $this;
	}

	/**
	 * Get the value of nombres
	 */
	public function getNombres()
	{
		return $this->nombres;
	}

	/**
	 * Set the value of nombres
	 *
	 * @return  self
	 */
	public function setNombres($nombres)
	{
		$this->nombres = $nombres;

		return $this;
	}

	/**
	 * Get the value of paterno
	 */
	public function getPaterno()
	{
		return $this->paterno;
	}

	/**
	 * Set the value of paterno
	 *
	 * @return  self
	 */
	public function setPaterno($paterno)
	{
		$this->paterno = $paterno;

		return $this;
	}

	/**
	 * Get the value of materno
	 */
	public function getMaterno()
	{
		return $this->materno;
	}

	/**
	 * Set the value of materno
	 *
	 * @return  self
	 */
	public function setMaterno($materno)
	{
		$this->materno = $materno;

		return $this;
	}

	/**
	 * Get the value of sueldo
	 */
	public function getSueldo()
	{
		return $this->sueldo;
	}

	/**
	 * Set the value of sueldo
	 *
	 * @return  self
	 */
	public function setSueldo($sueldo)
	{
		$this->sueldo = $sueldo;

		return $this;
	}

	/**
	 * Get the value of vel_typeo
	 */
	public function getVelTypeo()
	{
		return $this->vel_typeo;
	}

	/**
	 * Set the value of vel_typeo
	 *
	 * @return  self
	 */
	public function setVelTypeo($vel_typeo)
	{
		$this->vel_typeo = $vel_typeo;

		return $this;
	}

	/**
	 * Get the value of grado
	 */
	public function getGrado()
	{
		return $this->grado;
	}

	/**
	 * Set the value of grado
	 *
	 * @return  self
	 */
	public function setGrado($grado)
	{
		$this->grado = $grado;

		return $this;
	}

	/**
	 * Get the value of tipo
	 */
	public function getTipo()
	{
		return $this->tipo;
	}

	/**
	 * Set the value of tipo
	 *
	 * @return  self
	 */
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;

		return $this;
	}

	public function guardar()
	{
		$sql = "insert into empleado(ci,nombres,paterno,materno,sueldo,vel_typeo,grado,tipo)
				values(
					$this->ci,
					'$this->nombres',
					'$this->paterno',
					'$this->materno',
					$this->sueldo,
					$this->vel_typeo,
					'$this->grado',
					'$this->tipo'
					)";

		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function modificar()
	{
		$sql = "update empleado
				set 
					nombres = '$this->nombres',
					paterno = '$this->paterno',
					materno = '$this->materno',
					sueldo = $this->sueldo,
					vel_typeo = $this->vel_typeo,
					grado = '$this->grado',
					tipo = '$this->tipo'
				where ci=$this->ci";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql = "delete from empleado
				where ci=$this->ci";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function mostrar()
	{
		$sql = "select *from empleado";
		return parent::ejecutar($sql);
	}
}
