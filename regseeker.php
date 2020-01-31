<?php
if(isset($_GET['jobid']))
{ 
 echo $_GET['jobid'];
 $jobid=$_GET['jobid'];
}
@session_start();
if(isset($_SESSION['seekeremail']))
{
	header("Location:homeseeker.php?jobid=".$jobid);
}
$cn=mysqli_connect('localhost','root','','ndjobs') or die ('Could Not Establish Connection With Database');
if (isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$curaddress=$_POST['curaddress'];
	$password=$_POST['password'];
	$pswdlnth=strlen($password);
	$conpswd=$_POST['conpswd'];
	
	
	
	$select1="select email from regseeker where email='$email'";
	$query1=mysqli_query($cn,$select1) or die ('Error Finding Records In The Database');
	$tblrw=mysqli_num_rows($query1);
	
 	if(empty($firstname))
	{
		$msg6="First Name Required";
	}
 
 
 	if(empty($lastname))
	{
		$msg7="Second Name Required";
	}
	 
 
 	if(empty($dob))
	{
		$msg8="Please Provide Date of Birth";
	}
	 
 
 	if(empty($phone))
	{
		$msg9="Phone Number Required";
	}
	 
 
 	if(empty($curaddress))
	{
		$msg10="What is your Current Address?";
	}
	
	
	if(empty($email))
	{
		$msg0="E-Mail Required";
	}
	else if($tblrw>0)
	{
		$msg1="E-Mail EXISTS";
	}
	
	
	if(empty($password))
	{
		$msg2="Password Required";	
	}
	else if($pswdlnth<=4)
	{
	    $msg3="Password must be more than 4 characters";
	}
	else if(empty($conpswd))
	{
	    $msg4="Please Confirm Password";	
	}	
	else if($password!=$conpswd)
	{
		$msg5="Password Confirmation Failed";
	}
	
 
if (isset($msg0) || isset($msg1) || isset($msg2) || isset($msg3) || isset($msg4) || isset($msg5) || isset($msg6) || isset($msg7))
	{
		echo "";
	}
	else
	{
		$c_msg="All Fields Are Filled Correct";
	}

 if(isset($c_msg))
 {
     $insert1="insert into regseeker (firstname,lastname,email,password,dob,gender,phone,curaddress) values ('$firstname','$lastname','$email','$password','$dob','$gender','$phone','$curaddress')";
     $query2=mysqli_query($cn,$insert1);
	 $insert2="insert into seekerdata(email) values ('".$email."')";
     $query3=mysqli_query($cn,$insert2);
     if ($query2 and $query3)
     {
		 $select2="select * from regseeker where email='$email' ";
	     $query4=mysqli_query($cn,$select2) or die('Error Finding Records In The Database');
	     $rw=mysqli_fetch_array($query4);
		 @session_start();
		 $_SESSION['seekeremail']=$rw['email'];
		 $_SESSION['seekername']=$rw['firstname']." ".$rw['lastname'];
		 header("Location:editprofileseeker.php?jobid=".$jobid);	   
     }
     else
     {
	     echo "Registration Failed";
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

<title>Registration - Job Seeker</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">

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
<h2>HELLO JOB SEEKER, PLEASE REGISTER YOURSELF TO ndJOBS</h2><br><br>
</div>
</div>
</div>
</div>

<div class="form">
<div class="container">

<div class="row">
<div class="col-xl-6">
<form action="" method="post">
<p id="p1">FIRST NAME : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="firstname" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg6))
{
	echo $msg6;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">LAST NAME : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="lastname" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg7))
{
	echo $msg7;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
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
<p id="p1">PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="password" value=""></p>
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

<div class="row">
<div class="col-xl-6">
<p id="p1">CONFIRM PASSWORD : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="password" name="conpswd" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg4))
{
	echo $msg4;
}
?></p>
<p id="p3" style="color:red;"><?php
if (isset($msg5))
{
	echo $msg5;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">DATE OF BIRTH : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="date" name="dob" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg8))
{
	echo $msg8;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">GENDER : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="radio" name="gender" value="Male"checked> Male <input type="radio" name="gender" value="Female"> Female <input type="radio" name="gender" value="Other"> Other </p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">PHONE : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="number" name="phone" value="" min="1000000000" max="9999999999" placeholder="10 Digits"></p>
<p id="p3" style="color:red;"><?php
if (isset($msg9))
{
	echo $msg9;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">CURRENT ADDRESS : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="curaddress" value=""></p>
<p id="p3" style="color:red;"><?php
if (isset($msg10))
{
	echo $msg10;
}
?></p>
</div>
</div>
<br>

<div class="row">
<div class="col-xl-6">
<p id="p1"><input type="submit" name="submit" value="Register"></p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Cancel" onclick="location.href='Index.php';"/></p>
<p id="p3" style="color:green;"><?php
if (isset($c_msg))
{
	echo $c_msg;
}
?></p>
</div>
</div><br>
</form>
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

</body>
</html>





