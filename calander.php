<?php
include ('database/dbconn.php');
include_once('session_check.php');


?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Thunderscriptify</title>
		<link href="css/profile.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel='stylesheet' href='css/fullcalendar.css' />

</head>
<body>
		<section id="sideMenu">
			<div class="logo"><a href="index.php">
				<img src="../TSC/Images/logo.png" alt="Thunderscriptify"></a></div>
				<nav>
					<a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
					<a href="myprofile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
					<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
					<a href="course.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Course</a>
					<?php } ?>
					<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
						<a href="achievement.php"><i class="fa fa-star" aria-hidden="true"></i>Achievement</a>
						<a href="enroll.php"><i class="fa fa-pencil" aria-hidden="true"></i>Enroll Student</a>
					<?php } ?>
					<a class="active" href="calander.php"><i class="fa fa-calendar-o" aria-hidden="true"></i>Calander</a>
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

    <section id="calender">

      <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=7250sfqdpik0rr1oaq6nobfo3s%40group.calendar.google.com&amp;color=%230F4B38&amp;ctz=Asia%2FKuala_Lumpur" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no">
      </iframe>
      <script src='lib/jquery.min.js'></script>
      <script src='lib/moment.min.js'></script>
      <script src='js/fullcalendar.js'></script>

    </section>

</body>
</html>
