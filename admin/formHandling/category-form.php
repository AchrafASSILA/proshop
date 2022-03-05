<?php

require_once '../../classes/Category.class.php';
require_once '../../classes/FormValidation.class.php';



if (isset($_POST['submit'])) {
    // get all category data 
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    // intanciated from category controller 
    $category = new Category();
    // intanciated from form validation 
    $validationObject = new FormValidation();
    // run error handlings 
    if ($validationObject->emptyInputs(array($name, $description))) {
        header('Location: /proshop/admin/create-category.php?error=fill out all inputs');
        exit();
    }

    $category->createCategory($name, $description);

    header('Location: /proshop/admin/create-category.php?succes=the category was inserted');
} else if (isset($_POST['edit'])) {
    echo 'hdhd';
} else {
    header('Location: /proshop/admin/create-category.php');
}
