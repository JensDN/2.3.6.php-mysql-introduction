<?php
declare(strict_types=1);
require 'Model/MyPDO.php';
require 'Model/Student.php';
require 'Model/Table.php';
require 'Controller/HomePageController.php';
var_dump($_GET);
$instance = new Student;
$student = $instance::withID((int)$_GET['user']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Profile</h1><br>
<p>
    <?php echo $student->getFirstName()?>
</p><br>
<p>
    <?php echo $student->getLastName()?>
</p><br>
<p>
    <?php echo $student->getUsername()?>
</p><br>
<p>
    <?php echo $student->getLinkedin()?>
</p><br>
<p>
    <?php echo $student->getGithub()?>
</p><br>
<p>
    <?php echo $student->getEmail()?>
</p><br>
<p>
    <?php echo $student->getEmail()?>
</p>
<p>
    <?php echo $student->getAvatar()?>
</p><br>
<p>
    <?php echo $student->getVideo()?>
</p><br>
<p>
    <?php echo $student->getQuote()?>
</p><br>
<p>
    <?php echo $student->getQuoteAuthor()?>
</p><br>
<p>
    <?php echo $student->getCreatedAt()?>
</p><br>






</body>
</html>


