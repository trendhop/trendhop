  <?php require_once "inc/db.php"; ?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/reset.css"  media="screen"/>
      <link type="text/css" rel="stylesheet" href="css/trendhop_main.css"  media="screen"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen"/>

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
            <!--<ul id="dropdown1" class="dropdown-content">
              <?php
              $query = "SELECT article_cat_id FROM articles";
              $categoryQuery = mysqli_query($connection, $query);

              while($row = mysqli_fetch_array($categoryQuery)) {
                $article_cat_id = $row=['article_cat_id'];

                $query = "SELECT * FROM categories WHERE cat_id = $article_cat_id";

                $select_cat_id = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($categoryQuery)) {
                  $cat_id = $row['cat_id'];
                  $cat_title = $row['cat_title'];

                  echo "<li><a href='$article_cat_id'>$cat_title</a></li>";
                }
              }
            ?>
            </ul>-->
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
          <div class="slider">
            <img src="http://placehold.it/960x520" alt="">
          </div>
          
          <div class="fresh">
            <h2>Fresh Articles</h2>
            <?php 
              $query = "SELECT * FROM articles WHERE article_status = 'published' LIMIT 3";
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

                echo "<div class='row'>";
                      echo "<div class='col s9'>";
                      echo "<div class='col s6'>";
                      echo "<img src='image/article_image/$fresh_image' class='trend_image' alt='$fresh_image'>";
                      echo "</div>";
                      $query = "SELECT * FROM categories WHERE id = $fresh_category";

                      $select_cat_id = mysqli_query($connection, $query);

                      while($row = mysqli_fetch_assoc($select_cat_id)) {
                        $cat_id = $row['id'];
                        $cat_title = $row['cat_title'];

                        echo "<p class='trend_category'>$cat_title</p>";
                      }
                      echo "<p class='trend_author'>$fresh_author</p>";
                      echo "<p class='trend_title'><a href='#'>$fresh_title</a></p>";
                      echo "<p class='trend_date'>$fresh_date</p>";
                echo "</div>";
                echo "</div>";
              }
            ?>
         </div>
       </div>

        <div class="col s3 grey">
          Sidebar
        </div>
      </div>
    <!-- <footer id="footer">
      <div class="col l12 m6 s3 teal">
        footer
      </div>
    </footer> -->
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>