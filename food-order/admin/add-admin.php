<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="full_name" placeholder="Enter Your name"></td>
                </tr>

                <tr>
                    <td>username:</td>
                    <td><input type="text" name="username" placeholder="Your username"></td>
                </tr>

                <tr>
                    <td>password:</td>
                    <td>
                        <input type="text" name="password" placeholder="Your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php

// process the value from form and save it in Database

// check submit button isit pressed ?

    if(isset($_POST['submit']))
    {
        //Button Clicked
        //Button Not Clicked"
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption

        //SQL Query to save the data into data Base
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
            ";

        // Execute Query and Save Data In Database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        //Check Whether the (query is Executed) data us inserted or not and display appropriate message
        if($res==TRUE)
        {
            //data Inserted
            //echo "yeah!! Data Inserted Succefully";
            //Create a session Variable to Display Message
            $_SESSION['add'] = "yeah!!Admin Added Succefully";
            //redirect page to manage Admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        else
        {
            //Failed to insert the data
            //echo "Ohho! Data Not Inserted";
            $_SESSION['add'] = "Ohho!! Admin not Added";
            //redirect page to Add Admin
            header("location:".SITEURL.'admin/manage-admin.php');

        }
        
    }

?>