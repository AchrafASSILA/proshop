<?php


require_once __DIR__ . './db.class.php';



class Authentication extends Db
{
    // check if user alredy exists 
    public function getCustomer($username, $password = null)
    {

        $customer = '';
        if ($password  == null) {
            $sql = 'SELECT * FROM customers WHERE username = ? ';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$username]);
        }
        $customer = $statement->fetch(PDO::FETCH_OBJ);
        return $customer;
    }
    // get customer 
    public function getSingleCustomer($id)
    {
        $customer = '';
        $sql = 'SELECT * FROM customers WHERE id = ? ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$id]);
        $customer = $statement->fetch(PDO::FETCH_OBJ);
        return $customer;
    }

    // create customer 
    public function createCustomer($first_name, $last_name, $username, $password, $tel)
    {
        // hashing password 
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // created at 
        $created_at = date('y/m/d');

        $sql = 'INSERT INTO customers(first_name,last_name,username,password,created_at,tel) VALUES(?,?,?,?,?,?)';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            $first_name,
            $last_name,
            $username,
            $hashed_password,
            $created_at,
            $tel
        ]);
    }

    public function createCustomerSession($customer)
    {
        session_start();
        $_SESSION['customer_username'] = $customer->username;
        $_SESSION['customer_id'] = $customer->id;
    }

    public function destroyCustomerSession()
    {
        session_start();
        unset($_SESSION['customer_username']);
        unset($_SESSION['customer_id']);
    }
}
