<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './includes/header.php' ?>
    <?php require_once './autoload.class.php' ?>
    <!-- partial -->
    <?php $orderObj = new Order() ?>
    <!-- get non delevred orders  -->
    <?php $orders = $orderObj->getOrdersNeedToDelevred() ?>
    <?php print_r($orders); ?>
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
                                    User
                                </th>
                                <th>
                                    First name
                                </th>
                                <th>
                                    Progress
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                    Deadline
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td class="py-1">
                                        <img src="./public/images/faces/face1.jpg" alt="image" />
                                    </td>
                                    <td>
                                        Herman Beck
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                    <td>
                                        $ 77.99
                                    </td>
                                    <td>
                                        May 15, 2015
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