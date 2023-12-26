<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Views'. DIRECTORY_SEPARATOR);

require "elements/header.php";

$uri = $_SERVER['REQUEST_URI'];

$router = new AltoRouter();

$router->map('GET','/','Home','home');

$router->map('GET','/rh','Rh','rh');

$router->map('GET','/annuaire','Phonebook','phonebook');

$router->map('GET','/support','Support','support');


$match = $router->match();

//dump($match);

//dump($match['params']);

if (is_array($match))
{
    $param = $match['params'];
    require BASE_VIEW_PATH . "{$match['target']}/{$match['name']}.php";
}
else {
    echo 'erreur 404';
}

require "elements/footer.php";

/*$router = new Router();

$router->register('/',['Homecontroller','index']);

$router->register('/rh', ['RhController','index']);

$router->register('/annuaire', ['PhonebookController','index']);

$router->register('/organigramme', ['OrgachartController','index']);

$router->register('support',['supportController','index']);


$router->run();*/