<?php

require_once __DIR__ . './db.class.php';



class CategoryContr extends Db
{
    private $name;
    private $description;

    // constructor 
    public function __construct($n,  $d)
    {
        $this->name = $n;
        $this->description = $d;
    }
    // create product
    public function createCategory()
    {
        // created at 
        $created_at = date('y/m/d');
        $sql = 'INSERT INTO categories(name,description,created) VALUES(?,?,?) ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            $this->name,
            $this->description,
            $created_at
        ]);
    }
}
