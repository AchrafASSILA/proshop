<?php
session_start();
if (($_SESSION['admin_username'])) { ?>
    <?php require_once './includes/header.php' ?>
    <?php require_once './autoload.class.php' ?>
    <!-- get products  -->
    <?php $prod = new Product() ?>
    <?php $products = $prod->getProducts(null) ?>
    <!-- instanciate from category view -->
    <?php $cat = new Category(); ?>
    <!-- start main  -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <i class="fas fa-bars" id="toggle"></i>
            </div>
            <div class="search">
                <input type="text" placeholder="Search Here" name="search" id="" />
            </div>
            <div class="user">
                <img src="./public/images/user.jpg" width="150px" alt="" />
            </div>
        </div>
        <!-- start cards  -->
        <div class="card-box">
            <div class="card">
                <div>
                    <div class="numbers">1.504</div>
                    <div class="card-name">Products</div>
                </div>
                <div class="icon">
                    <i class="far fa-user"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">400</div>
                    <div class="card-name">Orders</div>
                </div>
                <div class="icon">
                    <i class="fas fa-project-diagram"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">600</div>
                    <div class="card-name">Earning</div>
                </div>
                <div class="icon">
                    <i class="far fa-comment"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">1200</div>
                    <div class="card-name">Comments</div>
                </div>
                <div class="icon">
                    <i class="far fa-user"></i>
                </div>
            </div>
        </div>
        <!-- end cards  -->
        <!-- start data list  -->
        <div class="details">
            <div class="recentDevelopers">
                <div class="cardHeader">
                    <h2>Recent Developers</h2>
                    <div class="links">
                        <a href="./create-product.php" class="btn">add product</a>
                        <a href="./create-category.php" class="btn">add category</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <td>image</td>
                            <td>name</td>
                            <td>price</td>
                            <td>stock</td>
                            <td>category</td>
                            <td>created at</td>
                            <td>modified at</td>
                            <td>operations</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as  $product) : ?>
                            <?php $category = $cat->getCategoryByid($product->category) ?>
                            <tr>
                                <td><img width="70px" height="70px" src="<?php echo  '..\\' . $product->image ?>" alt="hy"></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->price ?>$</td>
                                <td><?= $product->stock ?></td>
                                <td><?= $category->name ?></td>
                                <td><?= $product->created_at ?></td>
                                <td><?= $product->modified_at ?></td>
                                <td><a style="color: #4caf50;" href="./update-product.php?id=<?= $product->id ?>">Edit</a>
                                    <a style="color: #ff3939;" onclick="return confirm('are you want to delete this product <?= $product->name ?>')" href="./delete-product.php?id=<?= $product->id ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- end data list  -->
    </div>
    <!-- end main  -->
    <?php require_once './includes/footer.php' ?>
<?php } else {
    header('Location: ./login.php');
} ?>