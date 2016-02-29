<?php 
	if(isset($_POST['add_user'])) {
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_role = $_POST['user_role'];
		$username = $_POST['username'];
		$user_email = $_POST['user_email'];
		$user_password = $_POST['user_password'];

		$user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

		//add user query

		$query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";

		$query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

		$add_user = mysqli_query($connection, $query);

		confirmQuery($add_user);
	}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="user_firstname">First Name: </label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="user_lastname">Last Name: </label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="user_role">Role: </label>
		<select name="user_role" class="form-control">
			<option value="subscriber">---Select Role---</option>
			<option value="admin">admin</option>
			<option value="subscriber">subscriber</option>
		</select>
	</div>

	<div class="form-group">
		<label for="username">Username: </label>
		<input type="text" class="form-control" name="username">
	</div>

	
	<div class="form-group">
		<label for="user_email">Email: </label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="user_password">Password: </label>
		<input type="password" class="form-control" name="user_password">
	</div>


	<div class="form-group">
		<input type="submit" value="Add User" class="btn btn-primary" name="add_user">
	</div>




</form>