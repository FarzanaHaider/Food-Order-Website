<?php
include('../config/constants.php');

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE tbl_order SET status = '$status' WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        echo "Order status updated successfully.";
    } else {
        echo "Failed to update order status.";
    }
} else {
    echo "Invalid request.";
}
?>
