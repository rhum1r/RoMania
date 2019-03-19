<?php
session_start();


require '../Kernel/Router.php';
require '../controller/Frontend.php';

$router = new Router(); 
$router->run();