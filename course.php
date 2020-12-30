<?php
include ('database/dbconn.php');
include_once('session_check.php');


?>
<html>
<head>
		<link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
		<title>Course | Thunderscriptify</title>
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
			<div class="user-area">
				<?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
					<a href="add_course.php" class="add">+ Add Course</a>
				<?php } ?>
			</div>
		</header>

		<section id="content-area">
			<div class="heading">
			<?php
			if(isset($_GET['del']) and $_GET['del']=='success'){
				echo '<div class="del-succes">Course Deleted successfully</div>';
			}
			if(isset($_GET['del']) and $_GET['del']=='fail'){
				echo '<div class="del-fail">Sorry Try Again</div>';
			}
			?>
				<h1>All Course</h1>

			</div>
			<?php
			$sql=mysqli_query($con,"SELECT * FROM course");
			if(mysqli_num_rows($sql)){
			?>
			<table>
				<thead>
					<tr>
						<th>
							Images
						</th>
						<th>
							Course Name
						</th>
						<th>
							Description
						</th>
						<th>
							Course Duration
						</th>
						<th>
							[Action]
						</th>
					</tr>
				</thead>
				<tbody>
				<?php
					while($course=mysqli_fetch_assoc($sql)){
					?>
						<tr>
							<td><?php echo "<img src='Images/c_img/".$course['img']."' style='height:40px; width:40px;' "; ?></td>
							<td><?php echo $course['name']; ?></td>
							<td><?php echo $course['des']; ?></td>
							<td><?php echo $course['duration']; ?></td>
							<td><a href="delete_course.php?courseID=<?php echo $course['courseID']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a></td>
						</tr>
						<?php
					}
					?>
				</tbody>
			</table>
			<?php
			}
			else{
				echo '<h4>No Course Found</h4>';
			}
			?>
		</section>
</body>
</html>
