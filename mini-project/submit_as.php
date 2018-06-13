<?php
	session_start();
	if(!isset($_SESSION["uid"]))
		header("Location:loginmain.php");
	$userid=$_SESSION["uid"];
	$userid="'".$userid."'";
?>
<!doctype html>
<html>
	<head>
		<title>Upload Status</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<style type="text/css">
			#error{
			font-weight:bold;
			font-style:italic;
			color:teal;
			font-size:20pt;
			}
		</style>
	</head>
	<body>
<?php		
			$tid=0;
			$sem=0;
			$id=0;
			$asgid="";
			$tname=$_POST["asgteach"];	
			$fdate=$_POST["asgdate"];
			$fname=$_FILES["asgfile"]["name"];
			$fsize=$_FILES["asgfile"]["size"];
			$ftype=$_FILES["asgfile"]["type"];
			$tmppath=$_FILES["asgfile"]["tmp_name"];

			if(!empty($fname) && !empty($tname) && !empty($fdate))
			{
				$location= "submitted-assignments/";
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
					$idquery="select tid,tname from teacher";
					if( $result = mysqli_query($connect, $idquery) )
                                        {
                                                while($row=mysqli_fetch_assoc($result))
						{
							$name=$row["tname"];
							if(strcmp($name,$tname)==0)
							{
								$tid=$row["tid"];
								break;
							}	
						}                                                                                                                            
					}
					$semquery="select roll,semester from student";
					if( $result = mysqli_query($connect, $semquery) )
                                        {
                                                while($row=mysqli_fetch_assoc($result))
                                                {
							$r=$row["roll"];
							$r="'".$r."'";
                                                        if(strcmp($r,$userid)==0)
                                                        {
								$sem=$row["semester"];
								break;
                                                        }      
                                                }                                                                                                      
					}
					$query = "select * from soltemp";
                         		if( $result = mysqli_query($connect, $query) )
                         		{
						$row=mysqli_fetch_assoc($result);
						$asgid=$sem.$row["tempid"]."";
						$id=$row["tempid"]+1;
						
					}	
					$asgid=(int)$asgid;	
					$fname="'".$fname."'";	
					$location="'".$location."'";	
					$fdate="'".$fdate."'";	
					$tid=(int)$tid;	
					
					$insquery="insert into asgn_solution values($asgid,$fname,$location,$fdate,$tid)";
					if(mysqli_query($connect,$insquery))
					{
						$usql="update soltemp set tempid=".$id;
						mysqli_query($connect,$usql);
						$squery="insert into submits values($userid,$asgid)";
						mysqli_query($connect,$squery);
                                        	echo "<span id='error'>file has been successfully uploaded!!!<span>";

					}
					else
					{
						echo "<span id='error'>could not upload file<span><br>";
					}
									}
				else
					echo "<span id='error'> please select a file...<span>";
			}
			else
                                  echo "<span id='error'> please fill all fields...<span>";
		?>
	</body>
</html>
