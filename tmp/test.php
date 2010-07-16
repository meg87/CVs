<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="style.css" type="text/css" />
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	</head>
	<body>
		<?php
		if (!isset($_SERVER['PHP_AUTH_USER'])) 
		{
			header('WWW-Authenticate: Basic realm=""');
			header('HTTP/1.0 401 Unauthorized');
			echo 'Text to send if user hits Cancel button';
			exit;
		} 
		else 
		{
			if($_SERVER['PHP_AUTH_USER'] == "" && $_SERVER['PHP_AUTH_PW'] == "")
			{

			}
		}
		?>
	</body>
</html>

