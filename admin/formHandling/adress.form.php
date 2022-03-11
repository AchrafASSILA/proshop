<?php

if (isset($_POST['createAdress'])) {
    print_r($_POST);
} else {
    header('Location: /proshop/cart.php');
}
