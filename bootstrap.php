<?php

// Путь к папкам через реестр

registry::set('controllers', $_SERVER['DOCUMENT_ROOT'] . "/controllers/");
registry::set('models', $_SERVER['DOCUMENT_ROOT'] . "/models/");
registry::set('views', $_SERVER['DOCUMENT_ROOT'] . "/views/");

Route::start();