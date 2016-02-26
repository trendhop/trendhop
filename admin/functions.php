<?php
    function confirmQuery($result) {
        global $connection;
        if(!$result){
            die("QUERY FAILED. " . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }
    }

	function insertCategories() {
		global $connection;
		if(isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];
		if($cat_title == "" || empty($cat_title)) {
        	echo "<div class='alert alert-danger'>This field should not be empty</div>";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category = mysqli_query($connection,$query);

            

            if(!$create_category) {
                die("Query Failed" . mysqli_error($connection));
                echo "<div class='alert alert-warning'>Category did not get inserted to database</div>";
            	}else {
                    echo "<div class='alert alert-success'>New category added</div>";
                }
        	}
        }
	}

	function findAllCategories() {
		global $connection;
		 //Find all categories
         $query = "SELECT * FROM categories";
         $select_cat = mysqli_query($connection, $query);

         while($row = mysqli_fetch_assoc($select_cat)) {
             $cat_id = $row['id'];
             $cat_title = $row['cat_title'];

             echo "<tr>";
             echo "<td>{$cat_id}</td>";
             echo "<td>{$cat_title}</td>";
             echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
             echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
             echo "</tr>";
         }
	}

	function deleteQuery() {
		global $connection;
		if(isset($_GET['delete'])) {
            $del_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE id = {$del_cat_id} "; 
            $delete_query = mysqli_query($connection,$query);
            header("Location: categories.php");

        }

	}

    function updateUser() {
        global $connection;

        if(!empty($user_password)) {
            $get_user = mysqli_query($connection, $query);

            confirmQuery($get_user);

            $row = mysqli_fetch_array($get_user);

            $db_user_password = $row['user_password'];
            if($db_user_password != $user_password) {
                $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
            }

            //add user query
    
            $query = "UPDATE users SET ";
            $query .= "user_firstname = '$user_firstname', ";
            $query .= "user_lastname = '$user_lastname', ";
            $query .= "user_role = '$user_role', ";
            $query .= "username = '$username', ";
            $query .= "user_email = '$user_email', ";
            $query .= "user_password = '$hashed_password' ";
            $query .= "WHERE user_id = $user_id";
    
            $update_user_query = mysqli_query($connection, $query);
    
            confirmQuery($update_user_query);               
        }
    }
?>