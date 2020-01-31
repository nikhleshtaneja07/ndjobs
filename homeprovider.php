<?php
@session_start();
$cn=@mysqli_connect('localhost','root','','ndjobs');
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
<h1>Welcome <?php echo $_SESSION['providername'];?></h1>
</div>
</div>
</div>
</div>


<?php
$select1="select * from appliedjobs where provideremail='".$_SESSION['provideremail']."'";
$query1=@mysqli_query($cn,$select1) or die('query1 error');
$tbrw=@mysqli_num_rows($query1);
if($tbrw>0)
 {
  while($rowdata=@mysqli_fetch_array($query1))
	{
?>
<div class="container">
<div class="jobs">
<div class="row">
<div class="col-xl-12">
	<p><?php
	$seekeremail=$rowdata['seekeremail'];
	$select2="select * from regseeker where email='".$seekeremail."'";		
    $query2=@mysqli_query($cn,$select2);
	$tbrw2=@mysqli_num_rows($query2);
	if($tbrw2>0)
	 {
	  while ($rowdata2=@mysqli_fetch_array($query2))
	  {
		?><a href="profileseeker.php?seekeremail=<?php echo $seekeremail;?>"><?php echo $rowdata2['firstname']." ".$rowdata2['lastname'];?></a><?php echo" has applied for your published job - ";
	  }
	 }
	$jobid=$rowdata['jobid'];
	$select3="select * from jobs where jobid='".$jobid."'";		
    $query3=@mysqli_query($cn,$select3);
	$tbrw3=@mysqli_num_rows($query3);
	if($tbrw3>0)
	 {
	  while ($rowdata3=@mysqli_fetch_array($query3))
	  {
	?><a href="viewjob.php?jobid=<?php echo $jobid;?>"><?php echo$rowdata3['title'];
	  }
	 }
	 ?></p> 
</div>
</div>
</div>
</div>
	<?php
	}
}
?>


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