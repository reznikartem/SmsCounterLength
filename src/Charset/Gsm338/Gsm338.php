<?php

namespace SmsCounterLength\Charset\Gsm338;

use SmsCounterLength\Charset\CharsetInterface;

class Gsm338 implements CharsetInterface {

	protected $charset = ['@'=> 1, '£'=> 1, '$'=> 1, '¥'=> 1, 'è'=> 1, 'é'=> 1, 'ù'=> 1, 'ì'=> 1, 'ò'=> 1, 'Ç'=> 1, "\n"=>1, 'Ø'=> 1, 'ø'=> 1, "\r"=>1, 'Å'=> 1, 'å'=> 1, 'Δ'=> 1, '_'=> 1, 'Φ'=> 1, 'Γ'=> 1, 'Λ'=> 1, 'Ω'=> 1, 'Π'=> 1, 'Ψ'=> 1, 'Σ'=> 1, 'Θ'=> 1, 'Ξ'=> 1, 'Æ'=> 1, 'æ'=> 1, 'ß'=> 1, 'É'=> 1, ' '=> 1, '!'=> 1, '"'=> 1, '#'=> 1, '¤'=> 1, '%'=> 1, '&'=> 1, "'"=>1, '('=> 1, ')'=> 1, '*'=> 1, '+'=> 1, ','=> 1, '-'=> 1, '.'=> 1, '/'=> 1, '0'=> 1, '1'=> 1, '2'=> 1, '3'=> 1, '4'=> 1, '5'=> 1, '6'=> 1, '7'=> 1, '8'=> 1, '9'=> 1, '=>'=> 1, ';'=> 1, '<'=> 1, '='=> 1, '>'=> 1, '?'=> 1, '¡'=> 1, 'A'=> 1, 'B'=> 1, 'C'=> 1, 'D'=> 1, 'E'=> 1, 'F'=> 1, 'G'=> 1, 'H'=> 1, 'I'=> 1, 'J'=> 1, 'K'=> 1, 'L'=> 1, 'M'=> 1, 'N'=> 1, 'O'=> 1, 'P'=> 1, 'Q'=> 1, 'R'=> 1, 'S'=> 1, 'T'=> 1, 'U'=> 1, 'V'=> 1, 'W'=> 1, 'X'=> 1, 'Y'=> 1, 'Z'=> 1, 'Ä'=> 1, 'Ö'=> 1, 'Ñ'=> 1, 'Ü'=> 1, '§'=> 1, '¿'=> 1, 'a'=> 1, 'b'=> 1, 'c'=> 1, 'd'=> 1, 'e'=> 1, 'f'=> 1, 'g'=> 1, 'h'=> 1, 'i'=> 1, 'j'=> 1, 'k'=> 1, 'l'=> 1, 'm'=> 1, 'n'=> 1, 'o'=> 1, 'p'=> 1, 'q'=> 1, 'r'=> 1, 's'=> 1, 't'=> 1, 'u'=> 1, 'v'=> 1, 'w'=> 1, 'x'=> 1, 'y'=> 1, 'z'=> 1, 'ä'=> 1, 'ö'=> 1, 'ñ'=> 1, 'ü'=> 1, 'à'=> 1, "\f"=> 2, '^'=> 2, '{'=> 2, '}'=> 2, '\\'=> 2, '['=> 2, '~'=> 2, ']'=> 2, '|'=> 2, '€'=> 2, ':' => 1];

	public function getMaxLengthOne()
	{
		return 160;
	}

	public function getMaxLengthMore()
	{
		return 153;
	}

	public function getCharsetName()
	{
		return 'GSM 3.38';
	}

	public function isGsm($text)
	{
		$chars = $this->splitChars($text);
		foreach($chars as $char){
			if(!isset($this->charset[$char])){
				return false;
			}
		}
		return true;
	}

	public function getLength($text)
	{
		$total = 0;
		$textArr = $this->splitChars($text);
		foreach($textArr as $char){
			$total += $this->charset[$char];
		}

		return $total;
	}

    public function splitText($text)
    {
    	if($this->getLength($text)<=$this->getMaxLengthOne())
    		return [$text];

    	$resul = [];
    	$textArr = $this->splitChars($text);
    	$temp = '';
    	$sum = 0;
    	foreach($textArr as $char){
    		$val = $this->charset[$char];
    		if($sum + $val <= $this->getMaxLengthMore()){
			 	$temp .= $char;
			 	$sum += $val;
    		}else{
    			$resul[] = $temp;
    			$temp = $char;
    			$sum = $val;
    		}
		}
		if($temp!='')
			$resul[] = $temp;

		return $resul;
    }

    protected function splitChars($string)
    {
        return preg_split('//u', $string, null, PREG_SPLIT_NO_EMPTY);
    }
    
}
