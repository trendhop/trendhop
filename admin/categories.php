<?php include "includes/admin-header.php"; ?>

    <div id="wrapper">
    
    <!-- navigation -->
    <?php include "includes/admin-navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            TrendHop Admin V 0.1

                            <small>Welcome <?php echo $_SESSION['username'] ?></small><br>
                            <small>Any problems contact Jordie</small>

                        </h1>

                        <div class="col-xs-6">

                            <?php 
                                insertCategories();
                            ?>

                                <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                            </form>

                            <?php  // Update and include query
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];

                                    include "includes/update_category.php";
                                }
                            ?>
                        </div> <!-- Add Category Form -->

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Delete</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php 
                                    // Find all categories query
                                   findAllCategories();
                                ?>

                                <?php 
                                    // Delete query
                                    deleteQuery();
                                ?>
                                       
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin-footer.php"; ?>