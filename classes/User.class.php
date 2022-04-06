<?php




require_once __DIR__ . './db.class.php';



class User extends Db
{
    // get user 
    public function getUser()
    {
        $user = '';
        $customer_id = $_SESSION['customer_id'];
        $sql = 'SELECT * FROM customers WHERE id = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$customer_id]);
        $user = $statement->fetchAll(PDO::FETCH_OBJ);
        return $user;
    }
    //edit user 
    public function editUser($first_name, $last_name, $tel)
    {
        session_start();
        $customer_id = $_SESSION['customer_id'];
        $sql = 'UPDATE customers SET first_name = ?, last_name = ? , tel = ?  WHERE  id = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$first_name, $last_name, $tel, $customer_id]);
    }
}
