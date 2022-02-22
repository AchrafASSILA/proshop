<?php


require_once __DIR__ . './db.class.php';

class Order extends Db
{
    // select orderitems.order_id  ,orderitems.quantity, products.name from orderitems inner join orders on orders.id = orderitems.order_id AND orders.customer = 2 inner join products on products.id = orderitems.product;

    // get none completed order related to customer 
    public function getOrder()
    {
        $order = '';
        $customer = filter_var($_SESSION['customer_id']);
        $sql = 'SELECT * FROM orders WHERE complete = ? and customer = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([0, $customer]);
        $order = $statement->fetch(PDO::FETCH_OBJ);
        return $order;
    }

    // create order if not exists 
    public function createOrder()
    {
        $customer = filter_var($_SESSION['customer_id']);
        $sql = "INSERT INTO orders(customer,date_ordered) VALUES(?,?)";
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$customer, 'y/d/m']);
    }

    // get order items related to customer 
    public function getOrderItems()
    {
        $customer_id = $_SESSION['customer_id'];
        $order_items = '';
        $sql = 'SELECT product , quantity FROM orderitems INNER JOIN orders ON orders.id = order_id WHERE orders.complete = ? AND customer = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([0, $customer_id]);
        $order_items = $statement->fetchAll(PDO::FETCH_OBJ);
        return $order_items;
    }
}
