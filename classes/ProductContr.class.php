<?php



require_once __DIR__ . './db.class.php';



class ProductContr extends Db
{
    private $name;
    private $price;
    private $stock;
    private $description;
    private $category;
    private $image_name;
    private $image_tmp;
    private $image_error;
    private $image_size;
    private $image_location_upload;

    // constructor 
    public function __construct($n, $p, $s, $d, $c, $in, $it, $ie, $is, $ilu)
    {
        $this->name = $n;
        $this->price = $p;
        $this->stock = $s;
        $this->description = $d;
        $this->category = $c;
        $this->image_name = $in;
        $this->image_tmp = $it;
        $this->image_error = $ie;
        $this->image_size = $is;
        $this->image_location_upload = $ilu;
    }
    // form validations
    public function emptyInputs()
    {
        if (empty($this->name) || empty($this->price) || empty($this->stock) || empty($this->description) || empty($this->category)) {
            return true;
        }
    }
    public function imageError()
    {
        if ($this->image_error !== 0) {
            return true;
        }
    }
    public function imageSize()
    {
        if ($this->image_size > 500000) {
            return true;
        }
    }
    // create product
    public function createProduct()
    {
        // created at 
        $created_at = date('d M Y H:i:s');
        $move_to_file = '../public/images/products/' . $this->image_name;
        // move_uploaded_file($this->image_tmp, $this->);
        $sql = 'INSERT INTO products(name,description,price,image,stock,category,created_at) VALUES(?,?,?,?,?,?,?) ';
        $statement = $this->connect()->prepare($sql);
        $statement->execute([
            $this->name,
            $this->description,
            $this->price,
            $this->image_location_upload,
            $this->stock,
            $this->category,
            $created_at
        ]);
        return true;
    }
}
