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
		<!-- search for skill -->
		<?php if($_SERVER['PHP_AUTH_USER'] == $admin_username && $_SERVER['PHP_AUTH_PW'] == $admin_password): ?>
			<h2>Results of search for "<?=$value?>" skill</h2>
			<?php $result = mysql_query("select person_id, person_name, person_code, skill_level from persons, skills where skill_owner = person_id and skill_name = '$value' order by skill_level DESC"); ?>
			<?php $cnt = mysql_num_rows($result); ?>
			<?php if($result != null && $cnt > 0): ?>
				<p>There are <?=$cnt?> results</p>
				<table border="1">
					<tr>
						<th>Person</th>
						<th>Skill level</th>
					</tr>
					<?php while($row = mysql_fetch_array($result)): ?>
						<tr>
							<td><a href="show.php?cv=<?=$row['person_code']?>" title="View CV"><?php if($row['person_name']): ?><?=$row['person_name']?><?php else: ?>Anonymous<?php endif ?></a></td>
							<td><?=$row['skill_level']?></td>
						</tr>
					<?php endwhile ?>
				</table>
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
