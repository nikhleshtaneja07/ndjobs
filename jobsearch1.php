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

	<title></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$cn=@mysqli_connect('localhost','root','','ndjobs');
$find=$_POST['find'];
$select1="select * from jobs where keywords like '%".$find."%'";
	$query1=@mysqli_query($cn,$select1) or die ("query1 error");
	$tbrw=@mysqli_num_rows($query1);
	if($tbrw>0)
	{
		while ($rowdata=@mysqli_fetch_array($query1))
	
	{	
?>
    <h4><?php echo $rowdata['title']?></h4>
	<p><?php echo $rowdata['company']?></p>
    <p><?php echo $rowdata['location']?></p>
	<p><?php echo $rowdata['yoe']?></p>
	<p><?php echo $rowdata['salary']?></p>
	<p1><?php echo substr($rowdata['description'],0,100);?></p1><br><br>
<?php
    }
    }
?>
</body>
</html>