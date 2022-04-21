<?php session_start(); ?>
<?php if (isset($_SESSION['admin_username'])) : ?>
    <?php require_once './includes/header.php' ?>
    <?php require_once './autoload.class.php' ?>
    <!-- partial -->
    <?php $orderObj = new Order() ?>
    <!-- create total revenue session  -->

    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">

            <div class="card-body">
                <h4 class="card-title">Bar chart</h4>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <?php require './includes/footer.php' ?>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
    </script>
<?php else :
    header('Location: ./login.php');
endif ?>