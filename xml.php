<?php
	include ("config.php");
	header("Content-Type: application/xml; charset=utf-8");

	/* database coonection */

	$con = mysql_connect($db_host, $db_username, $db_password);

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db($db_name, $con);

	/* auth */

	if($_SERVER['PHP_AUTH_USER'] != $admin_username || $_SERVER['PHP_AUTH_PW'] != $admin_password)
		exit;

	/* create XML file */

	echo "<?xml version='1.0' encoding='utf-8'?>";	
?>
<cvs>
	<?php $persons = mysql_query("select * from persons");?>
	<?php while($persons != null && $row = mysql_fetch_array($persons)): ?>
		<?php $id = $row['person_id']; ?>
		<person name="<?=$row['person_name']?>" email="<?=$row['person_email']?>" website="<?=$row['person_website']?>">

			<?php /* education */ ?>
			<?php $result = mysql_query("select * from educations where education_owner = $id");?>
			<?php if($result != null && $row = mysql_fetch_array($result)): ?>
				<education>
					<major><?=$row['education_major']?></major>
					<degree><?=$row['education_degree']?></degree>
					<university><?=$row['education_university']?></university>
					<level><?=$row['education_level']?></level>
					<start><?=$row['education_start']?></start>
					<end><?=$row['education_end']?></end>
				</education>
			<?php endif ?>

			<?php /* certifications */ ?>
			<?php $result = mysql_query("select * from certifications where certification_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<certifications>
					<?php while($row = mysql_fetch_array($result)): ?>
						<certification name="<?=$row['certification_name']?>" date="<?=$row['certification_date']?>" />
					<?php endwhile ?>
				</certifications>
			<?php endif ?>

			<?php /* skills */ ?>
			<?php $result = mysql_query("select * from skills where skill_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<skills>
					<?php while($row = mysql_fetch_array($result)): ?>
						<skill name="<?=$row['skill_name']?>"><?=$row['skill_level']?></skill>
					<?php endwhile ?>
				</skills>
			<?php endif ?>

			<?php /* languages */ ?>
			<?php $result = mysql_query("select * from languages where language_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<languages>
					<?php while($row = mysql_fetch_array($result)): ?>
						<language name="<?=$row['language_name']?>" native="<?=$row['language_native']?>">
							<reading><?=$row['language_reading']?></reading>
							<writing><?=$row['language_writing']?></writing>
							<speaking><?=$row['language_speaking']?></speaking>
						</language>
					<?php endwhile ?>
				</languages>
			<?php endif ?>

			<?php /* courses */ ?>
			<?php $result = mysql_query("select * from courses where course_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<courses>
					<?php while($row = mysql_fetch_array($result)): ?>
						<course><?=$row['course_name']?></course>
					<?php endwhile ?>
				</courses>
			<?php endif ?>

			<?php /* projects */ ?>
			<?php $result = mysql_query("select * from projects where project_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<projects>
					<?php while($row = mysql_fetch_array($result)): ?>
						<project title="<?=$row['project_title']?>" date="<?=$row['project_date']?>">
							<description><?=$row['project_description']?></description>
							<technologies><?=$row['project_technologies']?></technologies>
						</project>
					<?php endwhile ?>
				</projects>
			<?php endif ?>

			<?php /* experience */ ?>
			<?php $result = mysql_query("select * from jobs where job_owner = $id");?>
			<?php if($result != null && mysql_num_rows($result) > 0): ?>
				<experience>
					<?php while($row = mysql_fetch_array($result)): ?>
						<job title="<?=$row['job_title']?>" start="<?=$row['job_start']?>" end="<?=$row['job_end']?>">
							<description><?=$row['job_description']?></description>
							<company><?=$row['job_company']?></company>
						</job>
					<?php endwhile ?>
				</experience>
			<?php endif ?>

		</person>
	<?php endwhile ?>
</cvs>
<?php
	/* close database connection */

	mysql_close($con);
?>
