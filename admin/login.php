<?php
    require 'models/Model_for_all.php';
    require 'models/Model_register_login.php';
	require 'models/Model_students.php';
    require 'models/Model_subscription.php';
    require 'models/Model_schoolroom.php';
    require 'models/Model_absence.php';

	if (isset($_GET['session']) == "logout") {
		$model_logout = new Model_register_login();
		$model_logout->logout();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
					<div class="panel-body">
<?php
	$model_login = new Model_register_login();
	if (isset($_POST['login_btn'])) {
		$model_login->login($username, $password);
	}
?>					
						<form role="form" method="post">

							<div class="form-group">
								<input class="form-control" placeholder="User Name" name="username" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button type="submit" name="login_btn" class="btn btn-primary">دخول</button>
							<a href="register.php" class="btn btn-primary m-3">تسجيل جديد</a>
						</form>
					</div>					
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
