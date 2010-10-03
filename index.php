<?php

include("/var/www/krumo/class.krumo.php");

require_once("userInterface.class.php");

$ui = \zPhpExt\userInterface::getSingleton();

$ui->setLanguage('br');

$ui->setAttributePolla('param1');
$ui->setAttributeHolaquetal('param2');
$ui->setAttributeEnano2('param3');

$ui->setAttributeEnano2('aaaaaaaaaaaaaaaaaaaaaaaaaah');
$ui->setAttributeHolaquetal('aaaaaaaaaaaaaaaaaaaaaaaaaah');

krumo($ui->getAttributes());

krumo($ui->render());

