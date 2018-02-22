<?php
	if(empty($_GET['type']))
	{
		header("Location:index.php");
	}
	echo '<link rel="stylesheet" href="css/bootstrap.min.css"></link>';
	require_once('connection.php');
	$type = $_GET['type'];
	$sql = "select * from participants where type='$type'";
	$participantsResults = mysqli_query($con,$sql) or die(mysqli_error($con));
	if(!mysqli_num_rows($participantsResults)>0)
	{
		header("Location:index.php");
	}
	echo '<h4 class="text-center">Participants For '.$_GET['type'].'</h4>';
	echo '<table class="table table-bordered table-hover">';
	while($participantsRow = mysqli_fetch_array($participantsResults))
	{

		echo '<tr>';
		echo '<td>'.$participantsRow['name'].'</td>';
		echo '<td><a href="viewCertificate.php?name='.$participantsRow['name'].'&type='.$participantsRow['type'].'" download>View Certificate</a></td>';
		echo '</tr>';
	}

?>