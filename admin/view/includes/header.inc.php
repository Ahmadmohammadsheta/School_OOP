<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
} else {
	require 'models/Model_for_all.php';
	require 'models/Model_students.php';
    require 'models/Model_subscription.php';
    require 'models/Model_schoolroom.php';
    require 'models/Model_absence.php';
    require 'models/Model_register_login.php';
    require 'models/Model_teachers.php';
}



?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
										<br /><small class="text-muted">1:24 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
										<br /><small class="text-muted">12:27 pm - 25/03/2015</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
										<em class="fa fa-inbox"></em> <strong>All Messages</strong>
									</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-bell"></em><span class="label label-info">5</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
									<div><em class="fa fa-envelope"></em> 1 New Message
										<span class="pull-right text-muted small">3 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-heart"></em> 12 New Likes
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
							<li class="divider"></li>
							<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span>
									</div>
								</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	