<h3>Please ensure that the article status is set to Published for it to be seen on the main site</h3>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //Display articles query
             $query = "SELECT * FROM articles ORDER BY article_id DESC";
             $select_articles = mysqli_query($connection, $query);


             while($row = mysqli_fetch_assoc($select_articles)) {
                 $article_id = $row['article_id'];
                 $article_author = $row['article_author'];
                 $article_title = $row['article_title'];
                 $article_cat_id = $row['article_cat_id'];
                 $article_status = $row['article_status'];
                 $article_image = $row['article_img'];
                 $article_tags = $row['article_tag'];
                 $article_comments = $row['article_comment_count'];
                 $article_date = date('d/m/Y', strtotime($row['article_date']));

                 echo "<tr>";
                    echo "<td>$article_id</td>";
                    echo "<td>$article_author</td>";
                    echo "<td>$article_title</td>";
                    
                    $query = "SELECT * FROM categories WHERE id = $article_cat_id";

                    $select_cat_id = mysqli_query($connection, $query);

                    while($row = mysqli_fetch_assoc($select_cat_id)) {
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'];

                        echo "<td>$cat_title</td>";
                    }

                    echo "<td>$article_status</td>";
                    echo "<td><img width='100' src='../image/article_image/$article_image'></td>";
                    echo "<td>$article_tags</td>";
                    echo "<td>$article_comments</td>";
                    echo "<td>$article_date</td>";  
                    echo "<td><a href='articles.php?source=edit_articles&a_id=$article_id'>Edit</a></td>";  
                    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete this article?');\" href='articles.php?delete=$article_id'>Delete</a></td>";  
                 echo "</tr>";
             }
        ?>
    </tbody>
</table>

<?php 
    if(isset($_GET['delete'])) {
        $delete = $_GET['delete'];

        $query = "DELETE FROM articles WHERE article_id = $delete";

        $delete_query = mysqli_query($connection, $query);
        header("Location: articles.php");


    }
?>