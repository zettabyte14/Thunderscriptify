<?php
include ('database/dbconn.php');
include_once('session_check.php');


?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Home | Thunderscriptify</title>
		<link href="css/profile.min.css" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
		<section id="sideMenu">
			<div class="logo"><a href="index.php"><img src="../TSC/Images/logo.png" alt="Thunderscriptify"></a></div>
			<nav>
				<a class="active"  href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a>
				<a href="myprofile.php"><i class="fa fa-user" aria-hidden="true"></i>Profile</a>
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
				<a href="course.php"><i class="fa fa-leanpub" aria-hidden="true"></i>Course</a>
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
			<div class="heading">
				<h1>Dashboard</h1>
				<p>Welcome to The Thunderscriptify</p>
			</div>
			<div class="cards">
				<div class="col-md-4">
				<div class="card">
					<div class="user-img"></div>
					<span class="user-name"><?php echo $_SESSION['name'];?></span>
					<hr>
					<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
					<span class="user-title">Teacher</span>
					<?php } ?>
					<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
					<span class="user-title">Student</span>
					<?php } ?>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card">
					<h6>Create On:</h6>
					<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
					<span class="date"><?php echo $_SESSION['created']; ?></span>
					<?php } ?>
					<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
					<span class="date"><?php echo $_SESSION['created']; ?></span>
					<?php } ?>
					<div class="col-md-2">
						<span class="previos">pyth</span>
					</div>
					<div class="col-md-10">
						<span class="chp">Chapter 1</span>
						<span class="chp2">Introduction to Python</span>
						<span class="time">09:15AM</span>
					</div>
				</div>
			</div>
			<?php if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
			<div class="col-md-4">
			<div class="card">
				<h6>Achievement </h6>
			</div>
		</div>
		<?php } ?>

			</div>

			<table>
				<thead>
					<tr>
						<th>
							Course
						</th>
						<th>
							Start
						</th>
						<th>
							End
						</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>Python Beginner</td>
						<td>2018 01 03</td>
						<td>Ongoing</td>
					</tr>
				</tbody>

			</table>
		</section>
</body>
</html>
