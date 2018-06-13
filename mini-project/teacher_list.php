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
		<title>Select teacher</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="teacher_list.css">
		<style type="text/css">
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
				<span class="topspan">Jorhat Engineering College<br>Department of Computer Science and Engineering<br><br><br><span>
				<span class="topspan"><?=$sname;?></span>
				<div class="linkpage" align="right">
                                        <a href="student_home.php">Home</a>
                                        <a href="logout.php">Logout</a>
                                </div>
			</div>
			<div class="mid">
				<div class="innermid1">
					<a class="teach" href="rb.php">Rupam Baruah</a><br><br>
					<a class="teach"href="rc.php">Rajib Chakrabarty</a><br><br>
					<a class="teach" href="bs.php">Biswajit Sarma</a><br><br>
					<a class="teach" href="mb.php">Monmayuri Baruah</a><br><br>
				</div>
				<div class="innermid2">
					<a class="teach" href="db.php">Diganta Baishya</a><br><br>
					<a class="teach" href="rp.php">Rupjyoti Baruah</a><br><br>
					<a class="teach" href="ss.php">Saurav Jyoti Sarmah</a><br><br>
					<a class="teach" href="gg.php">Gitashree Gayon</a><br><br>
				</div>
			</div>
		</div>	
	</body>
</html>
