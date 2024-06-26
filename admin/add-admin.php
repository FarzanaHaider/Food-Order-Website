<?php 
    include('partials/menu.php');
?>

        <!-- Main Section starts -->

        <div class="main-content">
            <div class="wrapper">

                <h1>Add Admin</h1>
                <br>

                <?php 
                    if(isset($_SESSION['add'])) //Checking whether the session is add or not
                    {
                        echo $_SESSION['add'];  //Displaying Session Message
                        unset($_SESSION['add']); //Removing Session Message
                    }
                ?>
                <br><br>

                <form action="" method="post">
                    <table class="tbl-30">
                        <tr>
                            <td>Full Name: </td>
                            <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td><input type="text" name="username" placeholder="Your username"></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input type="password" name="password" placeholder="Your password"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"> </td>
                        
                        </tr>
                    </table>
                </form>

                <div class="clearfix"></div>
                
            </div>
        </div>

        <!-- Main Section ends -->

<?php 
    include('partials/footer.php');
?>

<?php 

    //Process the value from Form and Save it in the Database.
    //Check whether the button is clicked or not 

    if(isset($_POST['submit']))
    {
        //button clicked
        //1.Get the data from form
        $full_name= $_POST['full_name'];
        $username= $_POST['username'];
        $password= md5($_POST['password']); //password encryption with md5

        //2. SQL query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";

        //3. Executing Query and Saving Data into Database
        $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            // echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Admin Added Successfuly";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //Failed to insert Data
            // echo "Failed to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "Failed to Add Admin";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }
    
    }
    
?>