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
    private string $gender;
    private string $password;

    public static function withRow( array $row ): \Student
    {
        $instance = new self();
        $instance->fill( $row );
        return $instance;
    }
    public static function withID( int $id ): \Student
    {
        $instance = new self();
        $instance->loadByID( $id );
        return $instance;
    }
    protected function fill( array $row ): void
    {// fill all properties from array

        $this->first_name = htmlspecialchars($row['first_name'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->last_name = htmlspecialchars($row['last_name'], ENT_QUOTES, 'UTF-8')?? ' unknown';
        $this->username = htmlspecialchars($row['username'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->linkedin = htmlspecialchars($row['linkedin'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->github = htmlspecialchars($row['github'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->email = htmlspecialchars($row['email'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->language = htmlspecialchars($row['preferred_language'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->gender = htmlspecialchars($row['gender'], ENT_QUOTES, 'UTF-8') ?? 'm';
        $this->avatar = htmlspecialchars($row['avatar'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->video = htmlspecialchars($row['video'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->quote = htmlspecialchars($row['quote'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->quote_author = htmlspecialchars($row['quote_author'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->created_at = htmlspecialchars($row['created_at'], ENT_QUOTES, 'UTF-8')?? 'unknown';
        $this->password = htmlspecialchars($row['password'], ENT_QUOTES, 'UTF-8')?? 'unknown';

    }


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
            'password' => $this->password,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'email'=> $this->email,
            'language' => $this->language,
            'gender'=> $this->gender);
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
        $stmt = $link->prepare('INSERT INTO student (first_name, last_name, username, password, linkedin, github, email, language, gender) VALUES
            (:first_name, :last_name, :username, :password, :linkedin, :github, :email, :language, :gender)');
        try {
            $stmt->execute($this->prepareQuery());
            echo 'Connect Successfully. Yes Baby';


        }
        catch(PDOException $e)
        {
            echo var_dump($stmt) . '<br>' . $e->getMessage();
        }
        $link = null;

    }

    private function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'APIKEY: 111111111111111111111',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        header('Content-type: image/jpeg');
        curl_close($curl);
        return $result;
    }
    public function callAPIBeLikeBill()
    {
        $url = 'https://belikebill.ga/billgen-API.php?default=1&name='.$this->first_name.'&sex='.$this->gender;
        return $this->callAPI('POST', $url ,false);
    }
    protected function loadByID( $id ): void
    {
        // do query
        $row = $this->getData($id);
        var_dump($row);
        $this->fill($row);
    }

}