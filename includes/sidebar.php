	<div class="col span_1_of_3">
			<h3 class="trending">Trending Now</h3>
			<div class="trend_side">
				<?php 
					$query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 6";
					$sidebar_article_query = mysqli_query($connection, $query);

					while($row = mysqli_fetch_assoc($sidebar_article_query)) {
						$article_img = $row['article_img'];
						$article_title = $row['article_title'];

						echo "<div class='trend_side_article'>";
							echo "<img width='63' height='63' src='img/article_img/$article_img'>";
							echo "<h5>$article_title</h5>";
						echo "</div>";
					}
				?>																																																										
			</div>
				<div class="cb"></div>
				<div class="newsletter">
					<h3>Stay up to date.</h3>
					<p>Receive the best of Trendhop delivered right to your inbox!</p>
					<input type="text" placeholder="Email Address" class="email_field">
					<input type="submit" value="Go!" class="email_submit">
				</div>
				<div class="social_side">
					<h3>Stay Connected!</h3>
					<img src="img/facebook_side.png" alt="">
					<img src="img/twitter_side.png" alt="">
				</div>
			</div>
	<div class="cb"></div>