<?php
@session_start();
if(isset($_SESSION['provideremail']))
{
	
}
$cn=mysqli_connect('localhost','root','','ndjobs') or die ('Could Not Establish Connection With Database');
if (isset($_POST['submit']))
{
    $title=$_POST['title'];
    $company=$_POST['company'];
	$location=$_POST['location'];
	$yoe=$_POST['yoe'];
	$salary=$_POST['salary'];
	$description=$_POST['description'];
	$keywords=$_POST['keywords'];
	$select1="select email from regprovider where email='".$_SESSION['provideremail']."'";
	$query1=mysqli_query($cn,$select1) or die ('errer ');
	$tblrw=mysqli_num_rows($query1);

	
 	if(empty($title))
	{
		$msg1="Title Required";
	}
    if(empty($company))
	{
		$msg2="Company Name Required";
	}
	if(empty($location))
	{
		$msg3="Location Required";
	}
	if(empty($yoe))
	{
		$msg4="Years Of Expierence Required";
	}
	if(empty($salary))
	{
		$msg5="Salary Required";
	}
	if(empty($description))
	{
		$msg6="Description Required";
	}
	if(empty($keywords))
	{
		$msg7="Keywords Required";
	}
if (isset($msg1) || isset($msg2) || isset($msg3) || isset($msg4) || isset($msg5) || isset($msg6)|| isset($msg7))
	{
		echo "";
	}
	else
	{
		$c_msg="All Fields Are Filled Correct";
	}

 if(isset($c_msg))
 {
    $insert1="insert into jobs (email,title,company,location,yoe,salary,description,keywords) values ('".$_SESSION['provideremail']."','$title','$company','$location','$yoe','$salary','$description','keywords')";
    $query2=@mysqli_query($cn,$insert1) or die(@mysqli_error($cn));
   if($query2)  
	{
       echo "Form Submitted"."<br>";
	}
	else
	{
		echo "Form Not Submitted"."<br>";
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
	
    <title>ndJOBS - <?php echo $_SESSION['providername'];?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">

<div id="header">
<div class="container">
<div class="row">
<div class="col-xl-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
<a class="navbar-brand" href="homeprovider.php"><img src="images/logo.png" width="100px"  height="50px"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
</ul>
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="homeprovider.php">Home</a>
</li>
</li>
<li class="nav-item">
<a class="nav-link" href="providerjobs.php">My JOBS</a>
</li>
<li class="nav-item">
<a class="nav-link" href="addjobs.php">Publish JOBS</a>
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
<a class="nav-link" href="logoutprovider.php">Log Out</a>
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
<h2>Publish Job</h2><br><br>
</div>
</div>
</div>
</div>

<div class="form">
<div class="container">

<div class="row">
<div class="col-xl-6">
<form action="" method="post">
<p id="p1">Title : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="title" value="" placeholder="Title"></p>
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
<p id="p1">Company : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="company" value="" placeholder="Company"></p>
<p id="p3" style="color:red;"><?php
if (isset($msg2))
{
	echo $msg2;
}
?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">Location : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="location" value="" placeholder="Location"></p>
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
			<p id="p1">YEARS OF EXPERIENCE :</p>
			</div>
<div class="col-xl-6">
			<p id="p2"><select name="yoe">
			<option value="<?php echo $rw['yoe']?>"></option>
			<option value="Fresher">Fresher</option>
			<option value="1+">1+</option>
			<option value="2+">2+</option>
			<option value="3+">3+</option>
			<option value="4+">4+</option>
			<option value="5+">5+</option>
			<option value="6+">6+</option>
			<option value="7+">7+</option>
			</select><p id="p3"><?php if(isset($msg4)){ echo $msg4;} ?></p>
			</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">Salary : </p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="salary" value="" placeholder="Salary"></p>
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
<p id="p1">Description : </p>
</div>
<div class="col-xl-6">
<p id="p2"><textarea name="description" placeholder="Enter text here..."></textarea></p>
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
<p id="p1">Keywords : </p>
</div>
<div class="col-xl-6">
<p id="p2"><textarea name="keywords" placeholder="Enter keywords which you want to display"></textarea></p>
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
<p id="p1"><input type="submit" name="submit" value="Publish"></p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Cancel" onclick="window.location.href='homeprovider.php';"/></p>
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





