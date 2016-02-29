<?php
	if(isset($_GET['edit_user'])) {
		$user_id = $_GET['edit_user'];
	}

	$query = "SELECT * FROM users WHERE user_id = $user_id";
            $select_users_by_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_users_by_id)) {
                $user_id 		= $row['user_id'];
                $username 		= $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname 	= $row['user_lastname'];
                $user_email 	= $row['user_email'];
                $user_role 		= $row['user_role'];
                $user_password 	= $row['user_password'];
            }

    if(isset($_POST['edit_user'])) {
		$user_firstname = $_POST['user_firstname'];
		$user_lastname 	= $_POST['user_lastname'];
		$user_role 		= $_POST['user_role'];
		$username 		= $_POST['username'];
		$user_email 	= $_POST['user_email'];
		$user_password 	= $_POST['user_password'];

		
	}

	if(!empty($user_password)) {
		$query = "SELECT user_password FROM users WHERE user_id = $user_id";

		$get_user = mysqli_query($connection, $query);

		confirmQuery($get_user);

		$row = mysqli_fetch_array($get_user);

		$db_user_password = $row['user_password'];
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

?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="user_firstname">First Name: </label>
		<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="user_lastname">Last Name: </label>
		<input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="user_role">Role: </label>
		<select name="user_role" class="form-control">
			<option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>			
			<?php 
				if($user_role == 'admin') {
					echo "<option value='subscriber'>subscriber</option>";
				} else {
					echo "<option value='admin'>admin</option>";
				}
			?>

			
			
		</select>
	</div>

	<div class="form-group">
		<label for="username">Username: </label>
		<input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
	</div>

	
	<div class="form-group">
		<label for="user_email">Email: </label>
		<input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="user_password">Password: </label>
		<input type="password" class="form-control" name="user_password">
	</div>


	<div class="form-group">
		<input type="submit" value="Edit User" class="btn btn-primary" name="edit_user">
	</div>




</form>