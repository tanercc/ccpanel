  <!-- Page Header -->
  <?php
	  if($data['post']){
	      foreach($data['post'] as $row){
  ?>            
  
  <header class="masthead" style="background-image: url('images/post-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-heading">
            <h1><?php echo $row->postTitle; ?></h1>
            <h2 class="subheading"><?php echo stripslashes($row->postDesc); ?></h2>
            <span class="meta">Posted on <?php echo date('jS M Y H:i:s', strtotime($row->postDate)); ?>in 
              <a href="<?php echo DIR."category/$row->catSlug"; ?>"><?php echo $row->catTitle; ?></a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
           <p><img src='<?php echo DIR.$row->postImg; ?> class='img-responsive'></p>
           <p><?php echo stripslashes($row->postCont); ?></p>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <?php
          } 
      }
  ?>
