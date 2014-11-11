<?php 
class saValidar { 
    public $errors = array();

    function validarData($data){
        
        foreach ($data as $key => $value) {   
            if($value == ""){
                $this->errors[] = $key;
            }
        }

        if(count($this->errors) == 0){
            return false;
        }
        else{
            return true;
        }   
    }

    function showErrors(){
        $message = "Faltan los siguientes datos: <br/>";
        foreach ($this->errors as $key => $value) {
            $message .= $value."<br/>";
        }
        return $message;
    }

    function limpiarCadena($valor){
        $valor = str_ireplace("SELECT","",$valor);
        $valor = str_ireplace("COPY","",$valor);
        $valor = str_ireplace("DELETE","",$valor);
        $valor = str_ireplace("DROP","",$valor);
        $valor = str_ireplace("DUMP","",$valor);
        $valor = str_ireplace(" OR ","",$valor);
        $valor = str_ireplace("%","",$valor);
        $valor = str_ireplace(";","",$valor);
        $valor = str_ireplace("LIKE","",$valor);
        $valor = str_ireplace("--","",$valor);
        $valor = str_ireplace("^","",$valor);
        $valor = str_ireplace("[","",$valor);
        $valor = str_ireplace("]","",$valor);
        $valor = str_ireplace("\\","",$valor);
        $valor = str_ireplace("!","",$valor);
        $valor = str_ireplace("¡","",$valor);
        $valor = str_ireplace("?","",$valor);
        $valor = str_ireplace("=","",$valor);
        $valor = str_ireplace("&","",$valor);
        $valor = str_ireplace("°","",$valor);
        return $valor;

        foreach ($_POST as $key => $value) {
            $_POST[$key] = limpiarCadena($value);
        }
    }

    
} 

?>

