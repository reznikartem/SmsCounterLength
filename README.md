SmsCounterLength
================

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/8775ec02-53ad-414c-9dd7-e1af1bfbbff1/mini.png)](https://insight.sensiolabs.com/projects/8775ec02-53ad-414c-9dd7-e1af1bfbbff1)
[![Latest Stable Version](https://poser.pugx.org/ale-blanco/sms-counter-length/v/stable)](https://packagist.org/packages/ale-blanco/sms-counter-length)
[![Build Status](https://travis-ci.org/ale-blanco/SmsCounterLength.svg?branch=master)](https://travis-ci.org/ale-blanco/SmsCounterLength)

Libreria php para calcular el numero de sms necesarios para enviar un texto

Inspirada en https://github.com/vchatterji/gsm

Instalacion
-----------

Mediante composer

``` bash
composer require ale-blanco/sms-counter-length
```

Uso
---

``` php

$counter = (new SmsCounter())->parse('Texto que se quiere medir la longuitud, para ver cuantos sms hacen falta para poder enviarlo. En este caso en un sms larga que se debe enviar mediante el uso de 2 mensajes, ya que tiene mas de 160 caracteres.');

echo $counter->getSmsCount(); //2
echo $counter->getCharsLeft(); //98
echo $counter->getCharSet(); //GSM 3.38
var_dump($counter->getParts());// array(2) {
							   //   [0]=>
							   //   string(153) "Texto que se quiere medir la longuitud, para ver cuantos sms hacen falta para poder enviarlo. En este caso en un sms larga que se debe enviar mediante el"
							   //   [1]=>
							   //   string(55) " uso de 2 mensajes, ya que tiene mas de 160 caracteres."
							   // }
							   
```