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
	
<?php if(isset($_SESSION['seekeremail']))
{
echo '<title>JOB Search ndJOBS - '.$_SESSION["seekername"].'</title>';
}
else
{
echo '<title>JOB Search ndJOBS</title>';
}
?>
	<link rel="stylesheet" href="style.css">
</head>
<script>
$(document).ready(function(){
    $(".jobsfind").hide();
	
	$('.search').keyup(function(){
		$(".jobsfind").show();
		var search=$(this).val();
		var searchlen=$(this).val().length;
		if(searchlen>0)
		{
		$('.jobs').hide();	
		$.post("jobsearch1.php",{find:search},function(data,success){
		$(".jobsfind").html(data);
		});
		}
		if(searchlen==0)
		{
		$(".jobsfind").hide();
		$('.jobs').show();
		}	
	});
});
</script>
<body>
<div class="main">

<div id="header">
<div class="container">
<div class="row">
<div class="col-xl-12">
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
<?php 
if (isset($_SESSION['seekeremail']))
{
  echo '<a class="navbar-brand" href="homeseeker.php">';
}
else if(isset($_SESSION['provideremail']))
{
  echo '<a class="navbar-brand" href="homeprovider.php">';
}
else
{
  echo '<a class="navbar-brand" href="index.php">';
}
?>
<img src="images/logo.png" width="100px"  height="50px"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="navbar-nav mr-auto">
</ul>
<ul class="navbar-nav">
  <?php
  if (isset($_SESSION['seekeremail']))
    {
      echo '<li class="nav-item">
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
</li>';
    }
 else if (isset($_SESSION['provideremail']))
    {
      echo '<li class="nav-item">
<a class="nav-link" href="homeprovider.php">Home</a>
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
<a class="nav-link" href="logoutseeker.php">Log Out</a>
</li>';
    }
    else 
    {
      echo '<li class="nav-item dropdown">
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
</li>';
    }

?>
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
<div class="col-xl-12 heading">
<h1>Job Search</h1><br><br>
</div>
</div>
</div>
</div>

<div class="container">
<div class="searchbar">
<div class="row">
<div class="col-xl-1">
<p>Search</p>
</div>
<div class="col-xl-11">
<input class="search" type="text" name="" value="" placeholder="Enter Job Title or Company">
</div>
</div>
</div>
</div>

<div class="container">
<div class="jobsfind">
<div class="row">
<div class="col-xl-12">
</div>
</div>
</div>
</div>

<?php
    $select1="select * from jobs order by jobid desc";
	$query1=@mysqli_query($cn,$select1);
	$tbrw=@mysqli_num_rows($query1);
	if($tbrw>0)
	{
		while ($rowdata=@mysqli_fetch_array($query1))
	{	
?>
<div class="container">
<div class="jobs">
<div class="row">
<div class="col-xl-12">
    <h4><a href="viewjob.php?jobid=<?php echo $rowdata['jobid'];?>"><?php echo $rowdata['title']?></a></h4>
	<p><?php echo $rowdata['company']?></p>
    <p><?php echo $rowdata['location']?></p>
	<p><?php echo $rowdata['yoe']?></p>
	<p><?php echo $rowdata['salary']?></p>
	<p1><?php echo substr($rowdata['description'],0,100);?>...</p1>
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
</body>
</html>