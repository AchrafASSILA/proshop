<?php


require_once __DIR__ . './db.class.php';
class Order extends Db
{
    // select orderitems.order_id  ,orderitems.quantity, products.name from orderitems inner join orders on orders.id = orderitems.order_id AND orders.customer = 2 inner join products on products.id = orderitems.product;

    // get none completed order related to customer 
    public function getOrder()
    {
        $order = [];
        if (isset($_SESSION['customer_id'])) {
            $customer = $_SESSION['customer_id'];
            $sql = 'SELECT * FROM orders WHERE complete = ? and customer = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([0, $customer]);
            $order = $statement->fetch(PDO::FETCH_OBJ);
        }
        return $order;
    }

    // create order if not exists 
    public function createOrder()
    {
        if (isset($_SESSION['customer_id'])) {
            $customer = filter_var($_SESSION['customer_id']);
            $sql = "INSERT INTO orders(customer,date_ordered) VALUES(?,?)";
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$customer, 'y/d/m']);
        }
    }

    // get order items related to customer 
    public function getOrderItems()
    {
        $order_items = [];
        if (isset($_SESSION['customer_id'])) {
            $customer_id = $_SESSION['customer_id'];
            $sql = 'SELECT product , quantity FROM orderitems INNER JOIN orders ON orders.id = order_id WHERE orders.complete = ? AND customer = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([0, $customer_id]);
            $order_items = $statement->fetchAll(PDO::FETCH_OBJ);
        }
        return $order_items;
    }

    // increment product quantity 
    public function incrementProductQuantity($current_quantity, $current_product)
    {
        $current_quantity += 1;
        $sql = 'UPDATE orderitems SET quantity = ? WHERE product = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$current_quantity, $current_product]);
    }


    // increment product quantity 
    public function decrementProductQuantity($current_quantity, $current_product)
    {
        if ($current_quantity == 1) {
            $sql = ' DELETE FROM orderitems WHERE product = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$current_product]);
        } else {
            $current_quantity -= 1;
            $sql = 'UPDATE orderitems SET quantity = ? WHERE product = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$current_quantity, $current_product]);
        }
    }
    // remove from order items 
    public function removeFromCart($current_product)
    {
        $sql = 'DELETE FROM orderitems WHERE product = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$current_product]);
    }

    // add product to order items
    public function addProductToOrderItems($current_product, $order)
    {
        $sql = 'INSERT INTO orderitems(product,order_id,quantity,date_added) VALUES(?,?,?,?)';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$current_product, $order->id, 1, 'y/m/d']);
    }

    // get complete and delevred and payed orders 
    public function getCompletePayedOrders()
    {
        $month = [];
        $ordersNumber = [];
        $sql = 'SELECT MONTHNAME(date_ordered) month , count(id) orders FROM orders WHERE complete = 1 GROUP BY month';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([]);
        $orders = $statement->fetchAll(PDO::FETCH_OBJ);
        foreach ($orders as $order) {
            array_push($month, $order->month);
            array_push($ordersNumber, $order->orders);
        }
        return [json_encode($month), json_encode($ordersNumber)];
    }
}
