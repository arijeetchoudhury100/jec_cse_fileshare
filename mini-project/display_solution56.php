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
	$sname="";
	$roll="";

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
		<title>5th/6th semester submitted assignments</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<style type="text/css">
			a{
			text-decoration:none;
			color:teal;
			font-style:italic;
			}
			#top{
			color:teal;
			font-size:20pt;
			font-weight:bold;
			}
			#link{
			color:teal;
			font-weight:bold;
			}
		</style>
	</head>
	<body>
			<span id="top">Submitted assignments are:</span><br><br>
	<?php
			$query3 = "select * from asgn_solution where tid=$userid";
                        if( $result = mysqli_query($connect, $query3) )
                        {
                                $flag=0;
                                while($row = mysqli_fetch_assoc($result))
				{
					 $asid=$row["asid"];
                                   	 $number=$asid;
                                         while($number>0)
                                         {
                                                 $number=floor($number/10);
                                                 if($number<10)
                                                         break;
					 }
                                         if(($number==5) || ($number==6)){
						$notename=$row["astitle"];
						$flag=1;
						$rollquery="select roll from submits where asid=$asid";
						if( $result1 = mysqli_query($connect, $rollquery)){
							$row1=mysqli_fetch_assoc($result1);
							$roll=$row1["roll"];
						}	
						$namequery="select name from student where roll="."'".$roll."'";
						if( $result2 = mysqli_query($connect, $namequery)){
                                                        $row2=mysqli_fetch_assoc($result2);
                                                        $sname=$row2["name"];
						} 
						echo "<span id='link'><a href=submitted-assignments/$notename>$notename</a>:
						submitted by $sname ---&nbsp;$roll
						</span><br><br>";
                                	 }

                                }
                                if($flag==0)
                                        echo "<span id='link'>No assignments submitted at present</span>";
                        }
	?>
	</body>
</html>
