<?php 
	function callCatTitle() {
		global $connection;

		$query = "SELECT * FROM categories WHERE id = $article_cat_id";

		$select_cat_id = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_cat_id)) {
    	        $cat_id = $row['id'];
                $cat_title = $row['cat_title'];
                echo "<div class='category'>$cat_title</div>";
        }
	}
?>