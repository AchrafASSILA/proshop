<?php
require_once '../../classes/User.class.php';
require_once '../../classes/FormValidation.class.php';
if (isset($_POST['editAccount'])) {
    // get data 
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $tel = $_POST['tel'];

    // intanciated from user 
    $user = new User();
    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($first_name, $last_name, $tel))) {
        header('Location: /proshop/account.php?error=fill out all inputs');
        exit();
    }
    $user->editUser($first_name, $last_name, $tel);
    header('Location: /proshop/account.php');
} else {
    header('Location: /proshop/account.php');
}
