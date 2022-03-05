<?php require_once './includes/header.php' ?>
<?php require_once './autoload.class.php' ?>

<!-- instanciate from category view -->
<?php $cat = new Category(); ?>

<!-- get all categories  -->
<?php $categories  = $cat->getCategories() ?>
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
            </div>
        </div>
    </div>
</div>
<?php require_once './includes/footer.php' ?>