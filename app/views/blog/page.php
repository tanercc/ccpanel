  <!-- Page Header -->
  <?php
	  if($data['page']){
	      foreach($data['page'] as $row){
  ?>            
  
  <header class="masthead" style="background-image: url('images/page-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1><?php echo $row->pageTitle; ?></h1>
            <h2 class="subheading"><?php echo stripslashes($row->pageDesc); ?></h2>
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
           <p><img src='<?php echo DIR.$row->pageImg; ?> class='img-responsive'></p>
           <p><?php echo stripslashes($row->pageCont); ?></p>
        </div>
      </div>
    </div>
  </article>

  <hr>

  <?php
          } 
      }
  ?>
