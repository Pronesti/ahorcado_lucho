<?php

class Ahorcado{
    private $palabraSecreta;
    private $intentosRestantes;
    private $intentosOriginales;
    private $letrasJugadas=array();
    function __construct($palabra, $intentos){
        $this->palabraSecreta=$palabra;
        $this->intentosRestantes=$intentos;
        $this->intentosOriginales=$intentos;
    }

    function mostrar(){
        $resultado="";
        $this->intentosRestantes = $this->intentosOriginales;
        for($i=0;$i<strlen($this->palabraSecreta);$i++){
            if(in_array($this->palabraSecreta[$i],$this->letrasJugadas)){
                $resultado.=$this->palabraSecreta[$i];
            }else{

                $resultado .= "-";
            }
        }
        foreach($this->letrasJugadas as $v){
            if(strpos($this->palabraSecreta, $v)=== false){
                $this->intentosRestantes-=1;
            }
        }
        return $resultado;
    }
    function jugar($letra){
        $this->letrasJugadas[]=$letra;
    }
    function intentosRestantes(){
        return $this->intentosRestantes;
    }
    function gano(){
        if($this->mostrar()==$this->palabraSecreta){
            return true;
        }
        return false;
    }

    function perdio(){
        if($this->intentosRestantes == 0){
            return true;
        }
        return false;
    }
}
