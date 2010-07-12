<?php
	ob_start();
	include ("config.php");

	/* database coonection */

	$con = mysql_connect($db_host, $db_username, $db_password);

	if (!$con)
		die('Could not connect: ' . mysql_error());

	mysql_select_db($db_name, $con);


	/* personal information */

	$name = mysql_real_escape_string($_REQUEST["name"]);
	$email = mysql_real_escape_string($_REQUEST["email"]);
	$website = mysql_real_escape_string($_REQUEST["website"]);

	//if (preg_match("/^[a-zA-Z0-9]+$/", $name) && preg_match("/^[a-zA-Z0-9_.]+@[.][a-z]+$/", $email) && preg_match("/^http://[a-z0-9]+[.][a-z]+$/", $website))	

	$ok = mysql_query("insert into persons(person_name, person_email, person_website) values('$name', '$email', '$website')");

	if(! $ok)
		 die("Error: " . mysql_error());
	
	$id = mysql_insert_id($con);
	

	/* code */

	$code = md5(strval($id));

	$ok = mysql_query("update persons set person_code = '$code' where person_id = $id");

	if(! $ok)
		 echo "<b>Error</b>: " . mysql_error() . "<br>";


	/* education */

	$major = mysql_real_escape_string($_REQUEST["major"]);
	$degree = "Bachelor";
	$university = mysql_real_escape_string($_REQUEST["university"]);
	$semester = mysql_real_escape_string($_REQUEST["semester"]);
	$location = "Riyadh";
	$study_start = intval($_REQUEST["study-start"]);
	$study_end = intval($_REQUEST["study-end"]);

	$ok = mysql_query("insert into educations(education_owner, education_major, education_degree, education_university, education_level, education_location, education_start, education_end) values($id, '$major', '$degree', '$university', '$semester', '$location', $study_start, $study_end)");

	if(! $ok)
		 echo "<b>Error</b>: " . mysql_error() . "<br>";


	/* certifications */

	$certifications = $_REQUEST["certification"];
	$certifications_date = $_REQUEST["certification-date"];

	if($certifications != null)
		foreach($certifications as $key => $certification_name)
		{
			$certification_name = mysql_real_escape_string($certification_name);
			$certification_date = intval($certifications_date[$key]);

			$ok = mysql_query("insert into certifications(certification_owner, certification_name, certification_date) values($id, '$certification_name', $certification_date)");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}


	/* skills */

	$skills = $_REQUEST["skill"];
	$skills_level = $_REQUEST["skill-level"];

	if($skills != null)
		foreach($skills as $key => $skill_name)
		{
			$skill_name = mysql_real_escape_string($skill_name);
			$skill_level = intval($skills_level[$key]);

			$ok = mysql_query("insert into skills(skill_owner, skill_name, skill_level) values($id, '$skill_name', $skill_level)");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}

	$other_skills = $_REQUEST["other-skill"];

	if($other_skills != null)
		foreach($other_skills as $skill_name)
		{
			$skill_name = mysql_real_escape_string($skill_name);

			$ok = mysql_query("insert into skills(skill_owner, skill_name) values($id, '$skill_name')");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}


	/* languages */

	$languages = $_REQUEST["language"];
	$languages_reading = $_REQUEST["reading"];
	$languages_writing = $_REQUEST["writing"];
	$languages_speaking = $_REQUEST["speaking"];

	if($languages != null)
		foreach($languages as $key => $language_name)
		{
			$language_name = mysql_real_escape_string($language_name);
			$reading_level = intval($languages_reading[$key]);
			$writing_level = intval($languages_writing[$key]);
			$speaking_level = intval($languages_speaking[$key]);

			if($reading_level > 0 || $writing_level > 0 || $speaking_level > 0)
				$ok = mysql_query("insert into languages(language_owner, language_name, language_reading, language_writing, language_speaking, language_native) values($id, '$language_name', $reading_level, $writing_level, $speaking_level, 0)");
			else
				$ok = mysql_query("insert into languages(language_owner, language_name, language_native) values($id, '$language_name', 1)");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}


	/* courses */

	$courses = array();

	if(is_array($_REQUEST["course"]))
		$courses = array_merge($courses, $_REQUEST["course"]);

	if(is_array($_REQUEST["other-course"]))
	$courses = array_merge($courses, $_REQUEST["other-course"]);

	echo print_r($courses);

	if($courses != null)
		foreach($courses as $key => $course_name)
		{
			$course_name = mysql_real_escape_string($course_name);
			$ok = mysql_query("insert into courses(course_owner, course_name) values($id, '$course_name')");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}

	/* projects */

	$projects = $_REQUEST["project-title"];
	$projects_description = $_REQUEST["project-description"];
	$projects_technologies = $_REQUEST["project-technologies"];
	$projects_date = $_REQUEST["project-date"];

	if($projects != null)
		foreach($projects as $key => $project_title)
		{
			$project_title = mysql_real_escape_string($project_title);
			$project_description = $projects_description[$key];
			$project_technologies = $projects_technologies[$key];
			$project_date = intval($projects_date[$key]);

			$ok = mysql_query("insert into projects(project_owner, project_title, project_description, project_technologies, project_date) values($id, '$project_title', '$project_description', '$project_technologies', $project_date)");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}


	/* experiences */

	$jobs = $_REQUEST["job-title"];
	$jobs_description = $_REQUEST["job-description"];
	$jobs_company = $_REQUEST["job-company"];
	$jobs_start = $_REQUEST["job-start"];
	$jobs_end = $_REQUEST["job-end"];

	if($jobs != null)
		foreach($jobs as $key => $job_title)
		{
			$job_title = mysql_real_escape_string($job_title);
			$job_description = $jobs_description[$key];
			$job_company = $jobs_company[$key];
			$job_start = intval($jobs_start[$key]);
			$job_end = intval($jobs_end[$key]);

			$ok = mysql_query("insert into jobs(job_owner, job_title, job_description, job_company, job_start, job_end) values($id, '$job_title', '$job_description', '$job_company', $job_start, $job_end)");

			if(! $ok)
				 echo "<b>Error</b>: " . mysql_error() . "<br>";
		}


	/* send email */

	if($email)
	{
		$to = "To: $name <$email>";
		$subject = "المشروع الجماعي لتطوير الخدمات الطلابية";
		$message = "السلام عليكم,,\n\n شكراً لارسال طلب الانضمام لمشروع تطوير الخدمات الطلابية\n تم استلام الطلب وبامكانك الاطلاع عليه من الرابط التالي:\nhttp://csoiu.com/project/show.php?cv=$code\n\n ---\n $site_name\n $site_url";
		$headers = "From: $site_name <$site_email>";
		mail($to, $subject, $message, $headers);
	}


	/* thanking page */

	header("Location: show.php?cv=$code") ;

	/* close database connection */

	mysql_close($con);
?>
