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
					<div class="col-md-12 text-center mb-5">
						<h1 class="infoTitle mb-3">Find the best discounted software for your business growth</h1>
						<p class="fs-4 text-secondary">We showcase you validated discounted softwares and other tools that will save you lots of money</p>
						
					</div>
					<div class="col-md-12 mb-5 text-center">
						<div class="subscribeDiv">
							<form method="post" id="subscribeForm" class="inline-form">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="email" id="email" class="form-control" placeholder="Email" required>
										<button class="btn btn-outline-secondary"> <img src="images/partner.gif" class="img-fluid" alt="partner" width="20" > Send me deals</button>
									</div>
								</div>
							</form>
							<div class="mt-5">
								<h2 class="mb-3">Why Apex Software Deals?</h2>
								<p class="fs-5 text-secondary">Find vetted digital products that will make you save money as you enhance your business or personal growth.</p>
							</div>
						</div>
					</div>
					
					<!-- <div class="col-md-6">
						<div class="descriptions">
							<h3>To Software and Digital Products Sellers</h3>
							<p class="">You won't just be selling life time deals here, you will have the options to to discount your products according up to 12 months. And you keep all you earn and pay nothing for listing while the space is available.</p>
							<h4>You can sell </h4>
							<ul class="list-unstyled">
								<li>Software that you created or have the rights to sell</li>
								<li>E-books,  they should have a link to or you can let us upload for you</li>
								<li>Podcasts that you produced or have the exlusive rights to sell</li>
							</ul>
						</div>
					</div> -->
				</div>
			</div>
			
		</section>
		<div class="container-fluid mb-5 mt-5">
			<div class="container p-3 rounded bg-info bg-gradient text-white">
				<div class="row">
					<div class="col-md-7 p-5">
						<h2 class="infoTitleTwo mb-3">Do you have a discounted product?</h2>
						<p class="fs-5 mb-5">We are interest in helping you acquire more clients for your discounted PDF and Softwares</p>
						<a href="submit-product" title="submit-product" class="btn btn-danger shadow submitProduct">Submit Your Product</a>
					</div>
					<div class="col-md-5 p-5">
						<img src="images/undraw_business_deal_re_up4u.svg" class="img-fluid" alt="undraw_business_deal_re_up4u">
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mb-5 mt-5">
			<div class="container p-3 rounded bg-white border text-info">
				<div class="row">
					<div class="col-md-7 p-5">
						<h2 class="infoTitleTwo mb-3">Skyrocket your Sales</h2>
						<p class="fs-5 mb-5">There are never too many places to sell and sale your digit products. We want to help you earn from your hard work.</p>
						<a href="submit-product" title="submit-product" class="btn btn-danger shadow submitProduct">Submit Your Product</a>
						<div class="mt-3">
							<p class="fs-5">You won't just be selling life time deals here, you will have the options to to discount your products according up to 12 months. And you keep all you earn and pay nothing for listing while the space is available.</p>
							<h4 class="h-3">You can sell </h4>
							<ul class="list-unstyled fs-5">
								<li>Software that you created or have the rights to sell</li>
								<li>E-books,  they should have a link to or you can let us upload for you</li>
								<li>Podcasts that you produced or have the exlusive rights to sell</li>
							</ul>
						</div>
					</div>
					<div class="col-md-5 p-5">
						<img src="images/rocket.png" class="img-fluid" alt="rocket">
					</div>
				</div>
			</div>
		</div>
		<?php include 'incs/footer.php';?>
  	</body>
  	<script>
		
		// create_account.addEventListener('click', (event)=>{
		// 	if (product_name.value == "") {
		// 		alert("Product name is required");
		// 		product_name.focus();
		// 		return false;
		// 	}
		// 	if (email.value == "") {
		// 		alert("Email address is required");
		// 		email.focus();
		// 		return false;
		// 	}

		// 	if (password.value == "") {
		// 		alert("Password is required");
		// 		password.focus();
		// 		return false;
		// 	}

		// 	var xhr = new XMLHttpRequest();
		// 	var data = new FormData(partnersForm);
		// 	var url = 'parsers/partners-account';
		// 	xhr.open('POST', url, true);
		// 	xhr.onreadystatechange = function(){
		// 		if (xhr.readyState == 4 && xhr.status == 200) {
		// 			var r = xhr.responseText;
		// 			document.getElementById('response').innerHTML = r;
		// 			alert(r);
		// 			create_account.innerHTML = 'Create Account';
		// 		}else{
		// 			var txt = xhr.responseText;
		// 			alert(txt);
		// 		}
		// 	}
		// 	create_account.innerHTML = '<i class="bi bi-spinner bi-spin"></i>';
		// 	xhr.send(data);
		// })
	</script>
</html>