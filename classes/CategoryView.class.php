<?php






require_once basename(__DIR__) . '/CategoryModel.class.php';


class CategoryView extends CategoryModyl
{

    public function getAllCategories()
    {
        return $this->getCategories();
    }
}
