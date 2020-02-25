<?php
declare(strict_types=1);

class Student
{
    private int $id;
    private string $first_name;
    private string $last_name;
    private string $username;
    private string $linkedin;
    private string $github;
    private string $email;
    private string $language;
    private string $avatar;
    private string $video;
    private string $quote;
    private string $quote_author;
    private string $created_at;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->last_name;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getLinkedin(): string
    {
        return $this->linkedin;
    }

    /**
     * @return string
     */
    public function getGithub(): string
    {
        return $this->github;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @return string
     */
    public function getVideo(): string
    {
        return $this->video;
    }

    /**
     * @return string
     */
    public function getQuote(): string
    {
        return $this->quote;
    }

    /**
     * @return string
     */
    public function getQuoteAuthor(): string
    {
        return $this->quote_author;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    public function prepareQuery (): array
    {
        // i little prepare query function, not really necessary.
        return Array (
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'email'=> $this->email,
            'preferred_language' => $this->language);
    }

    public function getData(int $id){
        $link = new MyPDO;
        if($link === false){
            die('ERROR: Could not connect. ');
        }
        // select a particular user by id
        $stmt = $link->prepare('SELECT * FROM student WHERE id=?');
        try {
            $stmt->execute([$id]);

        }
        catch(PDOException $e)
        {
            echo $stmt . '<br>' . $e->getMessage();
        }
        return $stmt->fetch();
    }
    public function postData(): void
    {
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

    public static function withID( int $id ): \Student
    {
        $instance = new self();
        $instance->loadByID( $id );
        return $instance;
    }
    protected function fill( array $row ): void
    {// fill all properties from array
        $this->id = (int) $row['id'];
       $this->first_name = $row['first_name']?? 'unknown';
       $this->last_name = $row['last_name']?? ' unknown';
       $this->username = $row['username']?? 'unknown';
       $this->linkedin = $row['linkedin']?? 'unknown';
       $this->github = $row['github']?? 'unknown';
       $this->email = $row['email']?? 'unknown';
       $this->language = $row['preferred_language']?? 'unknown';
       $this->avatar = $row['avatar']?? 'unknown';
       $this->video = $row['video']?? 'unknown';
       $this->quote = $row['quote']?? 'unknown';
       $this->quote_author = $row['quote_author']?? 'unknown';
       $this->created_at = $row['created_at']?? 'unknown';

    }
    protected function loadByID( $id ): void
    {
        // do query
        $row = $this->getData($id);
        var_dump($row);
        $this->fill($row);
    }
    public static function withRow( array $row ): \Student
    {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }

}