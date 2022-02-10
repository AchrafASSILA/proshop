<?php require_once './autoload.class.php' ?>
<!-- check if there valid id in adresse libk  -->
<?php if (!isset($_GET['id']) || empty($_GET['id'])) header('Location: ./index.php') ?>
<?php
$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

// instanciated 
$obj = new Product();

// get product 
$product = $obj->getSingleProduct($id);

// check if the product in db 
if ($product) {
    $obj->deleteProduct($id);
    header('Location: ./index.php');
} else {
    header('Location: ./index.php');
}
