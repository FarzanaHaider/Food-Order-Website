<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Food</h1>
        <br><br><br>

                <!-- Button to Add Admin -->

                <a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food</a>
                <br><br><br>

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <tr>
                            <td>1. </td>
                            <td>Farzana </td>
                            <td>farzana@gmail.com</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

                        <tr>
                            <td>2. </td>
                            <td>Fahim </td>
                            <td>fahim@gmail.com</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>

                        <tr>
                            <td>3. </td>
                            <td>Riya </td>
                            <td>riya@gmail.com</td>
                            <td>
                                <a href="#" class="btn-secondary">Update Admin</a>
                                <a href="#" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                    </table>
    </div>
</div>

<?php 
    include('partials/footer.php');
?>