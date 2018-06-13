<?php
	session_start();
	if(!isset($_SESSION["uid"]))
                header("Location:loginmain.php");

	$userid=$_SESSION["uid"];	
	$db_host = "localhost";
        $db_user = "laxus";
        $db_pass = "Laxus#1996";
	$db_name = "project";
	$name="";

        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        /* check connection */
        if( mysqli_connect_errno($connect) )
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
        }
        if( ( strlen(trim($userid)) > 0) )
	{
                         $query = "select tid,tname from teacher";
                         $userid=(int)$userid;
                         if( $result = mysqli_query($connect, $query) )
                         {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                        if( $row["tid"]==$userid )
                                        {
                                                $name=$row["tname"];

					}
				}
			 }
	}
?>
<!doctype html>
<html>
	<head>
		<title>Welcome, you are logged in</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="teacher_home.css">

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
				<span class="topspan">Jorhat Engineering College<br>Department of Computer Science and Engineering<br><br></span>
				<span class="topspan">Welcome, <?=$name?></span>
				<div class="linkpage" align="right">
					<a href="teacher_home.php">Home</a>
					<a href="logout.php">Logout</a>
				</div>
			</div>
			<div class="mid">
				<div align="center" class="mid1">
					<div class="midl"> <img src="submit-assignments2.png" alt="submit_assignments"><br>
					<a href="upload_assignments.php">Upload Assignments</a>
					</div>
					<div class="midm"><img src="view-notes2.png" alt="view notes"><br>
					<a href="upload_notes.php">Upload Notes</a>
					</div>
					<div class="midr"><img src="view-assignments.jpg" alt="view assignments"><br>
					<a href="view_submitted.php">View Solutions</a>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
	
