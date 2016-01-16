<?php

namespace SmsCounterLength\Parts;

class Parts {

	protected $smsCount = 0;
	protected $charsLeft = 0;
	protected $charSet = '';
	protected $parts = [];

	public function getSmsCount()
	{
		return $this->smsCount;
	}

	public function setSmsCount($smsCount)
	{
		$this->smsCount = $smsCount;
		return $this;
	}

	public function getCharsLeft()
	{
		return $this->charsLeft;
	}

	public function setCharsLeft($charsLeft)
	{
		$this->charsLeft = $charsLeft;
		return $this;
	}

	public function getCharSet()
	{
		return $this->charSet;
	}

	public function setCharSet($charSet)
	{
		$this->charSet = $charSet;
		return $this;
	}

	public function getParts()
	{
		return $this->parts;
	}

	public function setParts($parts)
	{
		$this->parts = $parts;
		return $this;
	}

}
