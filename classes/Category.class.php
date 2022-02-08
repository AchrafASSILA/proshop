<?php
require_once __DIR__ . './db.class.php';



class Category extends Db
{
    // create category
    public function createCategory($n, $d)
    {
        // created at 
        $created_at = date('y/m/d');
        $sql = 'INSERT INTO categories(name,description,created) VALUES(?,?,?) ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            $n,
            $d,
            $created_at
        ]);
    }
    // get all categories 
    public function getCategories()
    {
        $categories = '';
        $sql = 'SELECT * FROM categories';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $categories = $statement->fetchAll(PDO::FETCH_OBJ);
        return $categories;
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
    public function getCategoryById($id)
    {
        $categoryName = '';
        $sql = 'SELECT name FROM categories WHERE id = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$id]);
        $categoryName = $statement->fetch(PDO::FETCH_OBJ);
        return $categoryName;
    }
}
