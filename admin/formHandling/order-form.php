<?php

require '../../classes/db.class.php';
if (isset($_POST['increment'])) {
    $current_quantity = filter_var($_POST['product_quantity'], FILTER_SANITIZE_NUMBER_INT);
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    $db = new Db();
    $sql = ' UPDATE orderitems SET quantity = ? WHERE product = ?';
    $statement = $db->connect()->prepare($sql);
    $statement->execute([$current_quantity += 1, $current_product]);
} elseif (isset($_POST['decrement'])) {
    $current_quantity = filter_var($_POST['product_quantity'], FILTER_SANITIZE_NUMBER_INT);
    $current_product = filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
    $db = new Db();
    $sql = ' UPDATE orderitems SET quantity = ? WHERE product = ?';
    $statement = $db->connect()->prepare($sql);
    $statement->execute([$current_quantity -= 1, $current_product]);
} else {
    header('Location: /proshop/cart.php');
}
