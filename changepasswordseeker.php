<?php
@session_start();
$cn=@mysqli_connect('localhost','root','','ndjobs') or die ('Connection Lost');
if(isset($_POST['submit']))
{
    $passwordx=$_POST['passwordx'];
	$password=$_POST['password'];
	$pswdlnth=strlen($password);
	$conpswd=$_POST['conpswd'];
	$select1="select * from regseeker where email='".$_SESSION['seekeremail']."'";
	$query1=@mysqli_query($cn,$select1) or die("query 1");
	$tbrw=@mysqli_num_rows($query1);
	if($tbrw>0)
	{ 
      while ($rowdata=@mysqli_fetch_array($query1))
	  {
		  $oldpassword=$rowdata['password'];
	  }
		
	}
	
    if(empty($passwordx))
	{
		$msgx0="Old Password Required";	
	}
    else if($passwordx!=$oldpassword)
	{
	    $msgx1="Wrong Old Password!!!";
	}
	
    if(empty($password))
	{
		$msg0="Password Required";	
	}
	else if($pswdlnth<=4)
	{
	    $msg1="Password must be more than 4 characters";
	}
	else if(empty($conpswd))
	{
	    $msg3="Please Confirm Password";	
	}	
	else if($password!=$conpswd)
	{
		$msg4="Password Confirmation Failed";
	}
	
    if(isset($msg0) || isset($msg1) || isset($msg2) || isset($msg3) || isset($msgx0) || isset($msgx1))
    {
	 echo "";
    }
    else 
    {
		$c_msg="All Fields Are Filled Correct";
	}	

    if(isset($c_msg))
    {
		$update1="update regseeker set password='$password' where email='".$_SESSION['seekeremail']."'";
        $query2=mysqli_query($cn,$update1);
		if($query2)
		{
			?><script>alert("Password updated!!!");</script><?php
			header("refresh:1; url=editprofileseeker.php");
		}
		else
        {
	        ?><script>alert("Could not update your password!!!");</script><?php
        }
	}		
}	
?>
<!DOCTYPE html>
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
		
	<title>Password Change <?php echo $_SESSION['seekername'];?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">

<div id="header">
<div class="container">
<div class="row">
<div class="col-xl-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
<a class="navbar-brand" href="homeseeker.php"><img src="images/logo.png" width="100px"  height="50px"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
</ul>
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="homeseeker.php">Home</a>
</li>
<li class="nav-item">
<a class="nav-link" href="profileseeker.php">My Profile</a>
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
<li class="nav-item">
<a class="nav-link" href="logoutseeker.php">Log Out</a>
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
<h2>Password Change <?php echo $_SESSION['seekername'];?></h2>
</div>
</div>
</div>
</div>

<div class="form">
	<div class="container">


<form action="" method="post">
<div class="row">
<div class="col-xl-6">
<p id="p1">Old PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="password" name="passwordx" value=""></p>
<p  id="p3" style="color:red;"><?php
if (isset($msgx0))
{
	echo $msgx0;
}
?></p>
<p  id="p3" style="color:red;"><?php
if (isset($msgx1))
{
	echo $msgx1;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">New PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="password" name="password" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg0))
{
	echo $msg0;
}
?></p>
<p id="p3" style="color:red;"><?php
if (isset($msg1))
{
	echo $msg1;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">CONFIRM PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="password" name="conpswd" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg2))
{
	echo $msg2;
}
?></p>
<p id="p3" style="color:red;"><?php
if (isset($msg3))
{
	echo $msg3;
}
?></p>
</div>
</div>
</div>
</div>
<br>

<div class="submit">
<div class="container">
<div class="row">
<div class="col-xl-6">
<p id="p1"><input type="submit" name="submit" value="Update"></p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Cancel" onclick="location.href='profileseeker.php';"/></p><br><br>
</form>
</div>
</div>
</div>
</div>



<div id="footer">
<div class="container">
<div class="row">
<div class="col-xl-8">
<p>&copy; 2017 COPYRIGHTS New Life Christian Center UAB-ALL RIGHTS RESERVED</p>
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
<body>
</html>