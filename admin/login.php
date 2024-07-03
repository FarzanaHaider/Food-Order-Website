<?php include('../config/constants.php'); ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br><br>

        <!-- Login Form Starts Here -->
         <form action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password:<br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary"><br><br>
         </form>

        <!-- Login Form Ends Here -->

        <!-- <p class="text-center">Created By - <a href="">Farzana Haider</a></p> -->
    </div>

</body>
</html>

<?php 

    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //1. Get the Data from Login form
        $username = $_POST['username'];
        $password = md5($_POST['password']); // Password Encryption with MD5

        //2. SQL to check whether the user with username and password exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query 
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            // User available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether is logged in or not and logout will unset it
            // Redirect to Home Page/Dashboard
            header('location:'.SITEURL.'admin/');
            exit(); // Ensure script stops executing after redirection
        }
        else
        {
            // User not available and Login Fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            // Redirect to Login Page
            header('location:'.SITEURL.'admin/login.php');
            exit(); // Ensure script stops executing after redirection
        }
    }

?>