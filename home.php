<?php 
	//INCLUDES
	require_once "includes/db.php";
	require_once "includes/header.php";
?>
	<div class="cb"></div>
	<div id="content">
		<div class="slider">
			<img src="http://placehold.it/860x520">
		</div>
		<div id="new">
		<h3>Fresh and Shareable</h3>
		
			<?php 
				$query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 3 ";

				$select = mysqli_query($connection, $query);

				while($row = mysqli_fetch_assoc($select)) {
					$article_id 	= $row['article_id'];
					$article_title 	= $row['article_title'];
					$article_author = $row['article_author'];
					$article_img 	= $row['article_img'];
					$article_date 	= date("d-m-Y", strtotime($row['article_date']));;
					$article_cat_id = $row['article_cat_id'];

					echo "<div class='article_fresh'>";
						echo "<img src=img/article_img/$article_img>";

						$query = "SELECT * FROM categories WHERE id = $article_cat_id";

						$select_cat_id = mysqli_query($connection, $query);

	                    while($row = mysqli_fetch_assoc($select_cat_id)) {
    	                    $cat_id 	= $row['id'];
        	                $cat_title 	= $row['cat_title'];

        	                echo "<div class='category'>$cat_title</div>";
        	            }

        	            echo "<div class='title'>$article_title</div>";
        	            echo "<div class='author'>$article_author</div>";
        	            echo "<div class='release'>$article_date</div>";

					echo "<div>";
				}
			?>
		</div>
		<div class="cb"></div>
		<div class="top_shares">
		<?php 
			$query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 9 ";

			$select_top_query = mysqli_query($connection, $query);

			while($row = mysqli_fetch_assoc($select_top_query)) {
				$article_id 			= $row['article_id'];
				$article_title 			= $row['article_title'];
				$article_author 		= $row['article_author'];
				$article_cat_id 		= $row['article_cat_id'];
				$article_img 			= $row['article_img'];
				$article_comment_count 	= $row['article_comment_count'];
				$article_date 	= $row['article_date'];

				echo "<div class='share_article'>";
					echo "<div class='share_article_img'><img src='img/article_img/$article_img'></div>";
					echo "<div class='share_article_share'>$article_comment_count</div>";
				

				//category title query
				$query = "SELECT * FROM categories WHERE id = $article_cat_id";

				$select_cat_id = mysqli_query($connection, $query);
	            while($row = mysqli_fetch_assoc($select_cat_id)) {
    	            $cat_id 	= $row['id'];
        	        $cat_title 	= $row['cat_title'];
        	        echo "<div class='category'>$cat_title</div>";
        	    }

        	    	echo "<div class='share_article_title'>$article_title</div>";
        	    	echo "<div class='share_article_author'>$article_author</div>";
        	    	echo "<div class='share_article_date'>$article_date</div>";
        	    	echo "<div class='cb'></div>";
        	    echo "</div>";
			}
		?>
	</div>
	</div><!-- end content -->
	<?php require_once ('includes/sidebar.php'); ?>
	<?php require_once ('includes/footer.php'); ?>

