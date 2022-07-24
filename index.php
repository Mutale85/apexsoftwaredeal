<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("incs/header.php") ?>
    	<?php include("incs/session.php") ?>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<section class="sectionOne mb-5">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<h1 class="infoTitle">Find the best discounted software for your business growth</h1>
						<p class="fs-4 text-secondary">We showcase you validated discounted software that will save you lots of money</p>
						<!-- <div class="mb-3">No hidden Fees | Take more of your Earnings</div> -->
						<!-- <p class="text-center"><a href="" title="contactus" id="partnerBtn" class="btn btn-outline-secondary shadow">Join the Waiting List</a></p> 
						IX2uHN1G3GjB1cA
						-->
						<a href="register" title="register" class="btn btn-secondary shadow">Create Your Account</a>
					</div>
					<div class="col-md-12">
						<img src="images/charts.gif" class="img-fluid" alt="charts" width="100%">
					</div>
				</div>
			</div>
			<div class="modal" tabindex="-1" role="dialog" id="partnerModal">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-lg">
						<div class="modal-header">
							<h4 class="modal-title">JOIN The Waiting List of Partners</h4>
							<button type="button" class="btn-close text-danger" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<form method="post" id="partnersForm">
								<div class="form-group mb-3">
									<label class="mb-2">Product Name</label>
									<div class="input-group">
										<span class="input-group-text">
											<i class="bi bi-house"></i>
										</span>
										<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name">
									</div>
								</div>
								<div class="form-group mb-3">
									<label class="mb-2">Email</label>
									<div class="input-group">
										<span class="input-group-text">
											@
										</span>
										<input type="email" name="email" id="email" class="form-control" placeholder="Email address">
									</div>
								</div>
								
								<div class="form-group mb-3">
									<label class="mb-2">Password</label>
									<div class="input-group">
										<span class="input-group-text" id="eye">
											<span id="lock"><i class="bi bi-eye"></i></span>
										</span>
										<input type="password" name="password" id="password" class="form-control" placeholder="Password">
									</div>
									<input type="hidden" name="role" id="role" value="institution">
								</div>
								<div class="mb-4" id="response">
									
								</div>
							</form>
						</div>
						<div class="modal-footer d-flex justify-content-between">
							<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary" id="create_account">Create your Account</button>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="container-fluid mb-5 mt-5">
			<div class="container p-3 rounded bg-info bg-gradient text-white">
				<div class="row">
					<div class="col-md-7 p-5">
						<h2 class="infoTitleTwo">Do you have a discounted product?</h2>
						<p class="fs-5">We are interest in helping you acquire more clients for your discounted PDF and Softwares</p>
						<a href="submit-product" title="submit-product" class="btn btn-danger">Submit Your Product</a>
					</div>
					<div class="col-md-5 p-5">
						<img src="images/undraw_business_deal_re_up4u.svg" class="img-fluid" alt="undraw_business_deal_re_up4u">
					</div>
				</div>
			</div>
		</div>

		<!-- <section class="sectionTwos p-5 bg-secondary text-white">
			<div class="container-fluid mt-5 p-5">
				
				<div class="row mb-5">
					<div class="col-md-6 mb-5">
						<img src="images/undraw_connected_world_wuay.svg" class="img-fluid image1" alt="undraw_connected_world_wuay">
					</div>
					<div class="col-md-6 mb-5">
						<h2>We Want you to</h2>
						<p class="fs-5">Sell your life time plans, sell your websites, sell your soft copy of videos or books, sell any software and earn higher returns for your hard work.</p>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col-md-12 mb-5 text-center">
						<h3>Why ApexSoftwareDeals?</h3>
					</div>
					<div class="col-md-4 mb-5 border border-warning p-4">
						<h4><i class="bi bi-flower1"></i> Validate your Idea</h4>
						<p>Did you just launch your SASS? We are here to help you find clients that are willing to pay for it.</p>
					</div>
					<div class="col-md-4 mb-5 border border-warning p-4">
						<h4><i class="bi bi-bullseye"></i> Extend your reach</h4>
						<p>Growth is never staying in one place, with us, your digital product or sass will be showcased to our users for free and that is potential for you to grow.</p>
					</div>
					<div class="col-md-4 mb-5 border border-warning p-4">
						<h4><i class="bi bi-bucket"></i> Higher Return</h4>
						<p>We understand that you pushed in alot of efforts in creating your product, therefore we are committed to giving you a higher return for your efforts.</p>
					</div>
					<div class="col-md-12 mt-5 text-center">
						<a href="" title="contactus" id="partnerBtn" class="btn btn-warning text-dark btn-lg">Start Selling</a>
					</div>
				</div>
			</div>
		</section> -->
  	</body>
  	<script>
		$(document).ready(function(){
			$(document).on("click", "#partnerBtn", function(e){
				e.preventDefault();
				$("#partnerModal").modal("show");
			})
		})
		var create_account = document.getElementById('create_account');
		var partnersForm = document.getElementById('partnersForm');
		var product_name = document.getElementById('product_name');
		var email = document.getElementById('email');
		var password = document.getElementById('password');
		var eye = document.getElementById('eye');
		var lock = document.getElementById('lock');
		eye.addEventListener("click", (even)=>{
			if (password.type == 'password') {
				password.type = 'text';
				lock.innerHTML = '<i class="bi bi-eye-slash"></i>';
			}else{
				password.type = 'password';
				lock.innerHTML = '<i class="bi bi-eye"></i>';
			}
		})
		create_account.addEventListener('click', (event)=>{
			if (product_name.value == "") {
				alert("Product name is required");
				product_name.focus();
				return false;
			}
			if (email.value == "") {
				alert("Email address is required");
				email.focus();
				return false;
			}

			if (password.value == "") {
				alert("Password is required");
				password.focus();
				return false;
			}

			var xhr = new XMLHttpRequest();
			var data = new FormData(partnersForm);
			var url = 'parsers/partners-account';
			xhr.open('POST', url, true);
			xhr.onreadystatechange = function(){
				if (xhr.readyState == 4 && xhr.status == 200) {
					var r = xhr.responseText;
					document.getElementById('response').innerHTML = r;
					alert(r);
					create_account.innerHTML = 'Create Account';
				}else{
					var txt = xhr.responseText;
					alert(txt);
				}
			}
			create_account.innerHTML = '<i class="bi bi-spinner bi-spin"></i>';
			xhr.send(data);
		})
	</script>
</html>