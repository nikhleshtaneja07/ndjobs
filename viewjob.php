<?php
@session_start();
if(isset($_GET['jobid']))
{
$jobid=$_GET['jobid'];
}
else if (isset($_GET['jobidx']))
{
$jobid=$_GET['jobidx'];
echo $jobid;	
}
$cn=@mysqli_connect('localhost','root','','ndjobs');
if(isset($_POST['submit']) && isset($jobid))
{
$provideremail=$_POST['provideremail'];
$insert1="insert into appliedjobs (jobid,seekeremail,provideremail) values ('".$jobid."','".$_SESSION['seekeremail']."','".$provideremail."')";
$query1=@mysqli_query($cn,$insert1) or die ('query1 error');
if($query1)
{?>
<script>alert('Job has been applied');</script><?php
}
else
{
?>
<script>alert('There was a problem applying your job');</script>
<?php
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
<?php if(isset($_SESSION['provideremail']))
{
echo '<title>ndJOBS - '.$_SESSION["providername"].'</title>';
}
else
{
echo '<title>ndJOBS</title>';
}
?>
<link rel="stylesheet" href="style.css">
</head>
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
<div class="col-xl-12">

<h1>ndJOBS</h1>
</div>
</div>
</div>
</div>

<?php $select1="select * from jobs where jobid='".$jobid."'";
	$query2=@mysqli_query($cn,$select1);
	$tbrw=@mysqli_num_rows($query2);
	if($tbrw>0)
	{
		while ($rowdata=@mysqli_fetch_array($query2))
	
	{	

		?>
<div class="container">
<div class="jobs">
<div class="row">
			<div class="col-xl-12">
    <h4><?php echo $rowdata['title']?></h4>
	<p><?php echo $rowdata['company']?></p>
    <p><?php echo $rowdata['location']?></p>
	<p><?php echo $rowdata['yoe']?></p>
	<p><?php echo $rowdata['salary']?></p>
	<p1><?php echo $rowdata['description']?></p1><br><br>
	<?php
	if(isset($_SESSION['provideremail']))
	{
		echo '';
	}
	else if(isset($_SESSION['seekeremail']))
	{
	?><form method="post" action="#">
	<input type="hidden" name="provideremail" value="<?php echo $rowdata['email']?>">
	  <input type="submit" name="submit" value="Apply"/>
	  </form>
	<?php
	}
	else
	{
	?>
		<input type="button" value="Apply" onclick="window.location.href='regseeker.php?jobid=<?php echo $jobid;?>'">
    <?php
	}
	?>
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
