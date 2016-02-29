<?php 
	if(isset($_POST['create_article'])) {
		$title = mysqli_real_escape_string($connection, $_POST['title']);
		$category = $_POST['category'];
		$author = $_POST['author'];
		$status = $_POST['status'];

		$image = $_FILES['image']['name'];
		$image_temp = $_FILES['image']['tmp_name'];

		$tags = $_POST['tags'];
		$meta_desc = $_POST['meta_desc'];
		$content = mysqli_real_escape_string($connection, $_POST['content']);
		$date = date('d-m-y');

		move_uploaded_file($image_temp, "../img/article_img/$image");

		//add article query

		$query = "INSERT INTO articles(article_cat_id,article_title,article_author,article_status,article_img,article_tag,article_meta_desc,article_date,article_content) ";

		$query .= "VALUES('{$category}','{$title}','{$author}','{$status}','{$image}','{$tags}','{$meta_desc}',now(),'{$content}') ";

		$add_article = mysqli_query($connection, $query);

		confirmQuery($add_article);
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title: </label>
		<input type="text" class="form-control" name="title">
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
		<input type="text" class="form-control" name="author">
	</div>

	<div class="form-group">
		<label for="status">Status: </label>
		<select name="status" class="form-control">
			<option value="" class="disabled">--- Please Select ---</option>
			<option value="draft">draft</option>
			<option value="published">published</option>
		</select>
	</div>

	<div class="form-group">
		<label for="image">Image: </label>
		<input type="file" name="image">
	</div>

	<div class="form-group">
		<label for="tags">Tags: </label>
		<input type="text" class="form-control" name="tags">
	</div>
	
	<div class="form-group">
		<label for="meta_desc">Meta Description (Similar to tags): </label>
		<input type="text" class="form-control" name="meta_desc">
	</div>

	<div class="form-group">
		<label for="title">Content: </label>
		<textarea name="content" class="form-control" cols="30" rows="10"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" value="Publish" class="btn btn-primary" name="create_article">
	</div>




</form>