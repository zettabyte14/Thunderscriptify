<?php
error_reporting(0);
session_start();
if((!isset($_SESSION['uid']) AND (isset($_SESSION['uid']) AND $_SESSION['uid']=='')) AND (!isset($_SESSION['tid']) OR (isset($_SESSION['tid']) AND $_SESSION['tid']==''))){
	header('Location: index.php');
}

$result = mysqli_query($con,"SELECT * FROM student WHERE studentID='" . $_SESSION["uid"] . "'");
$row  = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0){
  $_SESSION['uid'] = $row['studentID'];
  $_SESSION['name'] = $row['name'];
	$_SESSION['created'] = $row['created'];

}else {
	echo "";
}

$result = mysqli_query($con,"SELECT * FROM teacher WHERE teacherID='" . $_SESSION["tid"] . "'");
$row  = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0){
  $_SESSION['tid'] = $row['teacherID'];
  $_SESSION['name'] = $row['name'];
	$_SESSION['created'] = $row['created'];
}else {
	echo "";
}
?>
