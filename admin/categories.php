<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './includes/header.php' ?>
    <?php require_once './autoload.class.php' ?>

    <!-- instanciate from category view -->
    <?php $paginator = new Paginator('categories', 2); ?>

    <!-- get all categories  -->
    <?php $categories  = $paginator->getObjects() ?>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories Table</h4>
                <p class="card-description">
                    <a style="display: flex;justify-content: end;font-weight: 600;font-size:20px;" class="nav-link" href="./create-category.php">Add Category</a>

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
                                    Created
                                </th>
                                <th>
                                    Operations
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) : ?>
                                <tr>
                                    <td class="py-1">
                                        <img src="./public/images/dashboard/weather-card.jpg" alt="image" />
                                    </td>
                                    <td>
                                        <?= $category->name ?>
                                    </td>
                                    <td>
                                        <?= $category->created ?>
                                    </td>
                                    <td>
                                        <a style="display: inline-block;font-size:20px;" class="nav-link" href="./update-category.php?id=<?= $category->id ?>"><i class="menu-icon mdi mdi-pencil-box-outline"></i></a>
                                        <a style="display: inline-block;font-size:20px;color:grey;" onclick="return confirm('are you want to delete this product <?= $category->name ?>')" class="nav-link" href="./delete-category.php?id=<?= $category->id ?>"><i class="menu-icon mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <nav class="mt-4" aria-label="Page navigation sample">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $paginator->pages; $i++) : ?>
                                <?php if ($paginator->page == $i) : ?>
                                    <li class="page-item active"><a class="page-link" href="./categories.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php else : ?>
                                    <li class="page-item"><a class="page-link" href="./categories.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <?php require_once './includes/footer.php' ?>

<?php else :
    header('Location: ./login.php');
endif; ?>