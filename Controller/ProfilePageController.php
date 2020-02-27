<?php


class ProfilePageController
{
    public function render(){
        $student = Student::withID(1);
        require 'View/profilePage.php';
    }
}