<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './includes/header.php' ?>
    <?php require_once './autoload.class.php' ?>
    <!-- partial -->
    <?php $orderObj = new Order() ?>
    <!-- get non delevred orders  -->
    <!-- instanciate from customer  -->
    <?php $productObj = new Product() ?>
    <!-- instanciate from product  -->
    <?php $userObj = new Authentication() ?>
    <?php $orders = $orderObj->getOrdersNeedToDelevredLimit() ?>
    <style>
        #div-result {
            background: #ededed;
            padding: 5px 10px;
            border-radius: 5px;
        }

        #h {
            margin-bottom: 15px;
        }
    </style>

    <div class="row">
        <div class="col-sm-12">
            <div id="h" class="statistics-details  d-flex align-items-center justify-content-between">
                <!-- <div id="div-result">
                    <p class="statistics-title">Products</p>
                    <h3 class="rate-percentage">32</h3>
                    <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
        </div>
        <div id="div-result">
            <p class="statistics-title">Orders</p>
            <h3 class="rate-percentage">47</h3>
            <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
        </div>
        <div id="div-result">
            <p class="statistics-title">Revenue</p>
            <h3 class="rate-percentage">$ 4000</h3>
            <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
        </div> -->
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Latest Orders</h4>
                <p class="card-description">

                </p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Product
                                </th>
                                <th>
                                    Product name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Customer
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Adresse
                                </th>
                                <th>
                                    Date Added
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $adresse = new Shipping() ?>
                            <?php foreach ($orders as $order) : ?>
                                <?php $product = $productObj->getSingleProduct($order->product) ?>
                                <?php $customer = $userObj->getSingleCustomer($order->customer) ?>
                                <?php $shipping = $adresse->getShippingAdress($order->customer) ?>

                                <tr>
                                    <td class="py-1">
                                        <img src="<?php echo  '..\\' . $product->image ?>" alt="image" />
                                    </td>
                                    <td>
                                        <?= $product->name ?>
                                    </td>
                                    <td>
                                        $<?= $product->price ?>
                                    </td>
                                    <td>
                                        <?= $order->quantity ?>
                                    </td>
                                    <td>
                                        <?= $customer->first_name . " " . $customer->last_name ?>
                                    </td>
                                    <td>
                                        <?= $product->price * $order->quantity ?>
                                    </td>
                                    <td>
                                        <?php if ($shipping) : ?>
                                            <?= $shipping[0]->adress  . " " . $shipping[0]->city  . " " . $shipping[0]->zip_code ?>
                                        <?php else : ?>
                                            don't have
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $order->date_added ?>
                                    </td>
                                </tr>

                        </tbody>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require './includes/footer.php' ?>

<?php else :
    header('Location: ./login.php');
endif ?>