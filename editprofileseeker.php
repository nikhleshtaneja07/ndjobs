<?php
if(isset($_GET['jobid']))
{ 
 echo $_GET['jobid'];
 $jobid=$_GET['jobid'];
}
@session_start();
$cn=@mysqli_connect('localhost','root','','ndjobs') or die ('Connection Lost');

if(isset($_POST['upload']))
{
  if(isset($_FILES['resume']))
   {
	   
    $f_name=$_FILES['resume']['name'];
	$f_tmp_name=$_FILES['resume']['tmp_name'];
	$f_size=$_FILES['resume']['size'];
	$f_extension=explode('.',$f_name);
	$f_extension=end($f_extension);
	$f_extension=strtolower($f_extension);
	$f_newname=uniqid().".".$f_extension;
	$store="uploads/".$f_newname;
	if($f_extension=='docx'||$f_extension=='doc'||$f_extension=='pdf')
	{
     if($f_size>=1048577)
     {
      ?><script>alert("File size must be less than 1MB!!!");</script><?php
	 }
     else
     {
	  if(move_uploaded_file($f_tmp_name,$store))
	  {
		$update3="update seekerdata set resumefname='$f_newname' where email='".$_SESSION['seekeremail']."'"; 
        $query5=mysqli_query($cn,$update3) or die("query5 error");
	   ?><script>alert("Resume Uploaded!!!");</script><?php
	  }
     }		 
	}
    else if($f_size==0)
	{
	 ?><script>alert("Please choose a file!!!");</script><?php
	}
	else
	{
	 ?><script>alert("You can only upload 'docx', 'doc' or 'pdf' file types!!!");</script><?php
	}
   
   }
   else
   {
	 ?><script>alert("Please choose a file to upload!!!");</script><?php
   }
}	

if (isset($_POST['submit']))
{
	
	$firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$phone=$_POST['phone'];
	$curaddress=$_POST['curaddress'];
	$qualification=$_POST['qualification'];
	$course=$_POST['course'];
	$college=$_POST['college'];
	$yop=$_POST['yop'];
	$designation=$_POST['designation'];
	$company=$_POST['company'];
	$yoe=$_POST['yoe'];
	$ctc=$_POST['ctc'];

    
	if(empty($firstname))
	{
		$msg0="First Name Required";
	}
 
 
 	if(empty($lastname))
	{
		$msg1="Second Name Required";
	}
	 
 
 	if(empty($dob))
	{
		$msg2="Please Provide Date of Birth";
	}
	 
 
 	if(empty($gender))
	{
		$msg3="Please Provide your Gender";
	}
	 
 
 	if(empty($phone))
	{
		$msg4="Phone Number Required";
	}
	 
 
 	if(empty($curaddress))
	{
		$msg5="What is your Current Address?";
	}
	 
 
 	if(empty($qualification))
	{
		$msg6="Please choose your Qualification";
	}
	 
 
 	if(empty($course))
	{
		$msg7="Please choose your Course";
	}
	 
 
 	if(empty($college))
	{
		$msg8="Name of your College/University";
	}
	 
 
 	if(empty($yop))
	{
		$msg9="Year of passing of your course";
	}
	 
 
 	if(empty($designation))
	{
		$msg10="Please give your current Job Title";
	}
	 
 
 	if(empty($company))
	{
		$msg11="Please provide your Current Employer";
	}
	 
 
 	if(empty($yoe))
	{
		$msg12="How many years of work experience do you have?";
	}
	 
 
 	if(empty($ctc))
	{
		$msg13="What is your Current CTC?";
	}
	
 
if (isset($msg0) || isset($msg1) || isset($msg2) || isset($msg3) || isset($msg4) || isset($msg5) || isset($msg6) || isset($msg7) || isset($msg8) || isset($msg9) || isset($msg10) || isset($msg11) || isset($msg12) || isset($msg13))
	{
		echo "";
	}
	else
	{
		$c_msg="All Fields Are Filled Correct";
	}

 if(isset($c_msg))
 {
     $update1="update regseeker set firstname='$firstname', lastname='$lastname', dob='$dob', gender='$gender', phone='$phone', curaddress='$curaddress' where email='".$_SESSION['seekeremail']."'";
     $query3=mysqli_query($cn,$update1);
	 $update2="update seekerdata set qualification='$qualification', course='$course', college='$college', yop='$yop', designation='$designation', company='$company', yoe='$yoe', ctc='$ctc' where email='".$_SESSION['seekeremail']."'"; 
     $query4=mysqli_query($cn,$update2);
     if ($query3 and $query4)
     {
		 $_SESSION['seekername']=$firstname." ".$lastname;
	     ?><script>alert("Profile updated!!!");</script><?php
	     if(isset($jobid))
	     {
	     	header("Location:viewjob.php?jobidx=".$jobid);
	     }
	     else
	     {
         header("refresh:1; url=homeseeker.php");	
         }	 
     }
     else
     {
	     ?><script>alert("Could not update your profile!!!");</script><?php
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

	<title>Edit Profile - <?php echo $_SESSION['seekername'];?></title>
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
<h2>Edit Profile - <?php echo $_SESSION['seekername']?></h2>
</div>
</div>
</div>
</div>


<?php
$cn=@mysqli_connect('localhost','root','','ndjobs') or die ('Connection Lost');
$select1="select * from regseeker where email='".$_SESSION['seekeremail']."'";
$query1=@mysqli_query($cn,$select1) or die("query 1");
$tbrw=@mysqli_num_rows($query1);
$rowdata=@mysqli_fetch_array($query1);
	
$select2="select * from seekerdata where email='".$_SESSION['seekeremail']."'";
$query2=@mysqli_query($cn,$select2) or die("query 1");
$tbrw2=@mysqli_num_rows($query2);
$rowdata2=@mysqli_fetch_array($query2);		
?>

<div class="form">
<div class="container">

<form action="" method="post" enctype="multipart/form-data">	
<div class="row">
<div class="col-xl-6">
<br><p id="p1">Please Upload Your Resume :</p>
</div>
<div class="col-xl-6">
<br><p id="p2"><input type="file" name="resume"></p>
<p id="p2"><input type="submit" name="upload" value="Upload"></p>
</div>
</div>
</form>

<form action="" method="post">
<div class="row">
<div class="col-xl-12">	        
<h3>PERSONAL DETAILS</h3>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">FIRST NAME :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="firstname" value="<?php echo $rowdata['firstname']?>"></p><p id="p3"><?php if(isset($msg0)){ echo $msg0;} ?></p>
</div>
</div>

<div class="row">
<div class="col-xl-6">
<p id="p1">LAST NAME :</p>
</div>
<div class="col-xl-6">	
<p id="p2"><input type="text" name="lastname" value="<?php echo $rowdata['lastname']?>"></p><p id="p3"><?php if(isset($msg1)){ echo $msg1;} ?></p>
</div>
</div>
	
<div class="row">
<div class="col-xl-6">
<p id="p1">EMAIL :</p>
</div>
<div class="col-xl-6">
<p id="p2"><?php echo $rowdata['email']?></p><p id="p3">E-Mail can't be changed.</p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">PASSWORD :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Change Password" onclick="location.href='changepasswordseeker.php';"/></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">DATE OF BIRTH :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="date" name="dob" value="<?php echo $rowdata['dob']?>"></p><p id="p3"><?php if(isset($msg2)){ echo $msg2;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">GENDER :</p>
</div>
<div class="col-xl-6">
<p id="p2" style="padding: 5px 0px 5px 0px;"><input type="radio" name="gender" value="<?php echo $rowdata['gender']?>"checked><?php echo $rowdata['gender']?><br><input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<input type="radio" name="gender" value="Other">Other</p><p id="p3"><?php if(isset($msg3)){ echo $msg3;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">PHONE NUMBER :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="number" name="phone" min="1000000000" max="9999999999" value="<?php echo $rowdata['phone']?>"></p><p id="p3"><?php if(isset($msg4)){ echo $msg4;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">CURRENT ADDRESS :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="curaddress" value="<?php echo $rowdata['curaddress']?>"></p><p id="p3"><?php if(isset($msg5)){ echo $msg5;} ?></p>
</div>
</div>

<div class="row">
<div class="col-xl-12">
<br><h3>EDUCATION DETAILS</h3><br>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">QUALIFICATION :</p>
</div>
<div class="col-xl-6">
<p id="p2"><select name="qualification">
<option value="<?php echo $rowdata2['qualification']?>"><?php echo $rowdata2['qualification']?></option>
<option value="High School">High School</option>
<option value="Diploma">Diploma</option>
<option value="Graduation">Graduation</option>
<option value="Post Graduation">Post Graduation</option>
<option value="Ph.D">Ph.D</option>
</select></p><p id="p3"><?php if(isset($msg6)){ echo $msg6;} ?></p>
</div>
</div>
			
			
<div class="row">
<div class="col-xl-6">
<p id="p1">COURSE :</p>
</div>
<div class="col-xl-6">
<p id="p2"><select name="course">
<option value="<?php echo $rowdata2['course']?>"><?php echo $rowdata2['course']?></option>
<option value="BA">BA</option>
<option value="BBA">BBA</option>
<option value="B.Comm">B.Comm</option>
<option value="BCA">BCA</option>
<option value="B.Tech">B.Tech</option>
</select></p><p id="p3"><?php if(isset($msg7)){ echo $msg7;} ?></p>
</div>
</div>
			
			
<div class="row">
<div class="col-xl-6">
<p id="p1">COLLEGE/UNIVERSITY :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="college" value="<?php echo $rowdata2['college']?>"></p><p id="p3"><?php if(isset($msg8)){ echo $msg8;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">YEAR OF PASSING :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="yop" value="<?php echo $rowdata2['yop']?>"></p><p id="p3"><?php if(isset($msg9)){ echo $msg9;} ?></p>
</div>
</div>

<div class="row">
<div class="col-xl-12">
<br><h3>EMPLOYMENT DETAILS</h3><br>	   
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">DESIGNATION :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="designation" value="<?php echo $rowdata2['designation']?>"></p><p id="p3"><?php if(isset($msg10)){ echo $msg10;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">COMPANY :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="company" value="<?php echo $rowdata2['company']?>"></p><p id="p3"><?php if(isset($msg11)){ echo $msg11;} ?></p>
</div>
</div>
			
<div class="row">
<div class="col-xl-6">
<p id="p1">YEARS OF EXPERIENCE :</p>
</div>
<div class="col-xl-6">
<p id="p2"><select name="yoe">
<option value="<?php echo $rowdata2['yoe']?>"><?php echo $rowdata2['yoe']?></option>
<option value="Fresher">Fresher</option>
<option value="1+">1+</option>
<option value="2+">2+</option>
<option value="3+">3+</option>
<option value="4+">4+</option>
<option value="5+">5+</option>
<option value="6+">6+</option>
<option value="7+">7+</option>
</select><p id="p3"><?php if(isset($msg12)){ echo $msg12;} ?></p>
</div>
</div>
			
			
<div class="row">
<div class="col-xl-6">
<p id="p1">CTC :</p>
</div>
<div class="col-xl-6">
<p id="p2"><input type="text" name="ctc" value="<?php echo $rowdata2['ctc']?>"></p><p id="p3"><?php if(isset($msg13)){ echo $msg13;} ?></p>
<br>
</div>
</div>

<div class="submit">
<div class="row">
<div class="col-xl-6">
<p id="p1">		
<input type="submit" name="submit" value="Update"><br><br>
</div>
<div class="col-xl-6">
<p id="p2"><input type="button" value="Cancel" onclick="location.href='profileseeker.php';"/></p><br><br>
</div>
</div>
</div>

</form>
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
</body>
</html>