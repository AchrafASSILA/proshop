<?php
require_once '../../classes/Admin.class.php';
require_once '../../classes/FormValidation.class.php';



if (isset($_POST['submit'])) {
    // get data and filter it
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    // intanciated from form validation 
    $validationObject = new FormValidation();

    // run error handlings 
    if ($validationObject->emptyInputs(array($username, $password))) {
        header('Location: /proshop/admin/login.php?error=fill out all inputs');
        exit();
    }
    // get admin
    $obj = new Admin();
    $admin = $obj->getAdmin($username, $password);

    // check if there is admin with username and password 
    if ($admin) {
        $obj->createAdminSession($admin->username, $admin->id);
        header('Location: /proshop/admin/');
    } else {
        header('Location: /proshop/admin/login.php?error=username or password not correct');
        exit();
    }
} else {
    header('Location: ../login.php');
}

// session_start();
// $_SESSION['admin_username'] = 'a';
