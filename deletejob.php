<?php
@session_start();
$jobid=$_GET['jobid'];
$cn=@mysqli_connect('localhost','root','','ndjobs') or die ('Something Went Wrong');


if(isset($_POST['submit']))
{
$delete1="delete from appliedjobs where jobid=".$jobid;
$query1=@mysqli_query($cn,$delete1) or die('query1 error');
$delete2="delete from jobs where jobid=".$jobid;
$query2=@mysqli_query($cn,$delete2) or die('query2 error');
if($query1 && $query2)
{
	echo "Deleted";
	header("refresh:1; url=providerjobs.php");
}
else
{
	echo "Not deleted";
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
<h1>Are you sure you want to unpublish this job <br><?php echo $_SESSION['providername'];?></h1>
</div>
</div>
</div>
</div>
<br>
<br>
<div class="button">
<div class="container">
<div class="row">
<div class="col-xl-12">
<form method="post" action="#"> 
<input type="submit" value="Yes" name="submit">
<input type="button" value="No" onclick="window.location.href='providerviewjob.php?jobid=<?php echo $jobid;?>'"/>
</form>
</div>
</div>
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
<body>
</html>