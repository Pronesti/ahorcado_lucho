<?php

require_once("./vendor/autoload.php");
include("./Ahorcado.php");

use PHPUnit\Framework\TestCase;
final class AhorcadoTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    function testExisteAhorcado(){
        $this->assertTrue(class_exists("Ahorcado"));
    }
    function testPuedoConstruirUnAhorcado(){
        $ahorcado=new Ahorcado("rostro",5);
        $this->assertTrue(!empty($ahorcado));
    }
    function testMuestraGuiones(){
        $ahorcado=new Ahorcado("rostro",5);
        $palabra=$ahorcado->mostrar();
        $this->assertEquals("------",$palabra);
    }
    function testMostrarGuionesDistintasPalabras(){
        $ahorcado1=new Ahorcado("rostro",5);
        $ahorcado2=new Ahorcado("cara",5);
        $this->assertEquals("------",$ahorcado1->mostrar());
        $this->assertEquals("----",$ahorcado2->mostrar());
    }
    function testJugamosUnaLetra(){
        $ahorcado=new Ahorcado("rostro",5);
        $ahorcado->jugar("o");
        $this->assertEquals("-o---o", $ahorcado->mostrar());
        $ahorcado->jugar("t");
        $this->assertEquals("-o-t-o", $ahorcado->mostrar());
        $ahorcado->jugar("o");
        $this->assertEquals("-o-t-o", $ahorcado->mostrar());
    }
    function tesGane(){
        $ahorcado=new Ahorcado("rostro",5);
        $ahorcado->jugar("r");
        $ahorcado->jugar("o");
        $ahorcado->jugar("s");
        $ahorcado->jugar("t");
        $ahorcado->jugar("r");
        $ahorcado->jugar("o");
        $ahorcado->gane();
        $this->assertEquals("rostro", $ahorcado->mostrar());
        $this->assertEquals(true, $ahorcado->gane());
    }
    
    





}