<?php

namespace test\Charset\Gsm338;

use SmsCounterLength\Charset\Unicode\Unicode;

class UnicodeTest extends \PHPUnit_Framework_TestCase {

    public function testGetLength()
    {
        $unicode = new Unicode;
        $this->assertEquals($unicode->getLength('probando АТЕЛЬСТ'), 16);
        $this->assertEquals($unicode->getLength('probandol lkd s €  ОБЯЗАТЕЛЬСТВА.НАШИ'), 37);
        $this->assertEquals($unicode->getLength('НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА'), 113);
    }

    public function testSplitText()
    {
        $unicode = new Unicode;
        $this->assertEquals(count($unicode->splitText('probando АТЕЛЬСТ')), 1);
        $this->assertEquals(count($unicode->splitText('probandol lkd s €  ОБЯЗАТЕЛЬСТВА.НАШИ')), 1);
        $this->assertEquals(count($unicode->splitText('НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА')), 2);
        $this->assertEquals(count($unicode->splitText('НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛ')), 1);
        $this->assertEquals(count($unicode->splitText('НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЬСТВА.НАШИ ОБЯЗАТЕЛЛ')), 2);
    }
	
}
