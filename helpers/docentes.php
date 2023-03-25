<?php
class Docentes extends Persona{
    private $materias = null;
    private $mayorEdad = false;
    private $horasTrabajadas = null;
    private $pagoHora = null;
    private $salario = null;
    private $codigoDocente = null;
    
    public function setMaterias($value){
        if(is_array($value) && count($value) == 3){
            $this->materias = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getMaterias(){
        return $this->materias;
    }

    public function setMayorEdad($value){
        if($value == 1){
            $this->mayorEdad = "Si"; 
        }else{
            $this->mayorEdad = "No";
        }
    }

    public function getmMayorEdad(){
        return $this->mayorEdad;
    }

    public function setHorasTrabajadas($value){
        if($value >= 1){
            $this->horasTrabajadas = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getPagoHora(){
        return $this->pagoHora;
    }

    public function getHorasTrabajadas(){
        return $this->horasTrabajadas;
    }

    public function setPagoHora($value){
        if($value >= 1){
            $this->pagoHora = $value;
            return true;
        }else{
            return false;
        }
    }

    public function setSalario($value){
        if($value >= 1){
            $this->salario = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getSalario(){
        return $this->salario;
    }

    public function setCodigoDocente($value){
        if($this->validarCodigo($value)){
            $this->codigoDocente = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getCodigoDocente(){
        return $this->codigoDocente;
    }

    public function calcularSalario($horasTrabajadas,$pagoHora){
        try{
            $salario = $horasTrabajadas*$pagoHora;
            return $salario;
        }catch(Exception $e){
            echo "Ha ocurrido un error: ".$e->getMessage();
        }
           
    }

    public function agregarDocente($docente){
        try{            
            array_push($_SESSION['docentes'],$docente);
        }catch(Exception $e){
            echo "Ha ocurrido un error: ".$e->getMessage();
        }
       
    }
}

?>