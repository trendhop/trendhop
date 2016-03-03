        <div class="col s3 sidebar">
          <h3>Trending Now</h3>
          <div class="trend_sidebar">
            <?php 
              $query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 6";
              $trendQuery = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($trendQuery)) {
                $side_id = $row['article_id'];
                $side_image = $row['article_img'];
                $side_title = $row['article_title'];

                echo "<div class='sidebar_trend_article'>";
                  echo "<img src='image/article_image/$side_image' class='sidebar_thumb'>";
                  echo "<p class='sidebar_title'>$side_title</p>";
                  echo "<div class='cb'></div>";
                echo "</div>";
              }
            ?>
          </div>
          <div class="mail_list">
          <h3>Stay up to date</h3>
          <p>Receive the best of Trendhop delivered right to your inbox!</p>
            <div class="row">
              <form action="mail_list.php" method="post" class="col s12">
                <div class="input-field col s12">
                  <input id="email" type="email" class="validate browser-default">
                  <label for="email">Email</label>
                </div>
              </form>
            </div>
          </div>

<!--           <div class="social">
            <div class="row">
              <div class="col s3"><div class="facebook"></div></div>
              <div class="col s3"><div class="twitter"></div></div>
              <div class="col s3"><div class="google"></div></div>
            </div>
          </div> -->
          </div>