<!DOCTYPE html>
<html lang="es">
	<head>
		<title>CMS</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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

		