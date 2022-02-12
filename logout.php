<?php

require_once './classes/Authentication.class.php';


$obj = new Authentication();
$obj->destroyCustomerSession();
header('Location: /proshop/login.php');
exit();
