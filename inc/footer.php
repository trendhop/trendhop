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
      <script type="text/javascript" src="js/jquery-2.2.1.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script src="js/slippry.js"></script>
      <script src="js/js.js"></script>
    </body>
  </html>