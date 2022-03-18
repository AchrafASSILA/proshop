<?php
require_once '../../classes/Shipping.class.php';
require_once '../../classes/Order.class.php';
require_once '../../classes/FormValidation.class.php';
if (isset($_POST['createAdress'])) {
    // get data 
    $adress = $_POST['adress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipcode = $_POST['zipcode'];
    // intanciated from form shipping 
    $shippingObj = new Shipping();
    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($adress, $city, $state, $zipcode))) {
        header('Location: /proshop/create-adress.php?error=fill out all inputs');
        exit();
    }
    $orderObj = new Order();
    $order = $orderObj->getOrder();
    $shippingObj->createShippingAdress($adress,  $city, $state, $zipcode, $order->id);
    header('Location: /proshop/place-order.php');
} else {
    header('Location: /proshop/cart.php');
}
