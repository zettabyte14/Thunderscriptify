<?php
include ('database/dbconn.php');
include_once('session_check.php');
if(isset($_POST['enroll'])){
	$enroll=$_POST['enrollcourse'];

	if(empty($enroll)){
		$error="<div class='.error-message'>Please select a course to enroll</div>";
	}
	else{
		$enroll_sql=mysqli_query($con,"UPDATE student SET enroll='$enroll' WHERE studentID='".$_SESSION['uid']."'");
		if($enroll_sql){
			$success="<div class='success-message'>Enroll Successful</div>";
		}
		else{
			$error="<div class='.error-message'>Please Try Again</div>";
		}
	}
}

?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Dashboard | Thunderscriptify</title>
		<link href="css/profile.min.css" rel="stylesheet">
		<link href="css/mycss.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
		<section id="sideMenu">
			<div class="logo"><a href="index.html"><img src="../TSC/Images/logo.png" alt="Thunderscriptify"></a></div>
			<nav>
				<a href="profile.html"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
				<a href="myprofile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
				<a href="achievement.php"><i class="fa fa-star" aria-hidden="true"></i>Achievement</a>
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
				<a class="active" href="course.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Course</a>
				<?php } ?>
				<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
					<a href="enroll.php" class="active"><i class="fa fa-pencil" aria-hidden="true"></i>Enroll Student</a>
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
			<div class="user-area">
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
					<a href="add_course.php" class="add">+ Add Course</a>
				<?php } ?>
				<a href="#" class="notification"><i class="fa fa-bell-o" aria-hidden="true"></i>
					<span class="circle">3</span>
				</a>
				<a href="#"><div class="user-img"></div><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
			</div>
		</header>
		<?php
		$course_sql=mysqli_query($con,"SELECT * FROM course");
		?>
		<section id="content-area">
		<?php
			if(isset($error) and $error!=''){
				echo $error;
			}
			if(isset($success) and $success!=''){
				echo $success;
			}
			$q_enroll_course=mysqli_query($con,"SELECT enroll FROM STUDENT WHERE studentID='".$_SESSION['uid']."'");
			$enroll=mysqli_fetch_assoc($q_enroll_course);
			if(!empty($enroll['enroll'])){
				echo "<h4>You Enroll Courser is ".$enroll['enroll']."</h4>";
			}
			else{
				echo '<h4>No Course Enrolled</h4>';
			}
		?>
			<form action="" method="post">
				<label>Select A course to enroll</label><br>
				<div class="withicon">
					<select name="enrollcourse">
						<option Value=""></option>
						<?php
						while($course=mysqli_fetch_assoc($course_sql)){
							?>
							<option value="<?php echo $course['name']; ?>"><?php echo $course['name']; ?></option>
							<option value="<?php echo $course['name']; ?>"><?php echo $course['name']; ?></option>
							<?php
						}
						?>
					</select><br><br>
					<input type="submit" name="enroll" value="Enroll Now">
				</div>
			</form>
		</section>
</body>
</html>
