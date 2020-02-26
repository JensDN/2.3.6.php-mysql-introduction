<?php
declare(strict_types=1);
require 'Model/MyPDO.php';
require 'Model/Student.php';
require 'Model/Table.php';
require 'Controller/HomePageController.php';
$controller = new HomePageController;
$controller->renderInsert();
$controller->postForm();
$controller->createTable();





