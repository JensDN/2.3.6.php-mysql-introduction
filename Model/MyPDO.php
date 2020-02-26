<?php



class MyPDO extends PDO {

    public function __construct($file = 'my_settings.ini') {
        // I use an ini-file with all my details for connecting with my MySql Server.
        if (!$settings = parse_ini_file($file, TRUE)) {
            throw new exception('Unable to open ' . $file . '.');// If the server can't reach my ini-file, it wil give this error.
        }
        // Below i create the dns-string with the parsed ini-file in the var $settings.
        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];
        // Below i used the parent class PDO to create my connection to mysql database. So i can use The MyPDO class for creating an connection.
        parent :: __construct($dns, $settings['database']['username'], $settings['database']['password']);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // This sets the  error-handling for MyPDO.
    }

}
