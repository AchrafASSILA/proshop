<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './autoload.class.php' ?>
    <!-- check if there valid id in adresse libk  -->
    <?php
    // if (!isset($_GET['id']) || empty($_GET['id'])) header('Location: ./index.php')
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // instanciated 
    $obj = new Category();

    // get product 
    $category = $obj->getCategoryById($id);

    // check if the product in db 
    if ($category) {
        $obj->deleteCategory($id);
        header('Location: ./categories.php');
    } else {
        header('Location: ./categories.php');
    } ?>
<?php else :
    header('Location: ./login.php');
endif; ?>