<?php

namespace SmsCounterLength;

use SmsCounterLength\Charset\CharsetFactory;
use SmsCounterLength\Parts\Parts;
use SmsCounterLength\Charset\CharsetInterface;

class SmsCounter {

	public function parse($text)
	{
		$chfact = new CharsetFactory;
		$charset = $chfact->createCharset($text);
		return $this->getParts($charset, $text);
	}

	protected function getParts(CharsetInterface $charset, $text)
	{
		$parts = new Parts;
		$parts->setCharSet($charset->getCharsetName());
		$partsArr = $charset->splitText($text);
		$parts->setParts($partsArr)
			  ->setSmsCount(count($partsArr));
		$max = ($parts->getSmsCount()>1) ? $charset->getMaxLengthMore() : $charset->getMaxLengthOne();
		$parts->setCharsLeft($max - $charset->getLength($partsArr[count($partsArr) - 1]));

		return $parts;
	}

}
