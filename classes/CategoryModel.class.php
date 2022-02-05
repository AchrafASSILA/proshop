<?php
require_once basename(__DIR__) . '/db.class.php';



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
}
