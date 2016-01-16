<?php

namespace SmsCounterLength\Charset;

use SmsCounterLength\Charset\Gsm338\Gsm338;
use SmsCounterLength\Charset\Unicode\Unicode;

class CharsetFactory {

	public function createCharset($text)
	{
		$gsm = new Gsm338;
		return ($gsm->isGsm($text)) ? new Gsm338 : new Unicode;
	}

}
