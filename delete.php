<?php
	include("config.php");
	
	/* database coonection */

	$con = mysql_connect($db_host, $db_username, $db_password);

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db($db_name, $con);


	/* delete CV */

	$id = intval($_REQUEST['cv']);

	if($_SERVER['PHP_AUTH_USER'] == $admin_username && $_SERVER['PHP_AUTH_PW'] == $admin_password)
	{
		mysql_query("delete from persons where person_id = $id") or die(mysql_error());
		mysql_query("delete from educations where education_owner = $id") or die(mysql_error());
		mysql_query("delete from certifications where certification_owner = $id") or die(mysql_error());
		mysql_query("delete from skills where skill_owner = $id") or die(mysql_error());
		mysql_query("delete from languages where language_owner = $id") or die(mysql_error());
		mysql_query("delete from courses where course_owner = $id") or die(mysql_error());
		mysql_query("delete from jobs where job_owner = $id") or die(mysql_error());
		mysql_query("delete from projects where project_owner = $id") or die(mysql_error());

		header("Location: admin.php") ;
	}


	/* close database connection */

	mysql_close($con);
?>
