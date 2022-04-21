    <!-- plugins:js -->
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./public/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./public/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="./public/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./public/js/off-canvas.js"></script>
    <script src="./public/js/hoverable-collapse.js"></script>
    <script src="./public/js/template.js"></script>
    <script src="./public/js/settings.js"></script>
    <script src="./public/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="./public/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="./public/js/dashboard.js"></script>

    <!-- End custom js for this page-->
    </body>

    </html>