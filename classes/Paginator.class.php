<?php

require_once __DIR__ . './db.class.php';


class Paginator extends Db
{
    public $pages;
    public $products;
    public $number_of_products_per_page;
    public $page;
    public $start_from;
    public $prd;

    // constructor 
    public function __construct($p, $nop)
    {
        $this->products = $p;
        $this->number_of_products_per_page = $nop;
        $this->pages = ceil(count($this->products) / $this->number_of_products_per_page);
    }

    // get products per page 
    public function getProductPerPage()
    {
        $prd = array('a' => 'a');
        if (!isset($_GET['page'])) {
            $this->page = 1;
        } else {
            $this->page = filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
        }
        $this->start_from = ($this->page - 1) * $this->number_of_products_per_page;
        $prod = '';
        $sql = "SELECT * FROM products  LIMIT $this->start_from ,$this->number_of_products_per_page";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $prd = $statement->fetchAll(PDO::FETCH_OBJ);
        return $prd;
    }
}
