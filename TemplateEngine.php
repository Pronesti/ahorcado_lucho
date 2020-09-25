<?php

class TemplateEngine{

    private $str;
    private $aux;
    private $variables=array();

    function __construct($ruta){
        $this->str = file_get_contents($ruta);
        $this->aux = $this->str;
    }

    function addVariable($tipo, $texto){
        $this->variables[$tipo]=$texto;

    }
    
    function buscarClaves(){
        //buscar cuantas palabras clave hay y cuales son
        $var="";
        $claves=array();
        $dentro = false;
        for($i=0; $i<strlen($this->aux);$i=$i+1){
            if($this->aux[$i]=="{" and $this->aux[$i+1]=="{"){
                $dentro = true;
            }
            if($this->aux[$i-2]=="}" and $this->aux[$i-1]=="}"){
                $dentro = false;
                if(!in_array($var, $claves)){
                    $claves[]=$var;
                    $var="";
                }else{
                    $var="";
                }
            }
            if($dentro){
                $var.=$this->aux[$i];
            }
        }
        return $claves;
    }
    function render(){
        $nueva="";
        $dentro = false;
        //para reemplazar lo que quiero:
        foreach($this->variables as $tipo =>$texto){
            $this->aux = str_replace("{{". $tipo . "}}", $texto, $this->aux);
        }

        //para borrar lo que no fue reemplazado:
        for($i=0; $i<strlen($this->aux);$i=$i+1){
            if($this->aux[$i]=="{" and $this->aux[$i+1]=="{"){
                $dentro = true;
            }
            if($this->aux[$i-2]=="}" and $this->aux[$i-1]=="}"){
                $dentro = false;
            }
            if(!$dentro){
                $nueva .= $this->aux[$i];
            }
        }
        return $nueva;
    }
}

