<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">

        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Old Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Old Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <div class="clearfix"></div>

    </div>
</div>

<?php 
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // Get the data from Form
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // Check whether the user with current ID and Current Password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        // Execute the Query
        $res = mysqli_query($conn, $sql);

        if($res==true)
        {
            // Check whether data is available or not
            $count = mysqli_num_rows($res);

            if($count==1)
            {
                // User exists and password can be changed
                // Check whether the new and confirm passwords match
                if($new_password == $confirm_password)
                {
                    // Update the Password
                    $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id=$id
                            ";
                    // Execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    // Check whether the query executed or not
                    if($res2==true)
                    {
                        // Display Success Message
                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully.</div>";
                    }
                    else
                    {
                        // Display Error Message
                        $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password.</div>";
                    }
                }
                else
                {
                    // Passwords do not match
                    $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match.</div>";
                }
            }
            else
            {
                // User does not exist
                $_SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
            }

            // Redirect the User
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php 
    include('partials/footer.php');
?>
