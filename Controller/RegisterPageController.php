<?php


class RegisterPageController
{
    private $greatSucces = false;
    public function register (){
        //Below i use $_POST to fill my Student __constructor/properties, and to post my form to mySQL Database.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['becode_student_first_name']) {
                $this->student = Student::withRow(Array (
                    'first_name' => $_POST['becode_student_first_name'],
                    'last_name' => $_POST['becode_student_last_name'],
                    'username' => $_POST['becode_student_username'],
                    'linkedin' => $_POST['becode_student_linkedin'],
                    'github' => $_POST['becode_student_github'],
                    'email'=>$_POST['becode_student_email'],
                    'preferred_language' => $_POST['becode_student/**/_language'],
                    'gender' => $_POST['becode_student_gender'],
                    'password' => $_POST['becode_student_password']));
            }
            if (isset($this->student)) {
                $this->student->postData(); // This will perform the post of the student properties to the MySQL Database.
                $this->greatSucces = true;
            }
        }

    }
    public function render(){
        if (!$this->greatSucces){
            require 'View/registerPage.php';
        } else {
            require 'View/succes.php';
        }
    }
}