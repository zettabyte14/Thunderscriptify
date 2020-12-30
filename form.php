<?php

include ('database/dbconn.php');
//mysqli_select_db($con,"tsc");

  if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
	$userType=$_POST['usertype'];
	
	if($userType=='student'){
		$sql=mysqli_query($con,"INSERT INTO student(name, email, pass) VALUES ('$name', '$email', '$pass')");

		if($sql){
		  $userId=mysqli_insert_id($con);
		  $_SESSION['uid']=$userId;
		  header("location: /TSC/profile.php");
		}
		else{
		  echo "<script>
				alert('Fails');
				window.location.href='index.php';
				</script>";
		}
	}
    else if($userType=='teacher'){
		$sql=mysqli_query($con,"INSERT INTO teacher(name, email, pass) VALUES ('$name', '$email', '$pass')");

		if($sql){
		  $teacherId=mysqli_insert_id($con);
		  $_SESSION['tid']=$teacherId;
		  header("location: /TSC/profile.php");
		}
		else{
		  echo "<script>
				alert('Fails');
				window.location.href='index.php';
				</script>";
		}
		
	}
  }
if(isset($_POST['login'])){
	$email=trim($_POST['email']);
    $pass=trim($_POST['pass']);
	$userType=$_POST['usertype'];
	
	if($userType=='student'){
		$login_sql=mysqli_query($con,"SELECT studentID FROM student WHERE email='$email' AND pass='$pass'");
		if(mysqli_num_rows($login_sql)>0){
			$row=mysqli_fetch_assoc($login_sql);
			$_SESSION['uid']=$row['studentID'];
			header('Location: profile.php');
		}
	}
	if($userType=='teacher'){
		$login_sql=mysqli_query($con,"SELECT teacherID FROM teacher WHERE email='$email' AND pass='$pass'");
		if(mysqli_num_rows($login_sql)>0){
			$row=mysqli_fetch_assoc($login_sql);
			$_SESSION['tid']=$row['teacherID'];
			header('Location: profile.php');
		}
	}
	
}

?>
