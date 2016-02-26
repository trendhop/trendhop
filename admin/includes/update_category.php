<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php 
            if(isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE id = {$cat_id}";
                $edit_cat = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($edit_cat)) {
                $cat_id = $row['id'];
                $cat_title = $row['cat_title'];
        ?>

        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>"type="text" class="form-control" name="cat_title">

        <?php }} ?>

        <?php 

        // Update query
        if(isset($_POST['edit'])) {
            $edit_cat_id = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$edit_cat_id}' WHERE id = {$cat_id} "; 
            $edit_query = mysqli_query($connection,$query);
            header("Location: categories.php");

            if(!isset($edit_query)) {
                die("Query Failed" . mysqli_error($connection));
            }
            else {
                echo "<div class='alert alert-success fade in'>Category Added
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        </div>";
            }

        }  

        ?>

       
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit" value="Update Category">
    </div>
</form>