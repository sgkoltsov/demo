<?php

define('APP_DIR', $_SERVER['DOCUMENT_ROOT'] . '/src');
define('VIEW_DIR', $_SERVER['DOCUMENT_ROOT'] . '/view/');
define('DATA_DIR', $_SERVER['DOCUMENT_ROOT'] . '/data/');
define('FILE_OF_USERS', $_SERVER['DOCUMENT_ROOT'] . '/data/data_cars.json');
define('FILE_OF_ATTEMPTS', $_SERVER['DOCUMENT_ROOT'] . '/data/data_attempts.json');
define('FILE_ATTEMPTS_COUNT', $_SERVER['DOCUMENT_ROOT'] . '/data/data_attempts_count.json');

require APP_DIR . '/Router.php';
require APP_DIR . '/Application.php';
require APP_DIR . '/Controllers/HomeController.php';
require APP_DIR . '/Route.php';
require APP_DIR . '/User.php';
require APP_DIR . '/Attempt.php';
require APP_DIR . '/View/Renderable.php';
require APP_DIR . '/View/View.php';
require APP_DIR . '/Exception/NotFoundException.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/helpers.php';
