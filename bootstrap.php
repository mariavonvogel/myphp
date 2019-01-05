<?php

// Объявляем константы на доступ к папкам
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/controllers/");
define("MODEL_PATH", ROOT . "/models/");
define("VIEW_PATH", ROOT . "/views/");


// Подключаем основные классы
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/View.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/route.php';
Route::start();