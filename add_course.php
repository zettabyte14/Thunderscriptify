<?php
include ('database/dbconn.php');
include_once('session_check.php');
if(isset($_POST['addcourse'])){
	$path = "Images/c_img/".basename($_FILES['img']['name']);
	$name=$_POST['name'];
	$des=$_POST['des'];
	$duration=$_POST['duration'];
	$img=$_FILES['img']['name'];

	if(empty($name) OR empty($des) OR empty($duration) OR empty($img)){
		$error='<div class="error-message">All Fields Are Required</div>';
	}
	else{
		move_uploaded_file($_FILES['img']['tmp_name'], $path);
		$course_sql=mysqli_query($con,"INSERT INTO course (name,des,duration,img) VALUES ('$name','$des','$duration','$img')");

		if($course_sql){
			$success='<div class="success-message">Course Added Successfully</div>';
		}
		else{
			$error='<div class="error-message">Please Try Again</div>';
		}
	}

}

?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Add Course | Thunderscriptify</title>
		<link href="css/profile.min.css" rel="stylesheet">
		<link href="css/mycss.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
		<section id="sideMenu">
			<div class="logo"><a href="index.html"><img src="../TSC/Images/logo.png" alt="Thunderscriptify"></a></div>
			<nav>
				<a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
				<a href="myprofile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
				<a class="active" href="course.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Course</a>
				<?php } ?>
				<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
					<a href="achievement.php"><i class="fa fa-star" aria-hidden="true"></i>Achievement</a>
					<a href="enroll.php"><i class="fa fa-pencil" aria-hidden="true"></i>Enroll Student</a>
				<?php } ?>
				<a href="calander.php"><i class="fa fa-calendar-o" aria-hidden="true"></i>Calander</a>
				<a href="logout.php"><i class="fa fa-power-off" aria-hidden="true"></i>Logout</a>
			</nav>
		</section>

		<header>
			<div class="search-area">
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" name="" value="">
			</div>
		</header>

		<section id="content-area">
			<?php
			if(isset($error)){
				echo $error;
			}
			if(isset($success)){
				echo $success;
			}
			?>
			<div class="heading">
				<h1>Add Course</h1>
			</div>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="withicon">
				  <label for="coursename">Upload Image :</label><br>
				  <input type="file" name="img"><br><br>
				</div>
				<div class="withicon">
				  <label for="coursename">Course Name :</label><br>
				  <input type="text" id="coursename" placeholder="Course name" name="name"><br>
					<br>
				</div>
				<div class="withicon">
				  <label for="coursename">Description :</label><br>
				  <textarea name="des" cols="30" rows="4" placeholder="Describe the course..."></textarea><br>
				  <br>
				</div>
				<div class="withicon">
				  <label for="coursename">Estimation :</label><br>
					<input type="text" name="duration" id="coursename" placeholder="estimate the course takes to complete" />
				  <br>
				  <br>
				  <div class="withicon">
					<input type="reset" value="Reset" class="">
					<input type="submit" name="addcourse" value="Add Course">
				  </div>
				</div>
			</form>
		</section>
</body>
</html>
