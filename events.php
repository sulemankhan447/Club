<?php
	if(empty($_GET['name']))
	{
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title><?php echo $_GET['name'];?></title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="icon" type="image/icon" href="img/icon.png">
</head>

<body>

	<!-- Header -->
	<header>

		<!-- Nav -->
		<nav id="nav" class="navbar">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="img/logo.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="team.php">Team</a></li>
					<li class="has-dropdown"><a href="#blog">Events</a>
						<ul class="dropdown">
							<?php
								require_once('connection.php');
								$sql = 'select * from event';
								$eventResults = mysqli_query($con,$sql) or die(mysqli_error($con));
								while($eventRow = mysqli_fetch_array($eventResults))
								{
									echo '<li><a href="events.php?name='.$eventRow['name'].
										'">'.$eventRow['name'].'</a></li>';
								}
							?>
						</ul>
					</li>
					<li class="has-dropdown"><a href="#blog">Workshop</a>
						<ul class="dropdown">
							<?php
								$sql = 'select * from workshop';
								$workshopResults = mysqli_query($con,$sql) or die(mysqli_error($con));
								while($workshopRow = mysqli_fetch_array($workshopResults))
								{
									echo '<li><a href="workshops.php?name='.$workshopRow['name'].
										'">'.$workshopRow['name'].'</a></li>';
								}							
							?>
						</ul>
					</li>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- header wrapper -->
		<div class="header-wrapper sm-padding bg-grey">
			<div class="container">
				<h2><?php echo $_GET['name'];?></h2>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.html">Home</a></li>
					<li class="breadcrumb-item"><a href="#"><?php echo $_GET['name'];?></a></li>
					<li class="breadcrumb-item"><a href="certificate.php?type=<?php echo $_GET['name'];?>">Certificates</a></li>
				</ul>
			</div>
		</div>
		<!-- /header wrapper -->

	</header>
	<!-- /Header -->
	<div class="container">
		<div class="row">
						<div class="blog-author">
							<div class="media">
								<div class="media-body">
									<?php
										$event_name = $_GET['name'];
										$sql = "select * from event where name='$event_name'";
										$results = mysqli_query($con,$sql) or die(mysqli_error($con));
										$row = mysqli_fetch_array($results);
										echo '<p>'.$row['content'].'</p>';
										echo '<p>Date : '.$row['start_date'].'-'.$row['end_date'].'</p>';
									?>
								</div><!-- media body-->
							</div><!-- media-->
						</div><!-- /blog author -->
			
		</div>
	</div>
	<!-- Blog -->
	<div id="blog" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">
						<!-- blog author -->
						<div class="blog-author">
							<div class="media">
								<div class="media-body">
									<?php
										$event_name = $_GET['name'];
										$sql = "select * from event where name='$event_name'";
										$results = mysqli_query($con,$sql) or die(mysqli_error($con));
										$row = mysqli_fetch_array($results);
										echo '<p>'.$row['content'].'</p>';
										echo '<p>'.$row['start_date'].'</p>';
										echo '<p>'.$row['end_date'].'</p>';
									?>
								</div><!-- media body-->
							</div><!-- media-->
						</div><!-- /blog author -->
			</div><!-- /Row -->
			<div class="row">
					<?php

						$printCount = 0;
						$sql = "select * from images where type='$event_name' LIMIT 4";
						$imageResults = mysqli_query($con,$sql) or die(mysqli_error($con));
						while($imageRow = mysqli_fetch_array($imageResults))
						{

								$printCount++;
								echo '<div class="col-md-6">';
									echo '<img style="height:300px;width:500px;" src="img/'.$imageRow['path'].'/'.$imageRow['name'].'">';				
								echo '</div>';
								if($printCount%2==0)
								{
									echo '</div>';
									echo '<br>';
									echo '<br>';
									echo '<div class="row">';
								}		

						}
					?>
				</div><!-- row end-->
		</div><!-- /Container -->

	</div><!-- /Blog -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html"><img src="img/footer-logo.png" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Programmers Club</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>
