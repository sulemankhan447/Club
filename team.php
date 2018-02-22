<!DOCTYPE html>
<html>
<head>
	<title>Programmers Club</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<?php
				require_once('connection.php');
				$formatCount = 0;
				$sql = "select * from team";
				$teamResults = mysqli_query($con,$sql) or die(mysqli_error($con));
				while($teamRow = mysqli_fetch_array($teamResults))
				{
					$formatCount++;
					echo '<div class="col-md-4">';
					echo '<img src="img/'.$teamRow['path'].'">';
					echo '<h4 style="font-weight:bold;" class="text-center">'.$teamRow['name'].'</h4>';
					echo '</div>';

				}//end of while loop
			?>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>