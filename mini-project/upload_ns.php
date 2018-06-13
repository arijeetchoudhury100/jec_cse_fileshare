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
			$sem=$_POST["nsem"];
			$id=0;
			$ngid="";
			$fdate=$_POST["ndate"];
			$fname=$_FILES['nfile']['name'];
			$fsize=$_FILES['nfile']['size'];
			$ftype=$_FILES['nfile']['type'];
			$tmppath=$_FILES['nfile']['tmp_name'];

			if(!empty($fname))
			{
				$location= "notes/";
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
        			
                         		$query = "select * from ntemp";
                         		if( $result = mysqli_query($connect, $query) )
                         		{
						$row=mysqli_fetch_assoc($result);
						if($row["tmpid"]==0)
						{
							$id=0;
							$ngid=$sem.$id."";
							$id=$row["tmpid"]+1;
						}
						else
						{	$id=$row["tmpid"]+1;
							$ngid=$sem.$id."";
						}
					}	
					$ngid=(int)$ngid;	
					$fname="'".$fname."'";	
					$location="'".$location."'";	
					$fdate="'".$fdate."'";	
					$userid=(int)$userid;	
					
					$insquery="insert into notes values($ngid,$fname,$location,$fdate,$userid)";
					if(mysqli_query($connect,$insquery))
					{
						$usql="update ntemp set tmpid=".$id;
                                       		mysqli_query($connect,$usql);
                                        	echo "<span>file has been successfully uploaded</span>";

					}
					else
					{
						echo "<span>could not upload to database</span><br>";
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
