<?php


require_once './autoload.classes.php';
$db = new Db();
$sql = "select  * from products where name like '%" . $_POST['name']  . "%'";
$statement = $db->connect()->prepare($sql);
$statement->execute([]);
$products = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!-- instanciate order  -->
<?php $order = new Order() ?>
<!-- get all order items  -->
<?php $order_items = json_decode(json_encode($order->getOrderItems()), true) ?>
<main class="col-md-9" id="product_row" style="max-width: 100%;">

    <header class="border-bottom mb-4 pb-3">
        <div class="form-inline">
            <span class="mr-md-auto" id="count"><?php echo count($products) ?> Items found </span>

        </div>
    </header><!-- sect-heading -->

    <div class="row" id="">
        <?php foreach ($products as $product) : ?>
            <div class="col-md-4">
                <figure class="card card-product-grid">
                    <div class="img-wrap">

                        <img src="<?php echo $product->image ?>" alt="image">

                    </div> <!-- img-wrap.// -->
                    <figcaption class="info-wrap">
                        <div class="fix-height">
                            <a href="./single-product.php?id=<?= $product->id ?>" class="title"><?= $product->name ?></a>
                            <div class="price-wrap mt-2">
                                <span class="price">$<?= $product->price ?></span>
                                <del class="price-old">$80</del>
                            </div> <!-- price-wrap.// -->
                        </div>
                        <?php if (in_array($product->id, array_column($order_items, 'product'))) : ?>
                            <button class="btn btn-block btn-success" onclick="alert('product already add')">Added to cart </button>
                        <?php else : ?>
                            <form action="./admin/formHandling/order-form.php" method="post">
                                <input type="hidden" name="product_id" value="<?= $product->id ?>">
                                <button type="submit" name="add" class="btn btn-block btn-primary"> Add to cart</button>
                            </form>
                        <?php endif; ?>
                    </figcaption>
                </figure>
            </div> <!-- col.// -->
        <?php endforeach; ?>
    </div> <!-- row end.// -->




</main> <!-- col.// -->