<?php 
require_once('partials-font/menu.php'); 
require_once('config/constants.php'); 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Handle Registration (Sign-Up)
if(isset($_POST['signup'])) {
    // Get data from form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Encrypt password
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Check if email already exists
    $check_email_query = "SELECT * FROM tbl_customer WHERE email='$email'";
    $check_email_result = mysqli_query($conn, $check_email_query);

    if(mysqli_num_rows($check_email_result) > 0) {
        echo "<div class='error text-center'>Email already registered. Please login.</div>";
    } else {
        // Insert new customer into database
        $sql = "INSERT INTO tbl_customer (name, email, password, contact, address) 
                VALUES ('$name', '$email', '$password', '$contact', '$address')";

        $res = mysqli_query($conn, $sql);

        if($res) {
            echo "<div class='success text-center'>Registration successful! Please login.</div>";
            header('location:login.php'); // Redirect to login page
        } else {
            echo "<div class='error text-center'>Registration failed. Please try again.</div>";
        }
    }
}
?>

    <div class="login">

        <div class="form-container">
            <!-- Sign-Up Form -->
            <div class="signup-form">
                <h3>Sign-Up</h3>
                <br><br>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" name="name" placeholder="Enter your name" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="contact">Phone Number:</label>
                        <input type="text" name="contact" placeholder="Enter your contact number">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <textarea name="address" placeholder="Enter your address" rows="4"></textarea>
                    </div>
                    <br>
                    <input type="submit" name="signup" value="Sign-Up" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

<?php include('partials-font/footer.php'); ?>
