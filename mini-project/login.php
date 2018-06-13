<?php
	session_start();
	$_SESSION["uid"]=$_POST["userid"];
?>

<!doctype html>
<html>
	<head>
		<title>Processing</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
	</head>
	<body>
	<?php
        $db_host = "localhost";
        $db_user = "laxus";
	$db_pass = "Laxus#1996";           
        $db_name = "project"; 
 
        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name); 
 
        /* check connection */ 
        if( mysqli_connect_errno($connect) ) 
        { 
                echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
                exit(); 
        } 
	$id = $_REQUEST['userid'];
	$pass = $_REQUEST['userpass'];
        $who=$_REQUEST['whois'];
	if( ( strlen(trim($id)) > 0) && ( strlen(trim($pass)) > 0) && (strlen(trim($who)) > 0))
	{
	        
		if(strcmp($who,"teacher")==0)
		{	 
               		 $query = "select tid,tpass from teacher"; 
        		 $id=(int)$id;	
        	       	 if( $result = mysqli_query($connect, $query) ) 
	            	 { 
                       		while($row = mysqli_fetch_assoc($result))
				{	
                      
                   			if( ($row["tid"]==$id) && strcmp($row["tpass"],$pass)==0)
					{
						//redirect to teacher home page
						header("Location: teacher_home.php");
						
					}	
                  
				}
				echo "<font color='red'<h3>Invalid username or password<br>Redirecting to login page...</h3></font>";
				header('Refresh: 4; URL="login.php"');	
                		mysqli_free_result($result);

                 	 }
		}
       		else
		{
			 $query = "select roll,password from student";
                         if( $result = mysqli_query($connect, $query) ) 
                         { 
                                while($row = mysqli_fetch_assoc($result))
                                {               
                                    
                                        if(strcmp($row["roll"],$id)==0 && strcmp($row["password"],$pass)==0)
                                        {
                                                //redirect to student home page
                                                header("Location: student_home.php");
                                        }       
                                        
				}
				echo "<font color='red'<h3>Invalid username or password<br>Redirecting to login page...</h3></font>";
                                header('Refresh: 4; URL="login.php"');
                                mysqli_free_result($result);

                         }

		}		
        } 
        else 
	{
	        header('Location: login.html');
        }	 
        mysqli_close($connect); 
?>
	</body>
</html>
