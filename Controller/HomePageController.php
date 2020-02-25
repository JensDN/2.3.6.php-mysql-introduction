<?php


class HomePageController
{
    private object $student;
    public function createTable(){
            $studentTable = new Table;
            $studentTable->postStudentTable();
    }
    public function postForm (){
        //Below i use $_POST to fill my Student __constructor/properties, and to post my form to mySQL Database.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['becode_student_first_name']) {
                $this->student = new Student ($_POST['becode_student_first_name'], $_POST['becode_student_last_name'], $_POST['becode_student_username'], $_POST['becode_student_linkedin'], $_POST['becode_student_github'], $_POST['becode_student_email'], $_POST['becode_student_preferred_language']);
            }
            if (isset($this->student)) {
                $this->student->postData(); // This will perform the post of the student properties to the MySQL Database.
            }
        }

    }
    public function render(){
        require 'View/homepage.php';
    }
}