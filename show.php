<html>
	<head>
		<title>Curriculum Vitae</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	</head>
	<body>
		<?php
			include("config.php");

			/* database connection */

			$con = mysql_connect($db_host, $db_username, $db_password);

			if (!$con)
				die('Could not connect: ' . mysql_error());

			mysql_select_db($db_name, $con);

			$code = mysql_real_escape_string($_GET['cv']);

			$result = mysql_query("select person_id from persons where person_code = '$code'");

			if($row = mysql_fetch_array($result))
				$id = $row['person_id'];
		?>
		<!-- Personal Information -->

		<div class="contact">
			<?php $result = mysql_query("select * from persons where person_id = $id");?>
			<?php if($result != null && $row = mysql_fetch_array($result)): ?>
				<?php if($_SERVER['PHP_AUTH_USER'] == $admin_username && $_SERVER['PHP_AUTH_PW'] == $admin_password): ?>
			
				<?php else: ?>
					<script>alert('شكراً لك, تم استقبال البيانات التالية :')</script>
				<?php endif ?>
				<h1><?=$row['person_name']?></h1>
				<h2>
					<?php if($row['person_email']): ?>Email: <?=$row['person_email']?><?php endif ?>
					<?php if($row['person_website']): ?><br />Website: <?=$row['person_website']?><?php endif ?>
				</h2>
			<?php else: ?>
				<h1>Sorry, the page not found !</h1>
				<?php exit;?>
			<?php endif ?>
		</div>

		<!-- Education -->

		<?php $result = mysql_query("select * from educations where education_owner = $id order by education_end DESC");?>
		<?php if($result != null && $row = mysql_fetch_array($result)): ?>
		<div class="section">
			<h2>Education</h2>
			<hr />
			<h3>
				<?php if($row['education_start']): ?><?=$row['education_start']?><?php else: ?>Unknown<?php endif ?> – 
				<?php if($row['education_end']): ?>
					<?php if($row['education_level'] != "graduated"): ?>Present<?php else: ?><?=$row['education_end']?><?php endif ?>
				<?php else: ?>
					<?php if($row['education_level'] != "graduated"): ?>Present<?php else: ?>Unknown<?php endif ?>
				<?php endif ?>
			</h3>
			<p>
				<?php if($row['education_major']): ?>
					<?=$row['education_degree']?> of <?=$row['education_major']?>
					<?php if($row['education_level']): ?><?php if($row['education_level'] != "graduated"): ?>, <?=$row['education_level']?><?php endif ?><?php endif ?>
				<?php endif ?>
				<?php if($row['education_university']): ?><br /><?=$row['education_university']?><!--, <?=$row['education_location']?>--><?php endif ?>

				<?php if($row['education_level'] != "graduated" && $row['education_end']): ?>
					<br /><br /><small><b>Note</b>: expected graduation date is <?=$row['education_end']?>.</small>
				<?php endif ?>
			<p>
		</div>
		<?php endif ?>

		<!-- Certifications -->

		<?php $result = mysql_query("select * from certifications where certification_owner = $id order by certification_date DESC");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>	
			<div class="section">
				<h2>Certifications</h2>
				<hr />
				<p>
					<?php while($row = mysql_fetch_array($result)): ?>
						<b><?=$row['certification_date']?></b> - <?=$row['certification_name']?><br />
					<?php endwhile ?>
				</p>
			</div>
		<?php endif ?>

		<!-- Technical Skills -->

		<?php $result = mysql_query("select * from skills where skill_owner = $id order by skill_level DESC");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>
			<?php $cnt = 1; // comma count ?>
			<div class="section">
				<h2>Technical Skills</h2>
				<hr />
				<p>
					<?php while($row = mysql_fetch_array($result)): ?>
						<?=$row['skill_name']?><?php if($row['skill_level']): ?> <small>[<?=$row['skill_level']?>]</small><?php endif ?>
						<?php if($cnt++ < mysql_num_rows($result)) echo(", "); ?>
					<?php endwhile ?>
				</p>
			</div>
		<?php endif ?>

		<!-- Languages -->

		<?php $result = mysql_query("select * from languages where language_owner = $id order by language_name");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>
			<div class="section">
				<h2>Languages</h2>
				<hr />
				<table>
					<tr>
						<th>Langauge</th>
						<th>Reading</th>
						<th>Writing</th>
						<th>Speaking</th>
					</tr>
					<?php while($row = mysql_fetch_array($result)): ?>
						<tr>
							<td><?=$row['language_name']?></td>
							<?php if ($row['language_native']): ?>
								<td colspan="3">Native</td>
							<?php else: ?>
								<td><?=$row['language_reading']?></td>
								<td><?=$row['language_writing']?></td>
								<td><?=$row['language_speaking']?></td>
							<?php endif ?>
						</tr>
					<?php endwhile ?>
				</table>
			</div>
		<?php endif ?>

		<!-- Experience -->

		<?php $result = mysql_query("select * from jobs where job_owner = $id order by job_start DESC");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>	
			<div class="section">
				<h2>Experience</h2>
				<hr />
				<?php while($row = mysql_fetch_array($result)): ?>
					<h3><?=$row['job_start']?> – <?php if($row['job_end']): ?><?=$row['job_end']?><?php else: ?>Persent<?php endif ?></h3>
					<p>
						<?=$row['job_title']?>, <?=$row['job_company']?>
						<br /><?=$row['job_description']?>
					<p>
				<?php endwhile ?>
			</div>
		<?php endif ?>

		<!-- Projects -->

		<?php $result = mysql_query("select * from projects where project_owner = $id order by project_date DESC");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>
			<div class="section">
				<h2>Projects</h2>
				<hr />
				<?php while($row = mysql_fetch_array($result)): ?>
					<h3><?=$row['project_title']?></h3>
					<p>
						Description: <?=$row['project_description']?>
						<br />Technologies: <?=$row['project_technologies']?>
					</p>
				<?php endwhile ?>
			</div>
		<?php endif ?>

		<!-- Courses -->

		<?php $result = mysql_query("select * from courses where course_owner = $id");?>
		<?php if($result != null && mysql_num_rows($result) > 0): ?>
			<div class="section">
				<h2>Courses</h2>
				<hr />
				<ul>
					<?php while($row = mysql_fetch_array($result)): ?>
						<li><?=$row['course_name']?></li>
					<?php endwhile ?>
				</ul>
			</div>
		<?php endif ?>
		<?php
			/* close database connection */

			mysql_close($con);
		?>
	</body>
</html>
