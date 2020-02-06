  <!-- Page Header -->
  <header class="masthead" style="background-image: url('images/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Clean Blog</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
		<ul class="nav nav-pills">
          <li class="nav-item">
            <a class="nav-link active" href="/">All</a>
          </li>
		  <?php
		  if($data['cats']){
			  foreach($data['cats'] as $crow){
				echo "<li class='nav-item'><a class='nav-link' href='".DIR."category/$crow->catSlug'>$crow->catTitle</a></li>";
			  }
		  }
		  ?>
		</ul>
	  </div>  
      <div class="col-lg-8 col-md-10 mx-auto">

		<?php
		if($data['posts']){
			foreach($data['posts'] as $row){

				echo "<div class='post-preview'>\n";
				echo "<a href='".DIR."post/$row->postSlug'><h2 class='post-title'>$row->postTitle</h2>\n";
					echo "<h3 class='post-subtitle'>".stripslashes($row->postDesc)."</h3>";
                    echo "<p class='post-meta'>Posted on ".date('jS M Y H:i:s', strtotime($row->postDate))." in <a href='".DIR."category/$row->catSlug'>$row->catTitle</a></p>";					
				echo "</div><hr>\n";
			}
		}
		?>
      </div>
    </div>  
  </div>

  <div class='clearfix'></div>

  <?php echo $data['page_links']; ?>