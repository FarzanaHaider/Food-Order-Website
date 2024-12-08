<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>DASHBOARD</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>

        <div class="col-4 text-center">
            <?php 
                $sql = "SELECT * FROM tbl_category";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1>
            <br>
            Categories
        </div>

        <div class="col-4 text-center">
            <?php 
                $sql2 = "SELECT * FROM tbl_food";
                $res2 = mysqli_query($conn, $sql2);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?></h1>
            <br>
            Foods
        </div>

        <div class="col-4 text-center">
            <?php 
                $sql3 = "SELECT * FROM tbl_order";
                $res3 = mysqli_query($conn, $sql3);
                $count3 = mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3; ?></h1>
            <br>
            Total Orders
        </div>

        <div class="col-4 text-center">
            <h1 id="revenue-amount">
                <?php 
                    // Default to all-time revenue
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                    $res4 = mysqli_query($conn, $sql4);
                    $row4 = mysqli_fetch_assoc($res4);
                    $total_revenue = $row4['Total'] ?? 0;
                    echo $total_revenue;
                ?>
            </h1>
            <select id="time-period" onchange="fetchRevenue()">
                <option value="all">All Time</option>
                <option value="week">This Week</option>
                <option value="month">This Month</option>
                <option value="year">This Year</option>
            </select>
            
            <br>
            Revenue Generated
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<script>
    function fetchRevenue() {
        const timePeriod = document.getElementById('time-period').value;
        const revenueElement = document.getElementById('revenue-amount');

        fetch('fetch-revenue.php?time_period=' + timePeriod)
            .then(response => response.text())
            .then(data => {
                revenueElement.textContent = data;
            })
            .catch(error => console.error('Error:', error));
    }
</script>

<?php 
    include('partials/footer.php');
?>
