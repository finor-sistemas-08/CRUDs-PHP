<?php

include_once('capa_datos/clsConexion.php');

class Prerequisito extends Conexion
{
    //atributos
    private $sigla;
    private $preReq;

    //construtor
    public function __construct()
    {
        parent::__construct();
        $this->sigla = "";
        $this->preReq = "";
    }

    public function getSigla()
    {
        return $this->sigla;
    }
    public function setSigla($val)
    {
        $this->sigla = $val;
    }

    public function setPreReq($val)
    {
        $this->preReq = $val;
    }

    public function getPreReq()
    {
        return $this->preReq;
    }

    public function guardar()
    {
        $sql = "insert into prerequisito(sigla,preReq)
				values(
					'$this->sigla',
					'$this->preReq'
					)";

        if (parent::ejecutar($sql))
            return true;
        else
            return false;
    }

    public function modificar()
    {
        $sql = "update prerequisito
				set sigla = '$this->sigla',
                    preReq = '$this->preReq'
				where sigla='$this->sigla' and preReq='$this->preReq'";
        if (parent::ejecutar($sql))
            return true;
        else
            return false;
    }

    public function eliminar()
    {
        $sql = "delete from prerequisito
                where sigla='$this->sigla' and preReq='$this->preReq'";
        if (parent::ejecutar($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        $sql = "select *from prerequisito";
        return parent::ejecutar($sql);
    }
}
