<?php 
require_once('partials-font/menu.php'); 
require_once('config/constants.php'); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle Login
if(isset($_POST['login'])) {
    // Get data from login form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Encrypt password

    // Query to check credentials
    $sql = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1) {
        // Login success
        $row = mysqli_fetch_assoc($res);
        $_SESSION['customer_id'] = $row['id'];
        $_SESSION['customer_name'] = $row['name'];
        $_SESSION['customer_contact'] = $row['contact'];
        $_SESSION['customer_email'] = $row['email'];
        $_SESSION['customer_address'] = $row['address'];

        header('location:'.SITEURL.'order.php');
    } else {
        echo "<div class='error text-center'>Invalid email or password. Please try again.</div>";
    }
}
?>

    <!-- Login Form -->
        <div class="login">
            <h3 class="text-center">Login</h3>
            <br><br>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label><br>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter your password" required><br>
                </div>
                <br>
                <div class="form-buttons">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                    <a href="signup.php" class="btn btn-secondary">Sign-Up</a>
                </div>
            </form>
        </div> 

<?php include('partials-font/footer.php'); ?>
