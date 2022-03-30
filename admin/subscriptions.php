<?php
	$active = 'subscriptions';
	include 'view/includes/header.inc.php';
	include 'view/includes/sidebar.inc.php';

?>



		

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
<?php
	include 'view/includes/search.inc.php';
?>
			<!-- <div class="col-md-2">
				<input type="month" name="month" class="input-group"  value="" style="width: 100px;">
			</div>
			<div class="col-md-2">
				<button type="submit" class="btn btn-success" style="margin-bottom: 5px;">شهر</button>  
			</div> -->
		</div>
		
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-4 no-padding">
<?php
	if(!isset($_GET['action'])){

		include 'view/students/subscriptions/subscriptions_table.php';

	} elseif($_GET['action'] == 'subscription'){

		include 'view/students/subscriptions/add_subscription.php';

	} elseif($_GET['action'] == 'edit'){

		include 'view/students/subscriptions/edit_student.php';

	} elseif($_GET['action'] == 'read'){

		include 'view/students/subscriptions/read_student.php';
	} 
?>
				</div>
				
			</div>
			<!--/.row-->
		</div>

		<!--/.row-->
	<?php
	include 'view/includes/footer.inc.php';
	?>