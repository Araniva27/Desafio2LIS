<?php
class PersonalAdm extends Persona
{
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

    public function setMayorEdad($value)
    {
        if ($value == 1) {
            $this->mayorEdad = "Si";
        } else {
            $this->mayorEdad = "No";
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
            $this->jubilar = "Si";
        } else {
            $this->jubilar = "No";
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
        try {
            if ($aniosT >= 30) {

                return true;
            } elseif ($aniosT < 30) {

                return false;
            }
        } catch (Exception $e) {
            echo "Ha ocurrido un error: " . $e->getMessage();
        }
    }

    public function agregarEmpleado($empleado)
    {
        try {
            array_push($_SESSION['personal'], $empleado);
        } catch (Exception $e) {
            echo "Ha ocurrido un error: " . $e->getMessage();
        }
    }
}
