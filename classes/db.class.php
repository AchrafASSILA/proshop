<?php



class Db
{
    private $dsn = 'mysql:root=localhost;dbname=proshop';
    private $user = 'root';
    private $password = '';
    // private $dsn = 'mysql:host=sql201.epizy.com;dbname=epiz_31340851_proshop_db';
    // private $user = 'epiz_31340851';
    // private $password = 'ZRm3OSmDJuNyXKp';
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
