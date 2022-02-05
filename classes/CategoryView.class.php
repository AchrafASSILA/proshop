<?php






require_once __DIR__ . './CategoryModel.class.php';

class CategoryView extends CategoryModyl
{

    public function getAllCategories()
    {
        return $this->getCategories();
    }
}
