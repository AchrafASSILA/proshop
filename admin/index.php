<?php require_once './includes/header.php' ?>
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
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                    <tr>
                        <td><img src="" alt="hy"></td>
                        <td>name</td>
                        <td>99.9 $</td>
                        <td>20</td>
                        <td>name</td>
                        <td>date</td>
                        <td>date</td>
                        <td><a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!-- end data list  -->
</div>
<!-- end main  -->
<?php require_once './includes/footer.php' ?>