<?php
@session_start();
if(isset($_SESSION['provideremail']))
{
	header("Location:homeprovider.php");
}
$cn=mysqli_connect('localhost','root','','ndjobs') or die ('Could Not Establish Connection With Database');
if(isset($_SESSION['provideremail']))   // Checking whether the session is already there or not, if true then header redirect it to the homeprovider page directly
 {
    header("Location:homeprovider.php"); 
 }
if (isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select1="select * from regprovider where email='$email' ";
	$query1=mysqli_query($cn,$select1) or die('Error Finding Records In The Database');
	$tblrw=mysqli_num_rows($query1);
	
	if(empty($email))
	{
		$msg0="E-Mail Required";
	}
	if(empty($password))
	{
		$msg1="Password Required";	
	}
	
	if (isset($msg0) || isset($msg1))
	{
		echo "";
	}
	else
	{
		$c_msg="Enter";
	}

 if(isset($c_msg))
 {
	if($tblrw>0)
	{
		while($rw=mysqli_fetch_array($query1))
		{
			if($password==$rw['password'])
			{
				@session_start();
				$_SESSION['provideremail']=$rw['email'];
				$_SESSION['providername']=$rw['providername'];
				header("Location:homeprovider.php");
				//echo '<script type="text/javascript"> window.open("mypbhome.php","_self");</script>';            //  On Successful Login redirects to mypbhome.php
			}
			else
			{
				echo "E-Mail & Password Does Not Match";
			}
		}
	}
	else 
	{
		echo "E-Mail Does Not Exists";
	}
 }
}
?>


<!doctype html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<title>Login - Provider</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<div class="container">
<div class="row">
<div class="col-xl-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
<a class="navbar-brand" href="index.php"><img src="images/logo.png" width="100px"  height="50px"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
</ul>
<ul class="navbar-nav">
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Job Seeker
      </a>
      <div class="dropdown-menu">
<a class="nav-link" href="regseeker.php">Register</a>
<a class="nav-link" href="loginseeker.php">Login</a>
      </div>
    </li>
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Job Provider
      </a>
      <div class="dropdown-menu">
<a class="nav-link" href="regprovider.php">Register</a>
<a class="nav-link" href="loginprovider.php">Login</a>
      </div>
    </li>
<li class="nav-item">
<a class="nav-link" href="jobsearch.php">JOB Search</a>
</li>
<li class="nav-item">
<a class="nav-link" href="aboutus.php">About Us</a>
</li>
<li class="nav-item">
<a class="nav-link" href="contactus.php">Contact Us</a>
</li>
</ul>
</div>
</nav>
</div>
</div>
</div>
</div>

<div class="heading">
<div class="container">
<div class="row">
<div class="col-xl-12">
<h2>Hi JOB Provider , Please LogIn to ndJOBS</h2><br><br>
</div>
</div>
</div>
</div>

<div class="form">
<div class="container">

<div class="row">
<div class="col-xl-6">
<form action="" method="post">
<p id="p1">E-Mail : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="email" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg0))
{
	echo $msg0;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="password" name="password" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg1))
{
	echo $msg1;
}
?></p><br>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1"><input type="submit" name="submit" value="Login"></p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Cancel" onclick="location.href='Index.php';"/></p>
</div>
</div><br>

</div>
</div>

<div id="footer">
<div class="container">
<div class="row">
<div class="col-xl-8">
<p>&copy; 2019 Copyrights ndJOBS IND-ALL RIGHTS RESERVED</p>
</div>
<div class="col-xl-4">
<img src="images/facebook.png">
<img src="images/twitter.png">
<img src="images/googleplus.png">
<img src="images/instagram.png">
</div>
</div>
</div>
</div>

</div>
</form>
</body>
</html>