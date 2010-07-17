<?php
	include("config.php");
	
	/* database coonection */

	$con = mysql_connect($db_host, $db_username, $db_password);

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db($db_name, $con);


	/* functions */

	function get_number($skill_name)
	{
		$result = mysql_query("select count(skill_name) as skill_count from skills where skill_name = '$skill_name'");

		if($row = mysql_fetch_array($result))
			return $row['skill_count'];
	}
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
			<h2>Statistics of Skills</h2>
			<?php $result = mysql_query("select DISTINCT skill_name from skills"); ?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<table border="1">
					<tr>
						<td>Skill</td>
						<td>Persons</td>
					</tr>
					<?php while($row = mysql_fetch_array($result)): ?>
						<tr>
							<td><a href="search.php?type=skills&value=<?=$row['skill_name']?>" title="search"><?=$row['skill_name']?></a></td>
							<td><?=get_number($row['skill_name'])?></td>
						</tr>
					<?php endwhile ?>
				</table>
			<?php else: ?>
				<p>Sorry, there are not CVs yet !</p>
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
