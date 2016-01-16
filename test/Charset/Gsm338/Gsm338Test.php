<?php

namespace test\Charset\Gsm338;

use SmsCounterLength\Charset\Gsm338\Gsm338;

class Gsm338Test extends \PHPUnit_Framework_TestCase {
	
    public function testIsGsmConTextoGsm()
    {
    	$gsm338 = new Gsm338;
    	$this->assertEquals($gsm338->isGsm('probando'), true);
    	$this->assertEquals($gsm338->isGsm('probandol lkd s €'), true);
    	$this->assertEquals($gsm338->isGsm('probandol lkd s АТЕЛЬСТ'), false);
    	$this->assertEquals($gsm338->isGsm('АТЕЛЬСТ'), false);
    }

    public function testGetLength()
    {
        $gsm338 = new Gsm338;
        $this->assertEquals($gsm338->getLength('probando longitud del texto'), 27);
        $this->assertEquals($gsm338->getLength('dfskldj afieoj fald fiea fljdslfij eali fjelijdslfkj dlkdjsafljdlkfj '), 69);
        $this->assertEquals($gsm338->getLength('dlksajf lkdsaj flkad jslfj ieafj lkds ajfieojaldskfjdalsfijdslkfjd slkfj dlksjflkds jflkjdlkfjdaslfjdslakfj dfj dklsajf kld sajfjd flkj dsalkfjdsalfj dlsakfj leiafj eilajfldf jdilafj dis fiadsj fli'), 197);
        $this->assertEquals($gsm338->getLength('probando longitud []del texto'), 31);
        $this->assertEquals($gsm338->getLength('dfskldj afieoj fald fiea fljdslfij eali fjelijdslfkj dlkdjsafljdlkfj €€€'), 75);
        $this->assertEquals($gsm338->getLength('dlksajf €lkdsaj {flkad jslfj ieafj lkds ajfieojaldskfjdalsfijdslkfjd slkfj dlksjflkds jflkjdlkfjdaslfjdslakfj dfj dklsajf kld sajfjd flkj dsalkfjdsalfj dlsakfj leiafj eilajfldf jdilafj dis fiadsj }fli'), 203);
    }

    public function testSplitText()
    {
        $gsm338 = new Gsm338;
        $this->assertEquals(count($gsm338->splitText('€€€ [[]]')), 1);
        $this->assertEquals(count($gsm338->splitText('ewioruewioruiewou€€ weioruweoir uweoiu')), 1);
        $this->assertEquals(count($gsm338->splitText('fdsfsdfsdfsdfkljds flkjdsaflk dakfjsadkljflkdsa jfklds jafkjd alkfjdaslkfj dska fjklsda jflj dsalfkjd salkf jsda f dsaflkj daslkfj sad jf dsfj slkdajf kdsa fd safk jdsalkfj sdalk jfds jfj dsjlfkjdskf jdlksj')), 2);
        $this->assertEquals(count($gsm338->splitText('quwiyewuqieyuqweuqwey qwuyeqiuweyuqyeiuqw yquwieyuiwqeyuiqweyuiqw yeuiqwyeuiqwe yquwi yeuiqwey qwuyeuiqwye qw yeiuqyeuiqw yequw yequw eqwyuey euiyq weuiqwye uwy')), 1);
        $this->assertEquals(count($gsm338->splitText('quwiyewuqieyuqweuqwey qwuyeqiuweyuqyeiuqw yquwieyuiwqeyuiqweyuiqw yeuiqwyeuiqwe yquwi yeuiqwey qwuyeuiqwye qw yeiuqyeuiqw yequw yequw eqwyuey euiyq weuiqwye uwrr')), 2);
        $this->assertEquals(count($gsm338->splitText('quwiyewuqieyuqweuqwey qwuyeqiuweyuqyeiuqw yquwieyuiwqeyuiqweyuiqw yeuiqwyeuiqwe yquwi yeuiqwey qwuyeuiqwye qw yeiuqyeuiqw yequw yequw eqwyuey euiyq weuiqwye uw€')), 2);
    }

}
