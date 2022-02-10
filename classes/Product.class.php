<?php



require_once __DIR__ . './db.class.php';



class Product extends Db
{
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

    // update product 
    public function updateProduct($name, $price, $stock, $description, $category, $image_name, $image_tmp, $image_error, $image_size, $image_location_upload, $location, $id)
    {
        // modified at 
        $modified_at = date('y/m/d');
        move_uploaded_file($image_tmp, $location);
        if ($image_name) {
            $sql = 'UPDATE products SET name = ? ,description=?,price=?,image=?,stock=?,category=?,modified_at=? WHERE id = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([
                $name,
                $description,
                $price,
                $image_location_upload,
                $stock,
                $category,
                $modified_at,
                $id
            ]);
        } else {
            $sql = 'UPDATE products SET name = ? ,description=?,price=?,stock=?,category=?,modified_at=? WHERE id = ?';
            $statement = $this->connect()->prepare($sql);
            $statement->execute([
                $name,
                $description,
                $price,
                $stock,
                $category,
                $modified_at,
                $id
            ]);
        }
    }

    // delete product 
    public function deleteProduct($id)
    {
        $sql = 'DELETE FROM products WHERE id = ?';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([$id]);
    }
}
