<!DOCTYPE html>
<html lang="en">
<head>
<?php 
	include("incs/header.php");
	if(empty($_SESSION['apex_email'])){
		header("location:./");
	}
	$userEmail =  $_SESSION['apex_email'];
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
?>
<style>
	.btn-outline-secondary {
		border-radius: 23px;
	}
	.openLink:hover {
		cursor: pointer;
		background: aliceblue;
	}
</style>

</head>
<body>
	<?php include 'incs/nav.php';?>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center mb-5">
					<h2>Welcome <?php echo $_SESSION['username']?></h2>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink"  data-link="myproducts">
						<div class="card-body">
							<h4>My Products</h4>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink" data-link="mypurchases">
						<div class="card-body">
							<h4>My Purchases</h4>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card text-center openLink" data-link="myanalytics">
						<div class="card-body">
							<h4>Analytics</h4>
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-5 mb-5 text-center">
					<h3 class="mb-5">COMING SOON</h3>
					<img src="images/undraw_progress_data_re_rv4p.svg" class="img-fluid" alt="undraw_progress_data_re_rv4p">
				</div>
			</div>
		</div>
	</div>

	<script>
		
		$(document).on("click", ".openLink", function(){
			var url = $(this).data("link");
			window.location = url;
			// var win = window.open(url);
			// win.focus();
		})
		
		
	</script>
</body>
</html>
