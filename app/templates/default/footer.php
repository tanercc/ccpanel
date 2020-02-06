  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-github"></i>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

<!-- JS -->
<?php
	helpers\assets::js(array(
		'//code.jquery.com/jquery-3.4.1.slim.min.js',
        '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',
        helpers\url::template_path() . 'js/clean-blog.js',
	)) 
?>

</body>

</html>
