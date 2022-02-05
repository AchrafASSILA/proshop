<?php
require_once __DIR__ . './db.class.php';



class CategoryModyl extends Db
{
    private $categories;
    public function getCategories()
    {
        $sql = 'SELECT * FROM categories';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $this->categories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $this->categories;
    }
    public function getCategoryByName($name)
    {
        $categoryId = '';
        $sql = 'SELECT id FROM categories WHERE name = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$name]);
        $categoryId = $statement->fetch(PDO::FETCH_OBJ);
        return $categoryId;
    }
}
