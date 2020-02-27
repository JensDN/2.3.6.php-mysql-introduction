<?php
declare(strict_types=1);
require 'Model/MyPDO.php';
require 'Model/Student.php';
require 'Model/Table.php';
require 'Controller/HomePageController.php';
require 'Controller/LoginPageController.php';
require 'Controller/RegisterPageController.php';
require 'Controller/ProfilePageController.php';
session_start();

//if(!isset($_SESSION['login'])) {
if (isset($_GET['page']) && $_GET['page'] === 'register'){
    $controller = new RegisterPageController;
    $controller->register();
} elseif (isset($_GET['page']) && $_GET['page'] === 'login'){
    $controller = new LoginPageController;
} elseif (isset($_GET['page']) && $_GET['page'] === 'profile'){
    $controller = new ProfilePageController;
} elseif (isset($_GET)  || $_GET['page'] === 'homepage'){
    $controller = new HomePageController;
}
$controller->render();

