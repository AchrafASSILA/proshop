<?php
require_once __DIR__ . './db.class.php';



class Shipping extends Db
{
    // get adress related to customer
    public function getShippingAdress($id)
    {
        $adress = '';
        if (isset($_SESSION['customer_id'])) {
            $customer_id = $_SESSION['customer_id'];
            $sql = 'SELECT * FROM shippingadress WHERE customer = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$customer_id]);
            $adress = $statement->fetchAll(PDO::FETCH_OBJ);
        }
        if ($id) {

            $sql = 'SELECT * FROM shippingadress WHERE customer = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$id]);
            $adress = $statement->fetchAll(PDO::FETCH_OBJ);
        }
        return $adress;
    }
    //create shipping adress if not exists
    // public function createShippingAdress()
    // {
    //     $adress = '';
    //     $customer_id = $_SESSION['customer_id'];
    //     $sql = 'SELECT * FROM shippingadress WHERE customer = ?';
    //     $statement = $this->connect()->prepare($sql);
    //     $statement->execute([$customer_id]);
    //     $adress = $statement->fetchAll(PDO::FETCH_OBJ);
    //     return $customer_id;
    // }

}
