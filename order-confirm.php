<?php



if (isset($_POST['submit'])) :
    session_start();
    require_once './autoload.classes.php';
    $order = new Order();
    $order->completeOrder($order->getOrder()->id);
    header('Location: /proshop/cart.php');

else :
    header('Location: /proshop/place-order.php');
endif;
