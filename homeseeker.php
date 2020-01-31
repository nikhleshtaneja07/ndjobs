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
	
    <title>ndJOBS - <?php echo $_SESSION['seekername'];?></title>
	<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from
      var selectedEffect = "slide";
 
      // Most effect types need no options passed by default
      var options = {};
      
 
      // Run the effect
      $( "#effect" ).effect( selectedEffect, options, 500, callback );
    };
 
    // Callback function to bring a hidden box back
    function callback() {
      setTimeout(function() {
        $( "#effect" ).removeAttr( "style" );
      });
    };
 
    // Set effect from select menu value
    $(document).ready(function(){
      runEffect();
      return false;
  });
  });
  </script>
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
<h1>Welcome <?php echo $_SESSION['seekername'];?></h1>
</div>
</div>
</div>
</div>

<?php 
$select1="select * from appliedjobs where seekeremail='".$_SESSION['seekeremail']."'";
$query1=@mysqli_query($cn,$select1) or die ('query1 error');
$tbrw=@mysqli_num_rows($query1);
if($tbrw>0)
	{		
	while ($rowdata=@mysqli_fetch_array($query1))
	{
		$jobid=$rowdata['jobid'];
	    $select2="select * from jobs where jobid='".$jobid."'";		
       	$query2=@mysqli_query($cn,$select2);
	    $tbrw2=@mysqli_num_rows($query2);
		if($tbrw2>0)
		{
	    while ($rowdata=@mysqli_fetch_array($query2))
		{
?>
<div class="toggler">
<div id="effect" class="ui-widget-content ui-corner-all">
<div class="container">
<div class="jobs">
<div class="row">
<div class="col-xl-12">
    <h4><?php echo $rowdata['title']?></h4>
	<p><?php echo $rowdata['company']?></p>
    <p><?php echo $rowdata['location']?></p>
	<p><?php echo $rowdata['yoe']?></p>
	<p><?php echo $rowdata['salary']?></p>
	<p1><?php echo substr($rowdata['description'],0,100)?></p1><br><br>
	  
</div>
</div>
</div>
</div>
<?php
	}
	}
	}
    }
?>
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