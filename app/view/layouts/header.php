<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CMS</title>

		<link href="<?php echo Settings::SERVER_PATH ?>/assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo Settings::SERVER_PATH ?>/assets/plugins/fontawesome-5.4.1/css/all.min.css" rel="stylesheet">
		<script defer src="<?php echo Settings::SERVER_PATH ?>/assets/plugins/fontawesome-5.4.1/js/all.min.js"></script>

		<link href="<?php echo Settings::SERVER_PATH ?>/app/styles/style.css" rel="stylesheet">
		<link href="<?php echo Settings::SERVER_PATH ?>/resources/images/favicon.ico" type="image/x-icon" rel="icon">
		<meta charset="UTF-8" />

	</head>
    
    <body>
		<header>
			<div class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
				<div>
					<a class="navbar-brand" href="?c=home">
						<img class="ml-5 mr-5" src="<?php echo Settings::SERVER_PATH ?>/resources/images/favicon.ico" width="30" height="30" alt="">
					</a>
				</div>
				<ul class="navbar-nav">
					<li><a class="nav-item nav-link px-5 <?php if ($_REQUEST['c'] == 'category') echo 'active'; ?>" href="?c=category">Categories</a></li>
					<li><a class="nav-item nav-link px-5 <?php if ($_REQUEST['c'] == 'article') echo 'active'; ?>" href="?c=article">Articles</a></li>
					<li><a class="nav-item nav-link px-5 <?php if ($_REQUEST['c'] == 'link') echo 'active'; ?>" href="?c=link">Links</a></li>
					<li><a class="nav-item nav-link px-5 <?php if ($_REQUEST['c'] == 'picture') echo 'active'; ?>" href="?c=picture">Pictures</a></li>
					<li><a class="nav-item nav-link px-5 <?php if ($_REQUEST['c'] == 'user') echo 'active'; ?>" href="?c=user">Users</a></li>
				</ul>
			</div>
		</header>
		
		<div class="container py-5 my-5">
		<br>
		