<?php

namespace test;

use SmsCounterLength\SmsCounter;

class SmsCounterTest extends \PHPUnit_Framework_TestCase {

	public function testTextoNormal1Mensaje()
    {
    	$smsc = new SmsCounter;
    	$mensaje = 'Esto es un solo mensaje';
    	$resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 1);
        $this->assertEquals($resul->getCharsLeft(), 137);
        $this->assertEquals($resul->getCharSet(), 'GSM 3.38');
        $this->assertEquals(count($resul->getParts()), 1);
        $this->assertEquals($resul->getParts()[0], $mensaje);
    }

    public function testTextoConDobles1Mensaje()
    {
    	$smsc = new SmsCounter;
    	$mensaje = 'Esto es un solo € mensaje con dobles []';
    	$resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 1);
        $this->assertEquals($resul->getCharsLeft(), 118);
        $this->assertEquals($resul->getCharSet(), 'GSM 3.38');
        $this->assertEquals(count($resul->getParts()), 1);
        $this->assertEquals($resul->getParts()[0], $mensaje);
    }

    public function testTextoNormal3Mensajes()
    {
    	$smsc = new SmsCounter;
    	$mensaje = 'Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.';
    	$resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 3);
        $this->assertEquals($resul->getCharsLeft(), 117);
        $this->assertEquals($resul->getCharSet(), 'GSM 3.38');
        $this->assertEquals(count($resul->getParts()), 3);
        $this->assertEquals($resul->getParts()[0], 'Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.M');
        $this->assertEquals($resul->getParts()[1], 'ensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Me');
        $this->assertEquals($resul->getParts()[2], 'nsaje largoooooo.Mensaje largoooooo.');
    }

    public function testTextoConDobles2Mensajes()
    {
    	$smsc = new SmsCounter;
    	$mensaje = 'Mensaje largoooooo.Mensaje largoooooo.Mensaje [] largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje € largoooooo.Mensaje largoooooo.';
    	$resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 2);
        $this->assertEquals($resul->getCharsLeft(), 32);
        $this->assertEquals($resul->getCharSet(), 'GSM 3.38');
        $this->assertEquals(count($resul->getParts()), 2);
        $this->assertEquals($resul->getParts()[0], 'Mensaje largoooooo.Mensaje largoooooo.Mensaje [] largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largooo');
        $this->assertEquals($resul->getParts()[1], 'ooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje largoooooo.Mensaje € largoooooo.Mensaje largoooooo.');
    }

    public function testTexto1Mensaje()
    {
        $smsc = new SmsCounter;
        $mensaje = 'НАШИ ОБЯЗАТЕЛЬСТВА';
        $resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 1);
        $this->assertEquals($resul->getCharsLeft(), 52);
        $this->assertEquals($resul->getCharSet(), 'Unicode');
        $this->assertEquals(count($resul->getParts()), 1);
        $this->assertEquals($resul->getParts()[0], $mensaje);
    }

    public function testTexto2Mensajes()
    {
        $smsc = new SmsCounter;
        $mensaje = 'НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА';
        $resul = $smsc->parse($mensaje);
        $this->assertEquals($resul->getSmsCount(), 2);
        $this->assertEquals($resul->getCharsLeft(), 21);
        $this->assertEquals($resul->getCharSet(), 'Unicode');
        $this->assertEquals(count($resul->getParts()), 2);
        $this->assertEquals($resul->getParts()[0], 'НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗА');
        $this->assertEquals($resul->getParts()[1], 'ТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА');
    }

}
