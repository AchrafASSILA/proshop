<?php



require_once __DIR__ . './db.class.php';



class ProductModyl extends Db
{
    public function getProducts()
    {
        $products = '';
        $sql = 'SELECT * FROM products ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $products = $statement->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    public function getProductsByCategory($category)
    {
        $products = '';
        $sql = 'SELECT * FROM products WHERE category = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$category]);
        $products = $statement->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
