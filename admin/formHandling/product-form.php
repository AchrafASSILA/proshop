<?php

require_once '../../classes/Product.class.php';
require_once '../../classes/FormValidation.class.php';



if (isset($_POST['submit'])) {
    // get all product data 
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price']);
    $stock = filter_var($_POST['stock'], FILTER_SANITIZE_NUMBER_INT);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    // get image data 
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_error = $_FILES['image']['error'];
    $image_size = $_FILES['image']['size'];
    $image_location_upload = './public/images/products/' . $image_name;
    $location = '..\..\public\images\products\\' . $image_name;
    // intanciated from product controller 
    $product = new Product();
    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($name, $price, $stock, $category, $description))) {
        header('Location: /proshop/admin/create-product.php?error=fill out all inputs');
        exit();
    }
    if ($validationObject->imageError($image_error)) {
        header('Location: /proshop/admin/create-product.php?error=image error');
        exit();
    }
    if ($validationObject->imageSize($image_size)) {
        header('Location: /proshop/admin/create-product.php?error=the size of image is too big');
        exit();
    }
    $product->createProduct($name, $price, $stock, $description, $category, $image_name, $image_tmp, $image_error, $image_size, $image_location_upload, $location);

    header('Location: /proshop/admin/create-product.php?succes=the product was inserted');
} else {
    header('Location: /proshop/admin/create-product.php');
}
