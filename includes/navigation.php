<div class="col span_3_of_3 navigation">
	<ul>
		<?php 
			$query = "SELECT * FROM categories";
			$select_cat = mysqli_query($connection, $query);
				while($row = mysqli_fetch_assoc($select_cat)) {
				$cat_title = $row['cat_title'];
				echo "<li>";
					echo "<a href='#'>$cat_title</a>";
				echo "</li>";
			}
		?>
	</ul>
</div>
