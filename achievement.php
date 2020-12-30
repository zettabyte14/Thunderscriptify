<?php
include ('database/dbconn.php');
include_once('session_check.php');


?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Dashboard | Thunderscriptify</title>
		<link href="css/profile.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
		<section id="sideMenu">
			<div class="logo"><a href="index.php"><img src="../TSC/Images/logo.png" alt="Thunderscriptify"></a></div>
			<nav>
				<a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
				<a href="myprofile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
				<a href="achievement.php" class="active"><i class="fa fa-star" aria-hidden="true"></i>Achievement</a>
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
				<a href="course.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Course</a>
				<?php } ?>
				<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
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
			<div class="user-area">
				<a href="#" class="add">+ Add</a>
				<a href="#" class="notification"><i class="fa fa-bell-o" aria-hidden="true"></i>
					<span class="circle">3</span>
				</a>
				<a href="#"><div class="user-img"></div><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
			</div>
		</header>

		<section id="content-area">

		</section>
</body>
</html>
