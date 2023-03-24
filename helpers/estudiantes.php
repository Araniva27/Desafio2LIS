<?php
class Estudiantes extends Persona{
    private $calificaciones = null;
    private $mayorEdad = false;
    private $notaPromedio = null;
    private $codigoEstudiante = null;

    public function setCalificaciones($value){
        if(is_array($value) && count($value) == 3){
            $this->calificaciones = $value;
            return true;
        }else{
            return false;
        }
            
    }

    public function getCalificaciones(){
        return $this->calificaciones;
    }

    public function setMayorEdad($value){
        if($value == 1){
            $this->mayorEdad = true;
        }else{
            $this->mayorEdad = false;
        }
    }

    public function getMayorEdad(){
        return $this->mayorEdad;
    }

    public function setNotaPromedio($value){
        if($value>=0 && $value<= 10){
            $this->notaPromedio = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getNotaPromedio(){
        return $this->notaPromedio;
    }

    public function setCodigoEstudiante($value){
        if($this->validarCodigo($value)){
            $this->codigoEstudiante = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getCodigoEstudiante(){
        return $this->codigoEstudiante;
    }

    public function calcularNotaPromedio($value){
        $nota1 = $value[0];
        $nota2 = $value[1];
        $nota3 = $value[2];

        $promedio = ($nota1+$nota2+$nota3)/3;

        return $promedio;
    }

    public function agregarEstudiante($estudiante){
        array_push($_SESSION['estudiantes'],$estudiante);
    }

}
?>