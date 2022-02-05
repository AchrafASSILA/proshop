<?php



require_once __DIR__ . './ProductModel.class.php';



class ProductView extends ProductModyl
{
    public function getAllProducts()
    {
        return $this->getProducts();
    }
}
