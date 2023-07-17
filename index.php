<?php

require "models/User.php";
require "managers/UserManager.php";

$dbName = "laurelineagabibrac_apisimple";
$port = "3306";
$host = "db.3wa.io";
$username = "laurelineagabibrac";
$password = "c8b4d35a0077655c5f327ec2af4c0eac";

$manager = new UserManager($dbName, $port, $host, $username, $password);

require "controllers/UserController.php";
$controller = new UserController($manager);


require "services/Router.php";
$router = new Router($controller);
$router->checkRoute($_GET['route']);

?>