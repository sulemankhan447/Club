<?php
	if(empty($_GET['type'] || empty($_GET['name'])))
	{
		header("Location:index.php");
	}
	else
	{
		require_once('connection.php');
		$name = $_GET['name'];
		$type = $_GET['type'];
		$sql = "select * from participants where name='$name' and type='$type'";
		$participantsResults = mysqli_query($con,$sql) or die(mysqli_error($con));
		if(!mysqli_num_rows($participantsResults)>0)
		{
			header("Location:index.php");
		}		
	}
?>
<center>
	<table border="0" cellspacing="10" background="img/certificate_border.png">
	<tr>
		<td align="center">
		<img src="img/spacer.gif" width="415" height="3"><br>
		<h1><?php echo  "Programmers Club"; ?></h1>
		
		In recognition of successfully completing the course:<br>
		<strong>PHP Basics</strong>
		
		<h2>
			<?php echo  "Khan Suleman"; ?><br>
			<?php echo  "Developer"; ?>	
		</h2>
		
		<i>is hereby awarded this</i>
		
		<h3>Certificate of Completion</h3>
						
		<i>Given this day, <?php echo  date('h:i:s m:d:Y'); ?><br>
		<img src="img/spacer.gif" width="415" height="20">
		</td>
	</tr>		
	</table>
</center>