<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

    <!--  Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
            '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
            '//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
            '//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic',
            '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
			helpers\url::template_path() . 'css/clean-blog.min.css',
		))
	?>

</head>
<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="/"><?php echo SITETITLE; ?></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <?php
		if($data['menus']){
			foreach($data['menus'] as $row){

                echo "<li class='nav-item'>\n";
                    echo "<a class='nav-link' href='$row->menuLink'>$row->menuTitle</a>\n";
                echo "</li>";
            }
        }
        ?>
        </ul>
      </div>
    </div>
  </nav>

