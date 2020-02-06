<?php
		$mainmenu = array(
			array("menu" => "Categories", "link" => "admin/cats", "icon" => "file", "submenu" => ""),
            array("menu" => "Posts", "link" => "admin/posts", "icon" => "arrows-v", "submenu" => ""/*array("menu" => "Menu1", "link" => "admin/link1")*/),
            array("menu" => "Pages", "link" => "admin/pages", "icon" => "arrows-v", "submenu" => ""),
			array("menu" => "Users", "link" => "admin/users", "icon" => "dashboard", "submenu" => ""),
			array("menu" => "Menus", "link" => "admin/menus", "icon" => "dashboard", "submenu" => "")
			);
?>

<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">

<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo SITEDESCRIPTION; ?>">
    <meta name="author" content="<?php echo SITECONTENT; ?>">

	<!-- CSS -->
	<?php
		helpers\assets::css(array(
			// <!-- Bootstrap Core CSS -->
			helpers\url::template_path() . 'css/bootstrap.min.css',
			// <!-- Admin Custom CSS -->
			helpers\url::template_path() . 'css/sb-admin.css',
			// <!-- Custom CSS -->
			helpers\url::template_path() . 'css/style.css',
			// <!-- Morris Charts CSS -->
			helpers\url::template_path() . 'css/plugins/morris.css',
			// <!-- Custom Fonts -->
			helpers\url::template_path() . 'font-awesome/css/font-awesome.min.css',
		))
	?>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo DIR;?>admin"><?php echo SITETITLE;?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo \helpers\session::get('username')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo DIR;?>admin/logout"><i class="fa fa-fw fa-power-off"></i> <?php echo $data['lang']['logout']; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php
                  foreach ($mainmenu as $m => $menuitem) {
                    if ($menuitem['submenu']) {
                      echo '<li>';
                      echo '<a href="javascript:;" data-toggle="collapse" data-target="#submenu'.$m.'"><i class="fa fa-fw fa-'.$menuitem['icon'].'"></i> '.$menuitem['menu'].'<i class="fa fa-fw fa-caret-down"></i></a>';
                      echo '<ul id="submenu'.$m.'" class="collapse">';
                      foreach($menuitem['submenu'] as $submenuitem) {
                        echo '<li>';
                        echo '<a href="'.DIR.$submenuitem['link'].'"> '.$submenuitem['menu'].' </a>';
                        echo '</li>';
                      }
                      echo '</ul>';
                      echo '</li>';
                    } else {
                      echo '<li>';
                      echo '<a href="'.DIR.$menuitem['link'].'"><i class="fa fa-fw fa-'.$menuitem['icon'].'"></i> '.$menuitem['menu'].' </a>';
                      echo '</li>';
                    }
                  }
                ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php echo $data['lang']['title']; ?>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="<?php echo DIR;?>admin">Dashboard</a>
                            </li>
                            <?php if (isset($data['section']) && $data['section']): ?>
                            <li>
                                <a href="<?php echo DIR.$data['sectionlink'];?>"><?php echo $data['section']; ?></a>
                            </li>
                            <?php endif ?>
                            <li class="active">
                                <i class="fa fa-edit"></i> <?php echo $data['lang']['title']; ?>
                            </li>
                        </ol>
                    </div>
                </div>
