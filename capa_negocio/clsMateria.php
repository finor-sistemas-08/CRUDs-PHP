<?php

include_once('capa_datos/clsConexion.php');

class Materia extends Conexion
{
	//atributos
	private $sigla;
	private $nombre;

	//construtor
	public function __construct()
	{
		parent::__construct();
		$this->sigla = "";
		$this->nombre = "";
	}

	public function getSigla()
	{
		return $this->sigla;
	}
	public function setSigla($val)
	{
		$this->sigla = $val;
	}

	public function setNombre($val)
	{
		$this->nombre = $val;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function guardar()
	{
		$sql = "insert into materia(sigla,nombre)
				values(
					'$this->sigla',
					'$this->nombre'
					)";

		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function modificar()
	{
		$sql = "update materia
				set nombre = '$this->nombre'
				where sigla='$this->sigla'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function eliminar()
	{
		$sql = "delete from materia
				where sigla='$this->sigla'";
		if (parent::ejecutar($sql))
			return true;
		else
			return false;
	}

	public function mostrar()
	{
		$sql = "select *from materia";
		return parent::ejecutar($sql);
	}
}
