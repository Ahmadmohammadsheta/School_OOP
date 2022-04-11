<?php
	$active = 'teachers';
	include 'view/includes/header.inc.php';
	include 'view/includes/sidebar.inc.php';

?>



		

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active" style="font-size: large;">المدرسين</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">

		</div>
		<!--/.row-->

		<div class="panel ">
			<div class="row">
				<div class="col-xs-12 col-md-6 col-lg-4 no-padding">
<?php

	if(!isset($_GET['action'])){

		include 'view/teachers/teachers_table.php';

	} elseif($_GET['action'] == 'add'){

		include 'view/teachers/add_teacher.php';

	} elseif($_GET['action'] == 'edit'){

		include 'view/teachers/edit_teacher.php';

	} elseif($_GET['action'] == 'read'){

		include 'view/teachers/read_teacher.php';
	} 
?>
				</div>
				
			</div>
			<!--/.row-->
		</div>
	</div>
		<!--/.row-->
	<?php
	include 'view/includes/footer.inc.php';
	?>