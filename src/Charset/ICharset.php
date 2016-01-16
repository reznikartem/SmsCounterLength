<?php

namespace SmsCounterLength\Charset;

interface ICharset {

	public function getLength($text);
	public function splitText($text);
	public function getMaxLengthOne();
	public function getMaxLengthMore();
	public function getCharsetName();

}
