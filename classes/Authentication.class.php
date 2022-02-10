<?php


require_once __DIR__ . './db.class.php';



class Authentication extends Db
{
    // check if user alredy exists 
    public function getUser($username, $password = null)
    {
    }
}
