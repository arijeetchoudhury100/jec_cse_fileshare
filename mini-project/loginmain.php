<!doctype html>
<?php
	session_start();
	if(isset($_SESSION["uid"]))
	{
		if(is_numeric($_SESSION["uid"]))
			header("Location:teacher_home.php");
		else
			header("Location:student_home.php");
	}
?>
<html>
	<head>
		<title>Login or sign up</title>
		<meta http-equiv="Content-type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="login.css">
	</head>
	<body>
		<div class="container">
			<div class="top">
				<span class="info">
					<br>
					&nbsp;&nbsp;JORHAT ENGINEERING COLLEGE<br>
					&nbsp;&nbsp;DEPARTMENT OF COMPUTER SCIENCE AND ENGINEERING
				</span>
				<form name="login_form" action="login.php" method="post">
					<input type="text"  name="userid" class="log" id="user" placeholder="userid">
					<input type="password"  name="userpass" class="log" placeholder="password">
					<input type="submit"  value="login" class="log"><br>
					<input type="radio" value="teacher" id="teach" name="whois"><span class="whois">Teacher</span>
					<input type="radio" value="student" name="whois"><span class="whois">Student</span>
				</form>
			</div>
			<div class="bottom_left">
				<div align="center">
					<h3>STUDENTS SIGNUP HERE</h3>
					<form name="signup_student" action="signup_student.php" method="post">
						<input type="text" class="styling" name="signup_name" placeholder="Enter Name"><br>
						<input type="text" class="styling" name="signup_mail" placeholder="Enter Email"><br>
						<input type="password" class="styling" name="signup_pass" placeholder="Enter Password"><br>
						<input type="password" class="styling" name="signup_con_pass" placeholder="Confirm Password"><br>
						<input type="text" class="styling" name="signup_roll" placeholder="Enter Roll"><br>
						<input type="text" class="styling" name="signup_sem" placeholder="Enter semester"><br>
						<input type="submit" class="styling" value="sign up">
					</form>
				</div>
			</div>
			<div class="bottom_right">
				<div align="center">
					<h3>TEACHERS SIGNUP HERE</h3>
					<form name="signup_teacher" action="signup_teacher.php" method="post">
						<input type="text" class="styling"  name="signup_tname" placeholder="Enter Name"><br>
						<input type="text" class="styling" name="signup_tmail" placeholder="Enter Email"><br>
						<input type="password" class="styling" name="signup_tpass" placeholder="Enter Password"><br>
						<input type="password" class="styling" name="signup_tcon_pass" placeholder="Confirm Password"><br>
						<input type="submit" class="styling" value="sign up">
					</form>
				</div>

			<div>
		</div>
	</body>
</html>
