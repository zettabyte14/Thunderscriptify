<?php
include ('database/dbconn.php');
include_once('session_check.php');
$courseID=$_GET['courseID'];
$del_sql=mysqli_query($con,"DELETE FROM course WHERE courseID='$courseID'");
if($del_sql){
	header('Location: course.php?del=success');
}
else{
	header('Location: course.php?del=fail');
}