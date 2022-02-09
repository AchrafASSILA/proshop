<?php



require_once __DIR__ . './db.class.php';



class Product extends Db
{

    // private $name;
    // private $price;
    // private $stock;
    // private $description;
    // private $category;
    // private $image_name;
    // private $image_tmp;
    // private $image_error;
    // private $image_size;
    // private $image_location_upload;
    // private $location;
    // // constructor 
    // public function __construct($n, $p, $s, $d, $c, $in, $it, $ie, $is, $ilu, $l)
    // {
    //     $this->name = $n;
    //     $this->price = $p;
    //     $this->stock = $s;
    //     $this->description = $d;
    //     $this->category = $c;
    //     $this->image_name = $in;
    //     $this->image_tmp = $it;
    //     $this->image_error = $ie;
    //     $this->image_size = $is;
    //     $this->image_location_upload = $ilu;
    //     $this->location = $l;
    // }
    // create product
    public function createProduct($n, $p, $s, $d, $c, $in, $it, $ie, $is, $ilu, $l)
    {
        // created at 
        $created_at = date('y/m/d');
        move_uploaded_file($it, $l);
        $sql = 'INSERT INTO products(name,description,price,image,stock,category,created_at) VALUES(?,?,?,?,?,?,?) ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            $n,
            $d,
            $p,
            $ilu,
            $s,
            $c,
            $created_at
        ]);
    }
    // get all products 
    public function getProducts($category)
    {
        $products = '';
        if ($category) {
            $sql = "SELECT * FROM products WHERE category = ?";
            $statement = $this->connect()->prepare($sql);
            $statement->execute([$category]);
        } else {
            $sql = 'SELECT * FROM products';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([]);
        }
        $products = $statement->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    // get single product 
    public function getSingleProduct($id)
    {
        $product = '';
        $sql = 'SELECT * FROM products WHERE id = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$id]);
        $product = $statement->fetch(PDO::FETCH_OBJ);
        return $product;
    }
}
