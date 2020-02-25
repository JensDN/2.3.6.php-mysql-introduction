<?php
declare(strict_types=1);

class Student
{
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $linkedin;
    private string $github;
    private string $email;
    private string $language;
    public function prepareQuery (){
        // i little prepare query function, not really necessary.
        return ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'username' => $this->username, 'linkedin' => $this->linkedin, 'github' => $this->github, 'email'=>$this->email, 'preferred_language' => $this->language];
    }

    public function postData(){
        $link = new MyPDO;
        // Check connection
        if($link === false){
            die('ERROR: Could not connect. ');
        }
        // Print host information
        $stmt = $link->prepare('INSERT INTO student (first_name, last_name, username, linkedin, github, email, preferred_language) VALUES
            (:first_name, :last_name, :username, :linkedin, :github, :email, :preferred_language)');
        try {
            $stmt->execute($this->prepareQuery());
            echo 'Connect Successfully. Yes Baby';


        }
        catch(PDOException $e)
        {
            echo $stmt . '<br>' . $e->getMessage();
        }
        $link = null;

    }
    public function __construct(string $first_name, string $last_name, string $username, string $linkedin, string $github, string $email, string $preferred_language)
    {
        $this-> first_name = $first_name;
        $this-> last_name =  $last_name;
        $this-> username = $username;
        $this-> linkedin = $linkedin;
        $this-> github = $github;
        $this-> email = $email;
        $this-> language = $preferred_language;
    }
}