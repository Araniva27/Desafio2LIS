<?php
class Validator
{
    public function validateCorreo($value)
    {
        if(filter_var($value,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    public function validateDUI($value)
    {
        if(preg_match('/^[0-9]{8}-[0-9]{1}$/',$value)){
            return true;
        }else{
            return false;
        }
    }

    public function validateNumeroTelefono($value)
    {
        if(preg_match('/^([2,6,7][0-9]{3})(-)([0-9]{4})$/',$value)){
			return true;
		}else{
			return false;
		}
    }

    public function validateNIT($value)
    {
        if(preg_match('/^[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}$/',$value)){
            return true;
        }else{
            return false;
        }
    }

    public function validatePhoneNumber($value)
    {
        if(preg_match('/^([2,6,7][0-9]{3})(-)([0-9]{4})$/',$value)){
			return true;
		}else{
			return false;
		}
    }

    public function validateSex($value)
    {
        if($value == 'M' || $value == 'F'){
            return true;
        }else{
            return false;
        }
    }

}
?>