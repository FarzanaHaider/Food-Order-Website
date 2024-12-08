<?php
include('../config/constants.php');

if (isset($_GET['time_period'])) {
    $time_period = $_GET['time_period'];

    // Determine the date range based on the selected time period
    $date_condition = "";
    if ($time_period === "week") {
        $date_condition = "AND order_date >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
    } elseif ($time_period === "month") {
        $date_condition = "AND order_date >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH)";
    } elseif ($time_period === "year") {
        $date_condition = "AND order_date >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)";
    }

    // Query to calculate the total revenue
    $sql = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered' $date_condition";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $row = mysqli_fetch_assoc($res);
        $total_revenue = $row['Total'] ?? 0;
        echo $total_revenue;
    } else {
        echo "0";
    }
} else {
    echo "Invalid Request";
}
?>
