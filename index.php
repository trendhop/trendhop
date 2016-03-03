<?php require_once "inc/header.php"; ?>
<?php require_once "inc/navigation.php"; ?>
<?php require_once "inc/slider.php"; ?>
<div class="fresh">
  <h3>Fresh Articles</h3>
     <?php 
       $query = "SELECT * FROM articles WHERE article_status = 'published' ORDER BY article_id DESC LIMIT 3";
       $selectQuery = mysqli_query($connection, $query);
       while($row = mysqli_fetch_assoc($selectQuery)) {
         $fresh_image = $row['article_img'];
         $fresh_category = $row['article_cat_id'];
         $fresh_author = $row['article_author'];
         $fresh_title = $row['article_title'];
         $fresh_date = date('d/m/Y', strtotime($row['article_date']));
         echo "<div class='col s3 fresh_article'>";
               echo "<img src='image/article_image/$fresh_image' class='fresh_image' alt='$fresh_image'>";
               $query = "SELECT * FROM categories WHERE id = $fresh_category";
               $select_cat_id = mysqli_query($connection, $query);
               while($row = mysqli_fetch_assoc($select_cat_id)) {
                 $cat_id = $row['id'];
                 $cat_title = $row['cat_title'];
                 echo "<p class='fresh_category'>$cat_title</p>";
               }
               echo "<p class='fresh_author'>$fresh_author</p>";
               echo "<p class='fresh_title'><a href='#'>$fresh_title</a></p>";
               echo "<p class='fresh_date'>$fresh_date</p>";
         echo "</div>";
       }
     ?>           
</div>
<div class="trending">
   <h3>Trending!</h3>
   <?php 
       $query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 9";
       $selectQuery = mysqli_query($connection, $query);
       while($row = mysqli_fetch_assoc($selectQuery)) {
         $fresh_image = $row['article_img'];
         $fresh_category = $row['article_cat_id'];
         $fresh_author = $row['article_author'];
         $fresh_title = $row['article_title'];
         $fresh_date = date('d/m/Y', strtotime($row['article_date']));
         echo "<div class='row trend_row'>";
               echo "<div class='col s9 trend_col'>";
               echo "<div class='col s6'>";
               echo "<img src='image/article_image/$fresh_image' class='trend_image' alt='$fresh_image'>";
               echo "</div>";
               echo "<div class='col s3 trend_content'>";
               echo "<p class='trend_author'>$fresh_author</p>";
                 echo "<p class='trend_title'><a href='#'>$fresh_title</a></p>";
                 echo "<p class='trend_date'>$fresh_date</p>";
                 $query = "SELECT * FROM categories WHERE id = $fresh_category";
                   $select_cat_id = mysqli_query($connection, $query);
                   while($row = mysqli_fetch_assoc($select_cat_id)) {
                   $cat_id = $row['id'];
                   $cat_title = $row['cat_title'];
                     echo "<p class='trend_category'>$cat_title</p>";
                 }
               echo "</div>";
         echo "</div>";
         echo "</div>";
       }
     ?>
</div>
</div> <!-- end row main_content -->
<?php require_once "inc/sidebar.php"; ?>
</div>
<?php require_once "inc/footer.php"; ?>