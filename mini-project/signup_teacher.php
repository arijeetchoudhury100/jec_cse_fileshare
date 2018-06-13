<!doctype html>
<html>
	<head>
		<title>Success!</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="signup_teacher.css">
	</head>
	<body>
<?php
	function generateId()
	{
        	$db_host = "localhost";
        	$db_user = "laxus";
        	$db_pass = "Laxus#1996";          
		$db_name = "project";
		$id=0;
		$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
		/* check connection */
        	if( mysqli_connect_errno($connect) )
        	{
                	echo "Failed to connect to MySQL: " . mysqli_connect_error();
                	exit();
        	}

        	/* query */
        	if( $result = mysqli_query($connect, "select * from temp") )
        	{
     			$row = mysqli_fetch_assoc($result);
			$field_val=$row["id"];
			if($field_val==0)
			{
				$id=1000;
			}
			else
			{
				$id=$field_val + 1;
			}
                	mysqli_free_result($result);
		}
		mysqli_close($connect);
		return $id;
	}
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

        $msg="";
        $tname = $_REQUEST['signup_tname'];
        $tmail = $_REQUEST['signup_tmail'];
        $tpass = $_REQUEST['signup_tpass'];
        $tcon_pass = $_REQUEST['signup_tcon_pass'];

        if(strcmp($tpass,$tcon_pass)!=0)
        {
                $msg="passwords do not match";
        }
        else
        {
                if( ( strlen(trim($tname)) > 0) && ( strlen(trim($tpass)) > 0 ) && ( strlen(trim($tmail)) > 0) )
                {
                        $tname = "'" . $tname . "'";
                        $tmail = "'" . $tmail . "'";
			$tpass="'" . $tpass . "'";
			$tid=generateId();
			$query = "insert into teacher values($tid, $tname, $tpass, $tmail)";

                        /* run query */
                         if( mysqli_query($connect, $query) == TRUE )
			 {	
                                $msg="Your account has been successfully created"."<br>"."Your id:$tid";
			 }
			$usql="update temp set id=".$tid;
			mysqli_query($connect,$usql);
		 }
                else
                {
                        $msg="please enter valid details";
                }
        }
        mysqli_close($connect);
?>

		<div class="container">
			<h3><?=$msg?></h3>
			<h3><a href="loginmain.php">You can login now</a></h3>
		<div>
	</body>
</html>
