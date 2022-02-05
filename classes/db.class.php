<?php



class Db
{
    private $dsn = 'mysql:root=localhost;dbname=proshop';
    private $user = 'root';
    private $password = '';
    public function connect()
    {
        try {
            $db = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $db;
    }
}
