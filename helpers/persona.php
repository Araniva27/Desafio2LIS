<?php
class Persona extends Validator{

    protected $nombre = null;
    protected $apellido = null;
    protected $dui = null;
    protected $nit = null;
    protected $direccion = null;
    protected $correoElectronico = null;
    protected $telefonoMovil = null;
    protected $telefonoFijo = null;
    protected $sexo = null;
    protected $fechaNacimiento = null;
    protected $edad = null;

    //Getter and setter de los diferentes atributos
    public function setNombre($value)
    {
        if(!empty($value)){
            $this->nombre = $value;
            return true;
        }else{
            return false;
        }
    }
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setDui($value){
        if($this->validateDUI($value)){
            $this->dui = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getDui(){
        return $this->dui;
    }

    public function setNit($value){
        if($this->validateNIT($value)){
            $this->nit = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getNit(){
        return $this->nit;
    }

    public function setDireccion($value){
        if(!empty($value)){
            $this->direccion = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setCorreo($value){
        if($this->validateCorreo($value)){
            $this->correoElectronico = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getCorre(){
        return $this->correoElectronico;
    }

    public function setTelefonoMovil($value){
        if($this->validateNumeroTelefono($value)){
            $this->telefonoMovil = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefonoMovil(){
        return $this->telefonoMovil;
    }

    public function setTelefonoFijo($value){
        if($this->validatePhoneNumber($value)){
            $this->telefonoFijo = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefonoFijo(){
        return $this->telefonoFijo;
    }

    public function setSexo($value){
        if($this->validateSex($value)){
            $this->sexo = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getSexo(){
        return $this->sexo;
    }

    public function setFechaNacimiento($value){
        if(!empty($value)){
            $this->fechaNacimiento = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    //Métodos de la clase

    public function generarCodigo(){
        try{
            $nombre = $this->nombre;
            $apellido = $this->apellido;
            $primeraLetraNombre = strtoupper(substr($nombre,0,1));
            $primeraLetraApellido = strtoupper(substr($apellido,0,1));
            $numeroAleatorio = rand(1000,9999);
            $codigo = "{$primeraLetraNombre}{$primeraLetraApellido}{$numeroAleatorio}";
            return $codigo;
        }catch(Exception $e){
            echo "Ha ocurrido un error: ".$e->getMessage();
        }
            
    }

    public function esMayorEdad($edad){
        if($edad >= 18){
            return true;
        }else{
            return false;
        }
    }

    public function calcularEdad(){
        try{
            $fechaNacimiento = $this->fechaNacimiento;
            $fechaActual = new Datetime();
            $edad = $fechaActual->diff(new DateTime($fechaNacimiento))->y;

            return $edad;
        }catch(Exception $e){
            echo "Ha ocurrido un error: ".$e->getMessage();
        }

    }
}

?>