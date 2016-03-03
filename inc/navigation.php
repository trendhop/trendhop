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