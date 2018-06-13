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
		<title>Upload notes</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="upload_assignments.css">
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
				<span class="topspan"><?=$name?></span>
				<div class="linkpage" align="right">	
					<a href="teacher_home.php">Home</a>
					<a href="logout.php">Logout</a>
				</div>
			</div>
			<div class="mid">
				<div class="midmid" align="center">
					<form name="nform" action="upload_ns.php" method="post" enctype="multipart/form-data">
						Select file to upload:
						<input type="file" name="nfile"><br><br>
						Upload for semester:
						<input type="text" name="nsem"><br><br>
						Uploaded on:
						<input type="text" placeholder="dd/mm/yy" name="ndate"><br><br>
						<input type="submit" value="Upload Notes">
					</form>
				</div>
			</div>	
		</div>	
	</body>
</html>
