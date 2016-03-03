  <?php require_once "inc/db.php"; ?>
  <?php require_once "functions.php"; ?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/reset.css"  media="screen"/>
      <link type="text/css" rel="stylesheet" href="css/trendhop_main.css"  media="screen"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen"/>
      <link rel="stylesheet" href="css/slippry.css" />

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!--[if lte IE 9]>
        <div style="background: #ffebee; padding: 20px;">
          <p>You are using an outdated browser. Our website might not work well with your browser and your transactions might be less secure.<br/>We      recommend getting a new browser like Google Chrome.<br/><a href="https://www.google.com/chrome/browser" target="_blank">Click here to download      Google Chrome</a></p>
        </div>    
      <![endif]-->
    </head>

    <body>
      <header id="header">
        <div class="row" id="nav-desktop">
          <div class="col s12 m12 l12">
            <div class="logo">
              <img src="image/logo.png" alt="TrendHop">
            </div>
            <div class="user_links right">
              <span class="login_link">
                <a href="auth/login.php">
                  Login
                </a>
              </span>
              <span class="login_link">
                <a href="auth/register.php">
                  Register
                </a>
              </span>
            </div>
          </div>
          <div class="col s12">
            <ul id="dropdown1" class="dropdown-content">
              <?php
              findAllcategories();
            ?>
            </ul>
            <nav id="nav">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Categories<i class="material-icons right">arrow_drop_down</i></a></li>
              </ul>
            </nav>
          </div>
        </div>
      </header>
      <div class="row main_content">
        <div class="col s9 main_content">
          <section id="news-demo">
            <article>
              <div class="text-content">
                <h2>Boats by the bay</h2>
                <p>This summer there were, surprise surprise, boats on the bay! Often the sun will shine and when it's partially cloudy we get the 'God' or           'Holy Light' effect. It's pretty cool huh? I wonder what it's pointing to... treasure? Bitcoins?</p>
                <a href="#!" class="button-link read-more">read more</a>
              </div>
              <div class="image-content"><img src="image/article_image/image-1.jpg" alt="demo1_1"></div>
            </article>
            <article>
              <div class="text-content">
                <h2>The winter is coming</h2>
                <p>And isn't it pretty? It's strange, people who live through heavy winters seem to want to get out of it as soon as possible, yet those who          live in more temperate climates see snow and a 'real' winter as an amazing thing that must be experienced.</p>
                <a href="#!" class="button-link read-more">read more</a>
              </div>
              <div class="image-content"><img src="image/article_image/image-2.jpg" alt="demo1_1"></div>
            </article>
            <article>
              <div class="text-content">
                <h2>In front of Versailles</h2>
                <p>The Palace of Versailles is pretty amazing, not just inside, but also the outside garden, where you'll find gardens like these sporting          amazing ranges of flora.</p>
                <a href="#!" class="button-link read-more">read more</a>
              </div>
              <div class="image-content"><img src="image/article_image/image-3.jpg" alt="demo1_1"></div>
            </article>
          </section>
          
          <div class="fresh">
            <h3>Fresh Articles</h3>
            <?php 
              $query = "SELECT * FROM articles WHERE article_status = 'published' ORDER BY article_id DESC LIMIT 3";
              $selectQuery = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($selectQuery)) {
                $fresh_image = $row['article_img'];
                $fresh_category = $row['article_cat_id'];
                $fresh_author = $row['article_author'];
                $fresh_title = $row['article_title'];
                $fresh_date = date('d/m/Y', strtotime($row['article_date']));

                echo "<div class='col s3 fresh_article'>";
                      echo "<img src='image/article_image/$fresh_image' class='fresh_image' alt='$fresh_image'>";
                      $query = "SELECT * FROM categories WHERE id = $fresh_category";

                      $select_cat_id = mysqli_query($connection, $query);

                      while($row = mysqli_fetch_assoc($select_cat_id)) {
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'];

                        echo "<p class='fresh_category'>$cat_title</p>";
                      }
                      echo "<p class='fresh_author'>$fresh_author</p>";
                      echo "<p class='fresh_title'><a href='#'>$fresh_title</a></p>";
                      echo "<p class='fresh_date'>$fresh_date</p>";
                echo "</div>";
              }
            ?>           
        </div>

        <div class="trending">
          <h3>Trending!</h3>
          <?php 
              $query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 9";
              $selectQuery = mysqli_query($connection, $query);

              while($row = mysqli_fetch_assoc($selectQuery)) {
                $fresh_image = $row['article_img'];
                $fresh_category = $row['article_cat_id'];
                $fresh_author = $row['article_author'];
                $fresh_title = $row['article_title'];
                $fresh_date = date('d/m/Y', strtotime($row['article_date']));

                echo "<div class='row trend_row'>";
                      echo "<div class='col s9 trend_col'>";
                      echo "<div class='col s6'>";
                      echo "<img src='image/article_image/$fresh_image' class='trend_image' alt='$fresh_image'>";
                      echo "</div>";
                      echo "<div class='col s3 trend_content'>";
                      echo "<p class='trend_author'>$fresh_author</p>";
                        echo "<p class='trend_title'><a href='#'>$fresh_title</a></p>";
                        echo "<p class='trend_date'>$fresh_date</p>";
                        $query = "SELECT * FROM categories WHERE id = $fresh_category";
  
                        $select_cat_id = mysqli_query($connection, $query);
  
                        while($row = mysqli_fetch_assoc($select_cat_id)) {
                          $cat_id = $row['id'];
                          $cat_title = $row['cat_title'];
  
                          echo "<p class='trend_category'>$cat_title</p>";
                        }
                      echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            ?>
         </div>
       </div>

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
        </div>
      </div>
    <footer id="footer">
      <div class="row">
        <div class="col s12">
          <div class="col s3">
            <div class="footer_logo">
              <img src="image/logo_footer.png" alt="">
            </div>
          </div>
          <div class="col s3">
            <div class="site_links">
              <h3>Site Links</h3>
              <ul>
                <li><a href="#">About</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">DMCA</a></li>
                <li><a href="#">Terms of Use</a></li>
              </ul>
            </div>
          </div>
          <div class="col s3">
            <div class="site_links">
              <h3>Categories</h3>
              <ul>
                <?php
                 findAllcategories();
                 ?>
              </ul>
            </div>
          </div>
          <div class="col s3">
            <div class="social_footer">
              <h3>Social Media</h3>
              <ul>
                <li><a href="#"><div class="facebook"></div></a></li>
                <li><a href="#"><div class="twitter"></div></a></li>
                <li><a href="#"><div class="google"></div></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/slippry.js"></script>
      <script src="js/js.js"></script>
    </body>
  </html>