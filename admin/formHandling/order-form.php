<?php


require_once '../../classes/Order.class.php';
session_start();
if (isset($_POST['increment'])) {
    // get data 
    $current_quantity = filter_var($_POST['product_quantity'], FILTER_SANITIZE_NUMBER_INT);
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);

    // instanciated from order order class 
    $obj = new Order();
    $obj->incrementProductQuantity($current_quantity, $current_product);

    // redirect 
    header('Location: /proshop/cart.php');
} else if (isset($_POST['decrement'])) {
    $current_quantity = filter_var($_POST['product_quantity'], FILTER_SANITIZE_NUMBER_INT);
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    // instanciated from order order class 
    $obj = new Order();
    $obj->decrementProductQuantity($current_quantity, $current_product);

    // redirect 
    header('Location: /proshop/cart.php');
} else if (isset($_POST['remove'])) {
    // get data 
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    // instanciated from order order class 
    $obj = new Order();
    $obj->removeFromCart($current_product);

    // redirect 
    header('Location: /proshop/cart.php');
} else if (isset($_POST['add'])) {
    // get data 
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    // instanciated from order order class 
    if (isset($_SESSION['customer_id'])) {
        $obj = new Order();
        $order = $obj->getOrder();
        // check if there is an order 
        if ($order) {
            $obj->addProductToOrderItems($current_product, $order);
        } else {
            $order = $obj->createOrder();
            $order = $obj->getOrder();
            $obj->addProductToOrderItems($current_product, $order);
        }
        header('Location: /proshop/cart.php');
    } else {
        header('Location: /proshop/login.php');
    }
    // header('Location: /proshop/cart.php');
} else {
    header('Location: /proshop/cart.php');
}
