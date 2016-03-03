<?php 
	function findAllCategories() {
		global $connection;
		 //Find all categories
         $query = "SELECT * FROM categories";
         $select_cat = mysqli_query($connection, $query);

         while($row = mysqli_fetch_assoc($select_cat)) {
             $cat_id = $row['id'];
             $cat_title = $row['cat_title'];

             echo "<li><a href='categories.php?c_id=$cat_id'>$cat_title</a></li>";
         }
	}
?>

