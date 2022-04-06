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
    <?php $closedOrders = $orderObj->closedOrders() ?>
    <?php
    // $total = 0;
    // foreach ($closedOrders as $ord) {
    //     $total += $ord->quantity;
    // }
    ?>
    <style>
        #div-result {
            background: #ededed;
            padding: 5px 10px;
            border-radius: 5px;
            height: 100px;
        }

        #h {
            margin-bottom: 15px;
        }

        .res {
            display: flex;

        }

        .res #div-result {
            flex: 1;
            color: white;
            margin-left: 5px;
            background-color: #81dada;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <div id="h" class="res">
                <div id="div-result">
                    <p class="statistics-title">Products</p>
                    <h3 class="rate-percentage"><?php echo count($productObj->getProducts(null)) ?></h3>
                </div>
                <div id="div-result">
                    <p class="statistics-title">Orders</p>
                    <h3 class="rate-percentage"><?php echo count($orderObj->closedOrders()) ?></h3>
                </div>
                <div id="div-result">
                    <p class="statistics-title">Revenue</p>
                    <h3 class="rate-percentage">4000.00 $</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                    <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                    <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                </div>
                                <div id="performance-line-legend"></div>
                            </div>
                            <div class="chartjs-wrapper mt-5">
                                <canvas id="performaneLine"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex flex-column">
            <div class="row flex-grow">
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card bg-primary card-rounded">
                        <div class="card-body pb-0">
                            <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="status-summary-ight-white mb-1">Closed Value</p>
                                    <h2 class="text-info">357</h2>
                                </div>
                                <div class="col-sm-8">
                                    <div class="status-summary-chart-wrapper pb-4">
                                        <canvas id="status-summary"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                        <div class="circle-progress-width">
                                            <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                            <p class="text-small mb-2">Total Visitors</p>
                                            <h4 class="mb-0 fw-bold">26.80%</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="circle-progress-width">
                                            <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                        </div>
                                        <div>
                                            <p class="text-small mb-2">Visits per day</p>
                                            <h4 class="mb-0 fw-bold">9065</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                                    Tel
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
                                        <?= $customer->tel ?>
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