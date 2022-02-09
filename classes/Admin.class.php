<?php


require_once __DIR__ . './db.class.php';


class Admin extends Db
{
    public function getAdmin($username, $password)
    {
        $admin = '';
        $sql = 'SELECT * FROM admin WHERE username = ? AND password = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$username, $password]);
        $admin = $statement->fetch(PDO::FETCH_OBJ);
        return $admin;
    }
    public function createAdminSession($username, $adminId)
    {
        session_start();
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_id'] = $adminId;
    }
}
