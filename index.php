<?php

include("/var/www/krumo/class.krumo.php");

require_once("main.class.php");
require_once("singletonModel.class.php");
require_once("render.class.php");
require_once("userInterface.class.php");
require_once("userInterfaceRegions.class.php");
require_once("panel.class.php");

$ui = \zPhpExt\userInterface::getSingleton();

$ui->setLanguage('br');

$ui->setAttributePolla('param1');
$ui->setAttributeHolaquetal('param2');
$ui->setAttributeEnano2('param3');

$ui->setAttributeEnano2('aaaaaaaaaaaaaaaaaaaaaaaaaah');
$ui->setAttributeHolaquetal('aaaaaaaaaaaaaaaaaaaaaaaaaah');

krumo($ui->getAttributes());

$region = new \zPhpExt\userInterfaceRegions('a2');

$panel = new \zPhpExt\panel();
$region->addItem($panel);

$region2 = new \zPhpExt\userInterfaceRegions('polla2');
$region2->setAttributeHeight(200);
$region2->setAttributeWidth(200);
krumo($region2->getAttributes());

$ui->setNorthRegion($region2);
$ui->setSouthRegion($region);
krumo($ui);

//krumo($ui->render());

