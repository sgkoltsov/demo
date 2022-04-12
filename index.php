<?php

use App\Application;
use App\Controllers\HomeController;
use App\Router;

error_reporting(E_ALL);
ini_set('display_errors',true);

require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/players', [HomeController::class, 'players']);
$router->get('/players/addNew', [HomeController::class, 'addNewPlayer']);
$router->get('/players/saveNew', [HomeController::class, 'savePlayer']);
$router->get('/players/change', [HomeController::class, 'changePlayer']);
$router->get('/players/confirmChange', [HomeController::class, 'changePlayerConfirm']);
$router->get('/players/delete', [HomeController::class, 'deletePlayer']);
$router->get('/players/confirmDelete', [HomeController::class, 'deletePlayerConfirm']);
$router->get('/race', [HomeController::class, 'races']);
$router->get('/race/add', [HomeController::class, 'addRace']);
$router->get('/race/reduce', [HomeController::class, 'reduceRace']);
$router->get('/race/save', [HomeController::class, 'saveRace']);
$router->get('/race/reset', [HomeController::class, 'resetRace']);
$router->get('/race/confirmReset', [HomeController::class, 'resetRaceConfirm']);
$router->get('/finalTable', [HomeController::class, 'total']);

$application = new Application($router);

$application->run($_SERVER['REQUEST_URI'], 'get');
