<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './autoload.class.php' ?>
    <!-- check if there valid id in adresse libk  -->
    <?php
    // if (!isset($_GET['id']) || empty($_GET['id'])) header('Location: ./index.php')
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // instanciated 
    $obj = new Product();

    // get product 
    $product = $obj->getSingleProduct($id);

    // check if the product in db 
    if ($product) {
        $obj->deleteProduct($id);
        header('Location: ./prodcuts.php');
    } else {
        header('Location: ./products.php');
    }
    ?>
<?php else :
    header('Location: ./login.php');
endif; ?>