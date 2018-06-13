<?php
	session_start();
	if(!isset($_SESSION["uid"]))
		header("Location:loginmain.php");

	$userid=$_SESSION["uid"];
?>
<!doctype html>
<html>
	<head>
		<title>Upload Status</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<style type="text/css">
			span{
				font-weight:bold;
				font-style:italic;
				font-size:20pt;
				color:teal;
			}
		</style>
	</head>
	<body>
	<?php		
			$sem=$_POST["asgsem"];
			$id=0;
			$asgid="";
			$fdate=$_POST["asgdate"];
			$fname=$_FILES['asgfile']['name'];
			$fsize=$_FILES['asgfile']['size'];
			$ftype=$_FILES['asgfile']['type'];
			$tmppath=$_FILES['asgfile']['tmp_name'];

			if(!empty($fname) && !empty($fdate) && !empty($sem))
			{
				$location= "uploads/";
				if(move_uploaded_file($tmppath,$location.$fname))
				{	
					$db_host = "localhost";
  				        $db_user = "laxus";
        				$db_pass = "Laxus#1996";
        				$db_name = "project";

        				$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        				if( mysqli_connect_errno($connect) )
        				{
                				echo "Failed to connect to MySQL: " . mysqli_connect_error();
                				exit();
        				}
        			
                         		$query = "select * from asgtemp";
                         		if( $result = mysqli_query($connect, $query) )
                         		{
						$row=mysqli_fetch_assoc($result);
						if($row["tmpid"]==0)
						{
							$id=0;
							$asgid=$sem.$id."";
							$id=$row["tmpid"]+1;
						}
						else
						{	$id=$row["tmpid"]+1;
							$asgid=$sem.$id."";
						}
					}	
					$asgid=(int)$asgid;	
					$fname="'".$fname."'";	
					$location="'".$location."'";	
					$fdate="'".$fdate."'";	
					$userid=(int)$userid;	
					
					$insquery="insert into assignments values($asgid,$fname,$fdate,$location,$userid)";
					if(mysqli_query($connect,$insquery))
					{
						$usql="update asgtemp set tmpid=".$id;
                                       		mysqli_query($connect,$usql);
                                        	echo "<span>file has been successfully uploaded</span>";

					}
					else
					{
						echo "<span>could not upload file</span><br>";
					}
				}
				else
					echo "<span>please select a file</span>";
			}
			else
				echo "<span>please fill all fields</span>";

		?>
	</body>
</html>
