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
                        
                        <?php 
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = '';
                            }
                            switch ($source) {
                                case 'add_articles':
                                include "includes/add_articles.php";
                                break;

                                case 'edit_articles':
                                include "includes/edit_articles.php";
                                break;

                                case '200':
                                echo "Nice 200";
                                break;
                                
                                default:
                                include "includes/view_all_articles.php";
                                break;
                            }
                            
                        ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin-footer.php"; ?>