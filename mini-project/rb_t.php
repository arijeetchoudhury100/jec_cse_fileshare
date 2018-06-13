<?php
session_start();
if(!isset($_SESSION["uid"]))
                header("Location:loginmain.php");

?>
<!doctype html>
<html>
	<head>
		<title>Here is your assignment</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<style type="text/css">
		a{
			text-decoration:none;
			font-style:sans-serif;
			color:teal;
			font-weight:bold;
		}
		#top{
			text-decoration:underline;
                        font-style:sans-serif;
                        color:teal;
			font-weight:bold;
			font-size:20pt;
		}
		#link{
			font-style:italic;
			font-size:15pt;
		}
		</style>
	</head>
	<body>
		<span id="top">Available assignments:</span><br><br>
		<?php
        		$suserid=$_SESSION["uid"];
        		$db_host = "localhost";
       	 		$db_user = "laxus";
        		$db_pass = "Laxus#1996";
			$db_name = "project";
			$sem=0;
			$name="Rupam Baruah";
			$id=0;
			$number=0;
			$nid=0;
        		$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
			/* check connection */
        		if( mysqli_connect_errno($connect) )
        		{
                		echo "Failed to connect to MySQL: " . mysqli_connect_error();
                		exit();
        		}
        		if( ( strlen(trim($suserid)) > 0) )
        		{
                        	$query = "select roll,semester from student";
                         	if( $result = mysqli_query($connect, $query) )
                         	{
                                	while($row = mysqli_fetch_assoc($result))
                                	{
                                        	if( strcmp($row["roll"],$suserid)==0 )
                                        	{
							$sem=$row["semester"];	
                                        	}
                                	}
                         	}
			}
			$name="'".$name."'";
			$query2 = "select * from teacher where tname=$name";
                        if( $result = mysqli_query($connect, $query2) )
                        {
				 $row = mysqli_fetch_assoc($result);
				 $id=$row["tid"];
	
			}
			$query3 = "select * from assignments where tid=$id";
                        if( $result = mysqli_query($connect, $query3) )
			{
				$flag=0;
				while($row = mysqli_fetch_assoc($result))
				{
                                	 $aid=$row["aid"];
					 $number=$aid;
					 while($number>0)
					 {
						 $number=floor($number/10);
						 if($number<10)
							 break;
					 }	
					if($number==$sem){	
						$aname=$row["atitle"];
						$flag=1;
						echo "<span id='link'><a href=uploads/$aname>$aname</a><span><br>";
					}
			 
				}
				if($flag==0)
					echo "No assignments available at present";
			}			
		?>
	</body>
</html>
