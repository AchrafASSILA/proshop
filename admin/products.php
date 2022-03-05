<?php require_once './includes/header.php' ?>
<?php require_once './autoload.class.php' ?>
<!-- get products  -->
<?php $prod = new Product() ?>
<?php $products = $prod->getProducts(null) ?>
<!-- instanciate from category view -->
<?php $cat = new Category(); ?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Products Table</h4>
            <p class="card-description">
                <a style="display: flex;justify-content: end;font-weight: 600;font-size:20px;" class="nav-link" href="./create-product.php">Add Product</a>

            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Image
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Stock
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Created at
                            </th>
                            <th>
                                Updated At
                            </th>
                            <th>
                                Operations
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                            <?php $category = $cat->getCategoryByid($product->category) ?>
                            <tr>
                                <td class="py-1">
                                    <img src="<?php echo  '..\\' . $product->image ?>" alt="image" />
                                </td>
                                <td>
                                    <?= $product->name ?>
                                </td>
                                <td>
                                    $ <?= $product->price ?>
                                </td>
                                <td>
                                    <?= $product->stock ?>
                                </td>
                                <td>
                                    <?= $category->name ?>
                                </td>
                                <td>
                                    <?= $product->created_at ?>
                                </td>
                                <td>
                                    <?php echo !empty($product->modified_at) ?  $product->modified_at  : "not updated"  ?>
                                </td>
                                <td>
                                    <a style="display: inline-block;font-size:20px;" class="nav-link" href="./update-product.php?id=<?= $product->id ?>"><i class="menu-icon mdi mdi-pencil-box-outline"></i></a>
                                    <a style="display: inline-block;font-size:20px;color:grey;" onclick="return confirm('are you want to delete this product <?= $product->name ?>')" class="nav-link" href="./delete-product.php?id=<?= $product->id ?>"><i class="menu-icon mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php' ?>