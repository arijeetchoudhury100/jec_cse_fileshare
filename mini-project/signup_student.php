<!doctype html>
<html>
	<head>
		<title>Success!</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="signup_student.css">
	</head>
	<body>
	<?php
        $db_host = "localhost";
        $db_user = "laxus";
	$db_pass = "Laxus#1996";            // for example only! 
        $db_name = "project"; 
 
        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name); 
 
        /* check connection */ 
        if( mysqli_connect_errno($connect) ) 
        { 
                echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
                exit(); 
        } 

	$msg="";
        $name = $_REQUEST['signup_name']; 
	$mail = $_REQUEST['signup_mail'];
        $pass = $_REQUEST['signup_pass'];
	$con_pass = $_REQUEST['signup_con_pass'];
	$roll = $_REQUEST['signup_roll'];
	$sem = $_REQUEST['signup_sem'];

	if(strcmp($pass,$con_pass)!=0)
	{
		$msg="passwords do not match";
	}
	else
	{
		if( ( strlen(trim($name)) > 0) && ( strlen(trim($pass)) > 0 ) && ( strlen(trim($mail)) > 0) && ( strlen(trim($roll)) > 0)
		&& ( strlen(trim($sem)) > 0))
        	{ 
                	$name = "'" . $name . "'"; 
			$mail = "'" . $mail . "'"; 
			$pass="'" . $pass . "'";
 			$roll="'" . $roll . "'";
			$sem="'" . $sem . "'";
               		$query = "insert into student values($roll, $name, $mail, $pass, $sem)"; 
 
                	/* run query */ 
               		 if( mysqli_query($connect, $query) == TRUE ) 
                	 { 
                        	$msg="Your account has been successfully created"."<br>"."username:$roll"; 
                	 } 
        	}	 
        	else 
        	{ 
                	$msg="please enter valid details"; 
        	}	 
	}
        mysqli_close($connect); 
?>

		<div class="container">
			<h3><?=$msg?></h3>
			<h3><a href="loginmain.php">Go to login page!</h3>
		<div>
	</body>
</html>
