<?php
include ('database/dbconn.php');
include_once('session_check.php');
include ('form.php');

?>
<html>
<head>
  <!---hello new me---------------------------------->
  <link rel="shortcut icon" href="/TSC/Images/logo.png" type="image/x-icon" />
  <title>Home | Thunderscriptify</title>
  <link href="css/style.min.css" type="text/css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script>
  function validate(){

      var a = document.getElementById("pass").value;
      var b = document.getElementById("pass2").value;
      if (a!=b) {
        swal("Passwords do not match!")
         return false;
      }
  }
    </script>
</head>

<body>
<section id="topmenu">

  <nav>
      <div class="logomain">
        <a href="index.php" style="float:left;"><img src="../TSC/Images/logomain.png" alt="Thunderscriptify"></a>
      </div>
      <?php if(isset($_SESSION['tid']) AND $_SESSION['tid']!=''){ ?>
        <div class="logout3">
        <a href="logout.php"><img src="/TSC/Images/logout2.png"/></a>
        </div>
        <div class="homename">
        <i class="fas fa-user fa-2x"></i><a href="profile.php"><?php echo $_SESSION['name'];?></a>
        </div>
      <?php }else if(isset($_SESSION['uid']) AND $_SESSION['uid']!=''){ ?>
        <div class="logout3">
        <a href="logout.php"><img src="/TSC/Images/logout2.png" style="background-color:$redDark; img:hover{background-color:$redLight;}"/></a>
        </div>
        <div class="homename">
        <i class="fas fa-user fa-2x"></i><a href="profile.php"><?php echo $_SESSION['name'];?></a>
        </div>
      <?php }else{ ?>
        <div class="login">
        <a onclick="document.getElementById('login').style.display='block'"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
        </div>
        <div class="signup">
        <a onclick="document.getElementById('signup').style.display='block'"><i class="fa fa-user-plus" aria-hidden="true"></i>Sign Up</a>
        </div>
        <?php }?>


<!-----------------------------------------login------------------------------------------------------------>
    <div id="login" class="modal">

      <form class="modal-content animate" action="" method="post" autocomplete="off">

        <div class="imgcontainer">
          <span onclick="document.getElementById('login').style.display='none'" class="close" title="Close PopUp">&times;</span>
          <img src="/TSC/Images/logo.png" />
          <h1 style="text-align:center; color:white;">Login</h1>
        </div>
        <div class="container">
          <div class="withicon">
          <input type="text" placeholder="Enter email" name="email"><i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
          </div>
          <div class="withicon">
          <input type="password" placeholder="Enter Password" name="pass"><i class="fa fa-key" aria-hidden="true"></i>
          </div>
		  <div class="withicon">
			<select name="usertype" required>
				<option value=''>-- Select Login Type --</option>
				<option value="student">Student</option>
				<option value="teacher">Teacher</option>
			</select>
          </div>
          <button type="submit" name="login">Login</button>
          <input type="checkbox" style="margin:26px 30px;" name="rememeberme"> Remember me
          <a href="#" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Forgot Password ?</a>
        </div>

      </form>

    </div>
<!----------------------------------------End login----------------------------------------------------------->
<!-------------------------------------------signup---------------------------------------------------------->
    <div id="signup" class="modal">

      <form class="modal-content animate" onsubmit="return validate()" action="" method="post" enctype="multipart/form-data" autocomplete="off">

        <div class="imgcontainer">
          <span onclick="document.getElementById('signup').style.display='none'" class="close" title="Close PopUp">&times;</span>
          <img src="/TSC/Images/logo.png" />
          <h1 style="text-align:center; color:white; ">Registration</h1>
        </div>
        <div class="container">
          <div class="withicon">
            <input type="text" placeholder="Enter Fullname" name="name" required ><i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="withicon">
          <input type="text" placeholder="Enter Email" name="email" required><i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"></i>
          </div>
		  <div class="withicon">
			<select name="usertype" required>
				<option value=''>-- Select User Type --</option>
				<option value="student">Student</option>
				<option value="teacher">Teacher</option>
			</select>
          </div>
          <div class="withicon">
          <input type="password" placeholder="Enter Password" id="pass" name="pass" autocomplete="new-password" required><i class="fa fa-key" aria-hidden="true"></i>
          </div>
          <div class="withicon">
          <input type="password" placeholder="Re-Enter Password" id="pass2" name="pass2" autocomplete="new-password" required><i class="fa fa-unlock-alt" aria-hidden="true"></i>
          </div>
          <button type="submit" name="submit">Register</button>
        </div>

      </form>

    </div>
<!----------------------------------------End Signup------------------------------------------------------------>
  </nav>

  <script>
  // If user clicks anywhere outside of the modal, Modal will close

  var modal = document.getElementById('login');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>
  <script>
  // If user clicks anywhere outside of the modal, Modal will close

  var modal = document.getElementById('signup');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>

</section>

<section class="sec1">
<img src="/TSC/Images/cover.png" />
</section>
<section class="sec2">
  <div class="box">
    <div class="logo1"><img src="/TSC/Images/Plogo.png" width="70" height="70"/><div class="title">
    Python Beginner level
    </div></div>
    <h1>Description</h1>
    <p style="font-size: 20px">
      Python is an interpreted, object-oriented,
      high-level programming language with dynamic semantics. Its
      high-level built in data structures, combined with dynamic typing and dynamic binding,
      make it very attractive for Rapid Application Development, as well as for use as a scripting or glue
       language to connect existing components together.
    </p>
</div>
<div class="box">
  <div class="logo1"><img src="/TSC/Images/Plogo.png" width="70" height="70"/><div class="title">
  Python Intermediate level
  </div></div>
  <h1>Description</h1>
  <p style="font-size: 20px">
    Python is an interpreted, object-oriented,
    high-level programming language with dynamic semantics. Its
    high-level built in data structures, combined with dynamic typing and dynamic binding,
    make it very attractive for Rapid Application Development, as well as for use as a scripting or glue
     language to connect existing components together.
  </p>
</div>
<div class="box">
  <div class="logo1"><img src="/TSC/Images/Plogo.png" width="70" height="70"/><div class="title">
  Python Expert level
  </div></div>
  <h1>Description</h1>
  <p style="font-size: 20px">
    Python is an interpreted, object-oriented,
    high-level programming language with dynamic semantics. Its
    high-level built in data structures, combined with dynamic typing and dynamic binding,
    make it very attractive for Rapid Application Development, as well as for use as a scripting or glue
     language to connect existing components together.
  </p>
</div>
</section>
<footer>
  <div class="icon">
    <a href="#"><img src="/TSC/Images/fb.png" /></a>
    <a href="#"><img src="/TSC/Images/twitter.png" /></a>
  </div>
  <div class="foot">
    Copyright &copy; By Thunderscloud 2017
  </div></footer>


</body>




</html>
