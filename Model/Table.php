<?php


class Table
{
    public function postStudentTable (){
        $link = new MyPDO;
        // Check connection
        if($link === false){
            die('ERROR: Could not connect. ');
        }
        // select all the users from my student table.
        $table = $link->query('SELECT * FROM student')->fetchAll();
        // this wil give us an $table object that can be uses to fetch actual rows. we want all the rows, so thats why the helper method fetchALL.
        echo '<table>';
        echo '<tr>';
        echo '<th>First Name</th>';
        echo '<th>Last Name</th>';
        echo '<th>Username</th>';
        echo '<th>Linkedin</th>';
        echo '<th>Github</th>';
        echo '<th>Email</th>';
        echo '<th>Language</th>';
        echo '</tr>';
        foreach ($table as $row){
            echo '<tr>';
            echo '<td>' . $row['first_name'] . '</td>';
            echo '<td>' . $row['last_name'] . '</td>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['linkedin'] . '</td>';
            echo '<td>' . $row['github'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['preferred_language'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        $link = null;

    }
}