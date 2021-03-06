<?php

include("/var/www/krumo/class.krumo.php");

require_once("templates/main.class.php");
require_once("templates/init.class.php");

require_once("main.class.php");
require_once("singletonModel.class.php");
require_once("userInterface.class.php");
require_once("render.class.php");
require_once("userInterfaceRegion.class.php");
require_once("panel.class.php");
require_once("grid.class.php");
require_once("tree.class.php");
require_once("datastore.class.php");
require_once("objectToXML.class.php");

$ui = \zPhpExt\userInterface::getSingleton();

$ui->setLanguage('br');

$ui->setAttributePolla('param1');
$ui->setAttributeHolaquetal('param2');
$ui->setAttributeEnano2('param3');

$ui->setAttributeEnano2('aaaaaaaaaaaaaaaaaaaaaaaaaah');
$ui->setAttributeHolaquetal('aaaaaaaaaaaaaaaaaaaaaaaaaah');

krumo($ui->getAttributes());

$region = new \zPhpExt\userInterfaceRegion('a2');

$panel = new \zPhpExt\panel();
$panel->setAttributeHeight('200');
$region->addItem($panel);

$region2 = new \zPhpExt\userInterfaceRegion('p2');
$region2->setAttributeHeight(200);
$region2->setAttributeWidth(200);
$region2->addItem($panel);
//krumo($region2->getAttributes());

$grid = new \zPhpExt\grid();
$datastore = new \zPhpExt\datastore();


$tree = new \zPhpExt\tree();
//$region2->addItem($grid);
//$region2->addItem($tree);
$ui->setNorthRegion($region2);
//$ui->setSouthRegion($region);
krumo($ui);

$resultado = $ui->render('hola', 'adios');

krumo($resultado);
