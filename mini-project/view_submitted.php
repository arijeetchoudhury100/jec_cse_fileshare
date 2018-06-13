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
		<title>Semester select</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="view_submitted.css">
		<style type="text/css">
			a{
				color:teal;
				text-decoration:none;
			}
			body{margin:0px;)
		</style>
	</head>
	<body>
		<div class="container">
			<div class="top">
				<span class="topspan">Jorhat Engineering College<br>Department of Computer Science and Engineering<br><br><br><span>
				<span class="topspan"><?=$name;?></span>
				<div class="linkpage" align="right">
                                        <a href="teacher_home.php">Home</a>
                                        <a href="logout.php">Logout</a>
                                </div>
			</div>
			<div class="mid" align="center">
					<a class="teach" href="display_solution12.php">1st/2nd semester</a><br><br>
					<a class="teach" href="display_solution34.php">3rd/4th semester</a><br><br>
						
					<a class="teach" href="display_solution56.php">5rd/6th semester</a><br><br>
					<a class="teach" href="display_solution78.php">7th/8th semester</a><br><br>
				
			</div>
		</div>	
	</body>
</html>
