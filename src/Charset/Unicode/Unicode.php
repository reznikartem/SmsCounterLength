<?php

namespace SmsCounterLength\Charset\Unicode;

use SmsCounterLength\Charset\CharsetInterface;

class Unicode implements CharsetInterface {

	public function getMaxLengthOne()
	{
		return 70;
	}

	public function getMaxLengthMore()
	{
		return 67;
	}

	public function getCharsetName()
	{
		return 'Unicode';
	}

	public function getLength($text)
	{
		return mb_strlen($text, 'UTF8');
	}

    public function splitText($text)
    {
    	if($this->getLength($text)<=$this->getMaxLengthOne())
    		return [$text];
    	
    	$resul = [];
    	while($this->getLength($text)>$this->getMaxLengthMore()){
    		$resul[] = mb_substr($text, 0, $this->getMaxLengthMore(), 'UTF8');
    		$text = mb_substr($text, $this->getMaxLengthMore(), null,'UTF8');
    	}
		if($text!='')
			$resul[] = $text;

		return $resul;
    }

}
