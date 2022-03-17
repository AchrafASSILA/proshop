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
    <?php $orders = $orderObj->getOrdersNeedToDelevred() ?>
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
                                    Shipped
                                </th>
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
                        <form action="./formHandling/order-form.php" method="post">
                            <tbody>
                                <?php $adresse = new Shipping() ?>
                                <?php foreach ($orders as $order) : ?>
                                    <?php $product = $productObj->getSingleProduct($order->product) ?>
                                    <?php $customer = $userObj->getSingleCustomer($order->customer) ?>
                                    <?php $shipping = $adresse->getShippingAdress($order->customer) ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="shipped" name="shipped" value="shipped">
                                            <input type="hidden" name="order" value="<?= $order->order_id ?>">
                                            <input type="hidden" name="product" value="<?= $order->product ?>">
                                        </td>
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
                        <button type="submit" name="UpdateShipped" class="btn btn-primary btn-block "> Update </button>
                        </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require './includes/footer.php' ?>

<?php else :
    header('Location: ./login.php');
endif ?>