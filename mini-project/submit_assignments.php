<?php
	session_start();
	if(!isset($_SESSION["uid"]))
		header("Location:loginmain.php");
	$suserid=$_SESSION["uid"];
        $db_host = "localhost";
        $db_user = "laxus";
        $db_pass = "Laxus#1996";
        $db_name = "project";
        $sname="";

        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        /* check connection */
        if( mysqli_connect_errno($connect) )
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
        }
        if( ( strlen(trim($suserid)) > 0) )
        {
                         $query = "select roll,name from student";
                         if( $result = mysqli_query($connect, $query) )
                         {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                        if( strcmp($row["roll"],$suserid)==0 )
                                        {
                                                $sname=$row["name"];

                                        }
                                }
                         }
        }

?>
<!doctype html>
<html>
	<head>
		<title>Submit your assignments</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="submit_assignments.css">
		<style>
			a{
				color:teal;
				text-decoration:none;
			}
			body{margin:0px;}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="top">
				<span class="topspan">Jorhat Engineering College</span><br>
				<span class="topspan">Department of Computer Science and Engineering</span><br><br>
				<span class="topspan">Welcome, <?=$sname?></span>
				<div class="linkpage" align="right">	
					<a href="student_home.php">Home</a>
					<a href="logout.php">Logout</a>
				</div>
			</div>
			<div class="mid">
				<div class="midmid" align="center">
					<form name="asgform" action="submit_as.php" method="post" enctype="multipart/form-data">
						Select file:
						<input type="file" name="asgfile"><br><br>
						Submitted to:
						<input type="text" name="asgteach"><br><br>
						Submitted on:
						<input type="text" placeholder="dd/mm/yy" name="asgdate"><br><br>
						<input type="submit" value="Submit Assignment">
					</form>
				</div>
			</div>
		</div>	
	</body>
</html>
