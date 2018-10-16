<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CMS</title>

		<link href="./assets/plugins/bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/plugins/fontawesome-5.4.1/css/all.min.css" rel="stylesheet">
		<script defer src="./assets/plugins/fontawesome-5.4.1/js/all.min.js"></script>

		<link href="./app/styles/style.css" rel="stylesheet">
		<meta charset="UTF-8" />

	</head>
    
    <body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="navbar-nav">
					<a class="nav-item nav-link <?php if ($_REQUEST['c'] == 'category') echo 'active'; ?>" href="?c=category">Categories</a>
					<a class="nav-item nav-link <?php if ($_REQUEST['c'] == 'article') echo 'active'; ?>" href="?c=article">Articles</a>
					<a class="nav-item nav-link <?php if ($_REQUEST['c'] == 'link') echo 'active'; ?>" href="?c=link">Links</a>
					<a class="nav-item nav-link <?php if ($_REQUEST['c'] == 'picture') echo 'active'; ?>" href="?c=picture">Pictures</a>
					<a class="nav-item nav-link <?php if ($_REQUEST['c'] == 'user') echo 'active'; ?>" href="?c=user">Users</a>
				</div>
			</nav>
		</header>
		
		<div class="container">
		<br>
		