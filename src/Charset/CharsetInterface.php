<?php

namespace SmsCounterLength\Charset;

interface CharsetInterface {

	public function getLength($text);
	public function splitText($text);
	public function getMaxLengthOne();
	public function getMaxLengthMore();
	public function getCharsetName();

}
