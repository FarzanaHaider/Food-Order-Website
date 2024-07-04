<?php 
    include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>
        <br><br>

        <?php 

            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

        ?>
        <br><br><br>

                <!-- Button to Add Admin -->

                <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
                <br><br><br>

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Featured</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>

                        <?php 

                            //Query to Get all Category from Database
                            $sql = "SELECT * FROM tbl_category";

                            //Execute Query
                            $res = mysqli_query($conn, $sql);

                            //Count Rows
                            $count = mysqli_num_rows($res);

                            //Check Serial Number Variable and assign value as 1
                            $sn = 1;

                            //Check whether we have data in database or not
                            if($count>0)
                            {
                                //We have data in database
                                //get the data and display
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $featured = $row['featured'];
                                    $active = $row['active'];

                                    ?>

                                        <tr>
                                            <td><?php echo $sn++; ?></td>
                                            <td><?php echo $title; ?></td>

                                            <td>
                                                
                                                <?php 
                                                
                                                    //Check whether image name is available or not
                                                    if($image_name!="")
                                                    {
                                                        //Display the image
                                                        ?>

                                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">

                                                        <?php
                                                    }
                                                
                                                ?>
                                        
                                            </td>

                                            <td><?php echo $featured; ?></td>
                                            <td><?php echo $active; ?></td>
                                            <td>
                                                <a href="#" class="btn-secondary">Update Category</a>
                                                <a href="#" class="btn-danger">Delete Category</a>
                                            </td>
                                        </tr>

                                    <?php
                                }
                            }
                            else
                            {
                                //We do not have data
                                //we'll display the message inside table
                                ?>

                                <tr>
                                    <td colspan="6"><div class="error">NO Category Added</div></td>
                                </tr>

                                <?php
                            }

                        ?>

                    </table>
    </div>
</div>

<?php 
    include('partials/footer.php');
?>