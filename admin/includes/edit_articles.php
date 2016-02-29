<?php
	if(isset($_GET['a_id'])) {
		$edit_article_id = $_GET['a_id'];

	}

	$query = "SELECT * FROM articles WHERE article_id = $edit_article_id";
            $select_articles_by_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_articles_by_id)) {
                $article_id = $row['article_id'];
                $article_author = $row['article_author'];
                $article_title = $row['article_title'];
                $article_cat_id = $row['article_cat_id'];
                $article_status = $row['article_status'];
                $article_image = $row['article_img'];
                $article_tags = $row['article_tag'];
                $article_meta_desc = $row['article_meta_desc'];
                $article_comments = $row['article_comment_count'];
                $article_content = $row['article_content'];
                $article_date = $row['article_date'];
            }

            if(isset($_POST['update_article'])) {
            	$title = mysqli_real_escape_string($connection, $_POST['title']);
				$category = $_POST['category'];
				$author = $_POST['author'];
				$status = $_POST['status'];
		
				$image = $_FILES['image']['name'];
				$image_temp = $_FILES['image']['tmp_name'];
		
				$tags = $_POST['tags'];
				$meta_desc = $_POST['meta_desc'];
				$content = mysqli_real_escape_string($connection, $_POST['content']);

				move_uploaded_file($image_temp, "../img/article_img/$image");

				if(empty($image)) {
					$query = "SELECT * FROM articles WHERE article_id = $edit_article_id";
					
					$select_image = mysqli_query($connection, $query);

					while($row = mysqli_fetch_array($select_image)) {
						$image = $row['article_img'];
					}


				}

				$query = "UPDATE articles SET ";
				$query .= "article_title = '$title', ";
				$query .= "article_cat_id = '$category', ";
				$query .= "article_author = '$author', ";
				$query .= "article_status = '$status', ";
				$query .= "article_img = '$image', ";
				$query .= "article_tag = '$tags', ";
				$query .= "article_meta_desc = '$meta_desc', ";
				$query .= "article_content = '$content' ";
				$query .= "WHERE article_id = $edit_article_id";

				$update_query = mysqli_query($connection, $query);

				confirmQuery($update_query);


            }
?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title: </label>
		<input type="text" class="form-control" name="title" value="<?php echo $article_title; ?>">
	</div>

	<div class="form-group">
		<label for="category">Category: </label>
		<select name="category" class="form-control">
			<?php 
				$query = "SELECT * FROM categories";
                $select_cat = mysqli_query($connection, $query);

                confirmQuery($select_cat);

                while($row = mysqli_fetch_assoc($select_cat)) {
	                $cat_id = $row['id'];
	                $cat_title = $row['cat_title'];

               		echo "<option value='$cat_id'>$cat_title</option>";
         	   }
			?>

		</select>
	</div>

	<div class="form-group">
		<label for="author">Author: </label>
		<input type="text" class="form-control" name="author" value="<?php echo $article_author; ?>">
	</div>

	<div class="form-group">
		<label for="status">Status: </label>
		<select name="status" class="form-control">
			<option value="<?php echo $article_status; ?>"><?php echo $article_status; ?></option>			
			<?php 
				if($article_status == 'Published') {
					echo "<option value='draft'>draft</option>";
				} else {
					echo "<option value='published'>published</option>";
				}
			?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="image">Image: </label>
		<?php 
			echo "<img src='../img/article_img/$article_image'>";
		?>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="tags">Tags: </label>
		<input type="text" class="form-control" name="tags" value="<?php echo $article_tags; ?>">
	</div>
	
	<div class="form-group">
		<label for="meta_desc">Meta Description (Similar to tags): </label>
		<input type="text" class="form-control" name="meta_desc" value="<?php echo $article_meta_desc; ?>">
	</div>

	<div class="form-group">
		<label for="title">Content: </label>
		<textarea name="content" class="form-control" cols="30" rows="10"><?php echo $article_content; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" value="Update" class="btn btn-primary" name="update_article">
	</div>
</form>