
<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            //Display articles query
             $query = "SELECT * FROM users";
             $select_users = mysqli_query($connection, $query);


             while($row = mysqli_fetch_assoc($select_users)) {
                 $user_id = $row['user_id'];
                 $username = $row['username'];
                 $user_firstname = $row['user_firstname'];
                 $user_lastname = $row['user_lastname'];
                 $user_email = $row['user_email'];
                 $user_role = $row['user_role'];
                 //$user_role = $row['user_role'];

                 echo "<tr>";
                    echo "<td>$user_id</td>";
                    echo "<td>$username</td>";
                    echo "<td>$user_firstname</td>";
                    echo "<td>$user_lastname</td>";
                    echo "<td>$user_email</td>";
                    echo "<td>$user_role</td>";
                    echo "<td><a href='users.php?change_to_admin=$user_id'>admin</a></td>";
                    echo "<td><a href='users.php?change_to_sub=$user_id'>subscriber</a></td>";
                    echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                    echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                 echo "</tr>";
             }
        ?>
    </tbody>
</table>

<?php 
    if(isset($_GET['change_to_admin'])) {
        $user_id = $_GET['change_to_admin'];

        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";

        $change_to_admin = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if(isset($_GET['change_to_sub'])) {
        $user_id = $_GET['change_to_sub'];

        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";

        $change_to_sub = mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if(isset($_GET['delete'])) {
        $delete = $_GET['delete'];

        $query = "DELETE FROM users WHERE user_id = $delete";

        $delete_query = mysqli_query($connection, $query);
        header("Location: users.php");


    }
?>