<?php
/**
* didww-demo
*
* @author Igor Gonchar <gigorok@gmail.com>
* @copyright 2013 Igor Gonchar
*/

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

session_start();

$app = new Yoda\Application();

Yoda\Application::$rootPath = Yoda\Application::$config['application']['rootPath'] ?: null;
$app->run();