<?php

require_once __DIR__ . './db.class.php';


class Paginator extends Db
{
    public $pages;
    public $table;
    public $number_of_objects_per_page;
    public $page;
    public $start_from;
    public $objects;

    // constructor 
    public function __construct($table, $number_of_objects_per_page)
    {
        $this->table = $table;
        $this->number_of_objects_per_page = $number_of_objects_per_page;
        $this->getObjects();
        $this->pages = ceil(count($this->getCountObject()) / $this->number_of_objects_per_page);
    }
    public function getCountObject()
    {
        $objects = [];
        $sql = "SELECT * FROM " . $this->table;
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $objects = $statement->fetchAll(PDO::FETCH_OBJ);
        return $objects;
    }

    // get objects 
    public function getObjects()
    {
        if (!isset($_GET['page'])) {
            $this->page = 1;
        } else {
            $this->page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
        }
        $this->start_from = ($this->page - 1) * $this->number_of_objects_per_page;
        $this->objects = [];
        $sql = "SELECT * FROM " . $this->table . "  LIMIT $this->start_from ,$this->number_of_objects_per_page ";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $objects = $statement->fetchAll(PDO::FETCH_OBJ);
        return $objects;
    }
}
