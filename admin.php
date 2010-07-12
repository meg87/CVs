<?php ob_start(); ?>
<html>
	<head>
		<title>Control Panel</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	</head>
	<body>
		<?php 
			include("config.php"); 
		?>
		<?php if (!isset($_SERVER['PHP_AUTH_USER'])): ?>
			<?php 
				header('WWW-Authenticate: Basic realm=""');
				header('HTTP/1.0 401 Unauthorized');
				echo "Error: logon failed !";
				exit; 
			?>
		<?php else: ?> 
			<?php if($_SERVER['PHP_AUTH_USER'] == $admin_username && $_SERVER['PHP_AUTH_PW'] == $admin_password): ?>
				<?php
					/* database connection */

					$con = mysql_connect($db_host, $db_username, $db_password);

					if (!$con)
						die('Could not connect: ' . mysql_error());

					mysql_select_db($db_name, $con);

					/* fetch date */

					$result = mysql_query("select * from persons");
				?>
				<h1>Curriculum Vitae</h1>
				<?php if(mysql_num_rows($result) > 0): ?>
					<table border="1" width="100%">
						<tr>
							<th>Name</th>
							<th>Manage</th>
						</tr>
						<?php while($row = mysql_fetch_array($result)): ?>
							<tr>
								<td><a href="show.php?cv=<?=$row['person_code']?>"><?=$row['person_name']?></a></td>
							<td><a href="delete.php?cv=<?=$row['person_id']?>" onClick="return confirm('Are you sure you wish to delete ?');">[Delete]</a></td>
							</tr>
						<?php endwhile ?>

					</table>
				<?php else: ?>
					<p>Sorry, there are not CVs !</p>
				<?php endif ?>
			<?php endif ?>
		<?php endif ?>
	</body>
</html>

