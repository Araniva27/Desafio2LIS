<?php
class PersonalAdm extends Persona
{
    private $asignaturas = null;
    private $mayorEdad = false;
    private $salarioMensual = null;
    private $funciones = null;
    private $aniosTrabajados = null;
    private $jubilar = false;
    private $codigoEmpleado = null;
    private $dependencia = null;

    public function setDependencias($value)
    {
        if (!empty($value)) {
            $this->dependencia = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getDependencias()
    {
        return $this->dependencia;
    }

    public function setAsignaturas($value)
    {
        if (is_array($value) && count($value) == 3) {
            $this->asignaturas = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getAsignaturas()
    {
        return $this->asignaturas;
    }

    public function setMayorEdad($value)
    {
        if ($value == 1) {
            $this->mayorEdad = true;
        } else {
            $this->mayorEdad = false;
        }
    }

    public function getMayorEdad()
    {
        return $this->mayorEdad;
    }

    public function setSalarioMensual($value)
    {
        if (!empty($value) && $value > 0) {
            $this->salarioMensual = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getSalarioMensual()
    {
        return $this->salarioMensual;
    }

    public function setFunciones($value)
    {
        if (!empty($value)) {
            $this->funciones = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getFunciones()
    {
        return $this->funciones;
    }

    public function setAniosTrabajados($value)
    {
        if (!empty($value) && $value > 0) {
            $this->aniosTrabajados = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getAniosTrabajados()
    {
        return $this->aniosTrabajados;
    }

    public function setjubilar($value)
    {
        if ($value == 1) {
            $this->jubilar = true;
        } else {
            $this->jubilar = false;
        }
    }

    public function getjubilar()
    {
        return $this->jubilar;
    }

    public function setcodigoEmpleado($value)
    {
        if ($this->validarCodigo(($value))) {
            $this->codigoEmpleado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getcodigoEmpleado()
    {
        return $this->codigoEmpleado;
    }

    public function jubilacion($aniosT)
    {
        if ($aniosT >= 30) {
            $this->jubilar = true;
            return 1;
        } elseif ($aniosT < 30){
            $this->jubilar = false;
            return 0;
        }
    }

    public function agregarEmpleado($empleado){
        try{
            array_push($_SESSION['personal'],$empleado);
        }catch(Exception $e){
            echo "Ha ocurrido un error: ".$e->getMessage();
        }
       
    }
}
