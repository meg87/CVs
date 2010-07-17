<?php
	include("config.php");
	
	/* database coonection */

	$con = mysql_connect($db_host, $db_username, $db_password);

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db($db_name, $con);

	/* variables */

	$type = mysql_real_escape_string($_GET['type']);
	$value = mysql_real_escape_string($_GET['value']);
?>

<html>
	<head>
		<title>Control Panel</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	</head>
	<body>
		<!-- Statistics -->
		<?php if($_SERVER['PHP_AUTH_USER'] == $admin_username && $_SERVER['PHP_AUTH_PW'] == $admin_password): ?>
			<h2>Results</h2>
			<?php $result = mysql_query("select person_id, person_name, person_code from persons, skills where skill_owner = person_id and skill_name like '$value'"); ?>
			<?php if($result != null && $row = mysql_fetch_array($result)): ?>
				<ul>
					<?php while($row = mysql_fetch_array($result)): ?>
						<li><a href="show.php?cv=<?=$row['person_code']?>" title="View CV"><?php if($row['person_name']): ?><?=$row['person_name']?><?php else: ?>Anonymous<?php endif ?></a></li>
					<?php endwhile ?>
				</ul>
			<?php else: ?>
				<p>Sorry, there are not CVs match your search !</p>
			<?php endif ?>
		<?php else: ?>
			<p>Sorry, unauthorized login !</p>
		<?php endif ?>
	</body>
</html>

<?php
	/* close database connection */

	mysql_close($con);	
?>
