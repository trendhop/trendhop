<?php include "includes/admin-header.php"; ?>

<?php 
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $query = "SELECT * FROM users WHERE username = '$username' ";

        $select_user = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_user)) {
            $user_id        =   $row['user_id'];
            $username       =   $row['username'];
            $user_password  =   $row['user_password'];
            $user_firstname =   $row['user_firstname'];
            $user_lastname  =   $row['user_lastname'];
            $user_email     =   $row['user_email'];
            $user_role      =   $row['user_role'];
        }

    }

?>

<?php 
    
    if(isset($_POST['update_user'])) {
            $user_firstname     =   $_POST['user_firstname'];
            $user_lastname      =   $_POST['user_lastname'];
            $user_role          =   $_POST['user_role'];
            $username           =   $_POST['username'];
            $user_email         =   $_POST['user_email'];
            $user_password      =   $_POST['user_password'];

        //add user query

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '$user_firstname', ";
        $query .= "user_lastname = '$user_lastname', ";
        $query .= "user_role = '$user_role', ";
        $query .= "username = '$username', ";
        $query .= "user_email = '$user_email', ";
        $query .= "user_password = '$user_password' ";
        $query .= "WHERE username = '$username'";

        $update_user = mysqli_query($connection, $query);

        confirmQuery($update_user);

    }

?>

    <div id="wrapper">
    
    <!-- navigation -->
    <?php include "includes/admin-navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                   <div class="col-lg-12">
                        <h1 class="page-header">
                            TrendHop Admin

                            <small>Welcome <?php echo $_SESSION['username'] ?></small><br>
                            <small>Any problems contact Jordie</small>

                        </h1>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_firstname">First Name: </label>
                                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                            </div>
                        
                            <div class="form-group">
                                <label for="user_lastname">Last Name: </label>
                                <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                            </div>
                        
                            <div class="form-group">
                                <label for="user_role">Role: </label>
                                <select name="user_role" class="form-control">
                                    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>            
                                    <?php 
                                        if($user_role == 'admin') {
                                            echo "<option value='subscriber'>subscriber</option>";
                                        } else {
                                            echo "<option value='admin'>admin</option>";
                                        }
                                    ?>
                        
                                    
                                    
                                </select>
                            </div>
                        
                            <div class="form-group">
                                <label for="username">Username: </label>
                                <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                            </div>
                        
                            
                            <div class="form-group">
                                <label for="user_email">Email: </label>
                                <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                            </div>
                        
                            <div class="form-group">
                                <label for="user_password">Password: </label>
                                <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                            </div>
                        
                        
                            <div class="form-group">
                                <input type="submit" value="Update Profile" class="btn btn-primary" name="update_user">
                            </div>
                        
                        
                        
                        
                        </form>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin-footer.php"; ?>