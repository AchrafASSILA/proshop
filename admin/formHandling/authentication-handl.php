<?php

require_once '../../classes/FormValidation.class.php';


if (isset($_POST['register'])) {
    // get data 
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST['password2'], FILTER_SANITIZE_STRING);

    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($first_name, $last_name, $username, $password, $password2))) {
        header('Location: /proshop/register.php?error=fill out all inputs');
        exit();
    }
    if ($validationObject->invalidUsername($username)) {
        header('Location: /proshop/register.php?error=enter a valid username');
        exit();
    }
    if ($validationObject->passwrodNotMatch($password, $password2)) {
        header('Location: /proshop/register.php?error=password not match');
        exit();
    }
} elseif (isset($_POST['login'])) {
    //get date 
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($username, $password))) {
        header('Location: /proshop/login.php?error=fill out all inputs');
        exit();
    }
    if ($validationObject->invalidUsername($username)) {
        header('Location: /proshop/login.php?error=enter a valid username');
        exit();
    }
} else {
    header('Location: /proshop/register.php');
}
