<!-- <base href="https://apexsoftwaredeals.com/"> -->
<base href="http://localhost/apexsoftwaredeals.com/">
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'incs/header.php';
		if (isset($_COOKIE['productCookied'])) {
			$product_id = $_COOKIE['productCookied'];
			$query = $connect->prepare("SELECT * FROM `products` WHERE id = ? ");
			$query->execute([$product_id]);
			$row = $query->fetch();
			extract($row);
			
			$check = $connect->prepare("SELECT * FROM `website_clicks` WHERE website_id = ? ");
	        $check->execute([$product_id]);
	        $count = $check->rowCount();
	        if ( $count > 0) {
	            // update counter
	            $row = $check->fetch();
	            $clicks = $row['clicks'];
	            $user_id = $row['user_id'];
	            if($user_id == $_SESSION['parent_id']){
	            	//not counting 
	            }else{
	            	$update = $connect->prepare("UPDATE website_clicks SET clicks = clicks + 1 WHERE website_id = ? ");
	            	$update->execute([$product_id]);
	           	}

	        }else{
	            $clicks = 1;
	            $sql = $connect->prepare("INSERT INTO website_clicks (`user_id`, `website_id`, `clicks`) VALUES(?, ?, ?) ");
	            $sql->execute([$user_id, $product_id, $clicks]);

	        }
	?>
	<style>
		img.card-img-top {
			height: 520px;
		}
	</style>
</head>
<body>
	<?php include 'incs/nav.php';?>
	<section>
		<div class="container-fluid mt-5">
			<div class="container mt-5">
				<div class="row">
					<div class="col-md-12 text-center">
						<h4 class="text-secondary mb-4">Product on Discount</h4>
						<h5>Reduced from <span class="text-danger"><del><?php echo $selling_currency?> <?php echo $amount?></del></span> to <span class="text-success"><?php echo $selling_currency?>  <?php echo $selling_price?> / <?php echo $price_period ?></span></h5>
					</div>
					<div class="displayProduct">
						<p><span class="badge rounded-pill bg-primary"><?php echo $category ?></span></p>
						<h4><?php echo $productname ?></h4>
						<div class="col-md-12 mb-3">
							<div class="card" >
							  	
							  	<div class="card-header" role="group" aria-label="<?php echo $productname ?>">
								  	<img src="<?php echo $cover_image ?>" class=" img-fluid" alt="<?php echo $cover_image ?>">
								</div>
							  	<div class="card-body mt-4">
		    						
		    						<p class="card-text"> 
		    							<?php echo $description ?> 
		    						</p>
		    						<p class="card-text text-dark fs-6" ><?php echo url_to_clickable_link($website_url) ?></p>
								  	<ul class="list-group list-group-flash">
			    						<li class="list-group-item" >Category: <span id="category_span" class="float-end"><b> <?php echo $category?></b></span></li>
			    						<li class="list-group-item">Old Price: <span class="float-end text-danger"><b><del><?php echo $monthly_currency?>  <?php echo $amount?></del> / <?php echo $price_period ?></b></span></li>
			    						<li class="list-group-item">New Price: <span class="float-end text-success"><b><?php echo $selling_currency?> <?php echo $selling_price?></b> / <?php echo $price_period ?></span></li>
			    						<li class="list-group-item">Duration: <span id="price_period_span" class="float-end"><b><?php echo $price_period ?></b></span> </li>
			    						<li class="list-group-item">Original pricing link <span id="discount_link_span" class="float-end"><?php echo url_to_clickable_link($discount_link) ?></span></li>
								  	</ul>
								</div>
							</div>
						</div>
						<div class="col-md-12 mb-3">
							<?php
								if(isset($_SESSION['apex_email'])){
									if($user_id != $_SESSION['user_id']){
							?>
							<!-- We hide a form here -->
							<!-- <button class="btn btn-secondary w-100" type="button">BUY NOW</button> -->

							<form method="POST">
								<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_SESSION['user_id']?>" />
								<input type="hidden" name="customer_email" id="customer_email" value="<?php echo $_SESSION['apex_email'] ?>" />
								<input type="hidden" name="customer_name" id="customer_name" value="<?php echo $_SESSION['username'] ?>" />
								<input type="hidden" name="amount" id="amount" value="<?php echo $selling_price?>" />
								<input type="hidden" name="currency" id="currency" value="<?php echo $selling_currency?>"/>
								<input type="hidden" name="product_id" id="product_id" value="<?php echo $product_id?>"> 
								<button type="button" id="start-payment-button" class="btn btn-secondary w-100" onclick="makePayment()">BUY NOW <?php echo $selling_currency?> <?php echo $selling_price?> </button>
							</form>
						<script src="https://checkout.flutterwave.com/v3.js"></script>
				    	<script>

							function makePayment() {
								var totalMmount = '<?php echo $selling_price?>';
								// var totalMmount = '48.99';
								var customer_name = document.getElementById('customer_name').value;
								var email = document.getElementById('customer_email').value;
								var consumer_id = document.getElementById('customer_id').value;
								var currency = document.getElementById('currency').value;
								var product_id = document.getElementById('product_id').value;
								FlutterwaveCheckout({
								  	public_key: "FLWPUBK-0c1afe8a612757cca67c07236e7f5950-X",
								  	tx_ref: "apexsoftwaredeals-"+email+consumer_id,
								  	amount: totalMmount,
								  	currency: currency,
								  	payment_options: "card, mobilemoneyzambia, ussd",
								  	redirect_url: "http://localhost/apexsoftwaredeals.com/payments?amount="+totalMmount+"&customer_email="+email+"&consumer_id="+consumer_id+"&customer_name="+customer_name+'&currency='+currency+'&product_id='+$product_id,
								  	meta: {
								    	consumer_id: consumer_id,
								    	consumer_mac: "92a3-912ba-1192a",
								  	},
								  	customer: {
								    	email: email,
								    // phone_number: "08102909304",
								    	name: customer_name,
								  	},
								  	customizations: {
								    	title: "apexsoftwaredeals.com",
								    	description: "Purchase of Discounted Software",
								    	logo: "https://apexsoftwaredeals.com/images/apexLogo copy.png",
								    
								  	},
								});
							}
				    	</script>
						<?php }
							}else{?>
								<a href="login" class="learn-more">
									<span class="circle" aria-hidden="true">
										<span class="icon arrow"></span>
									</span>
									<span class="button-text">Login to Buy</span>
								</a>
						<?php	
							}
						?>
						</div>

						
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		

		$(function(){
			$("#websiteOfferForm").submit(function(e){
				e.preventDefault();
				var form_data = $(this).serialize();
				$.ajax({
					url:"includes/submitWebsiteOffer",
					method:"post",
					data:form_data,
					beforeSend:function(){
						$("#offerBtn").html('<span class="spinner-border"></span> Processing...');
					},
					success:function(data){
						successNow(data);
						$("#offerBtn").html("Submit Offer");
						$("#websiteOfferForm")[0].reset();
					}
				})
			});

			$("#messageForm").submit(function(e){
				e.preventDefault();
				var form_data = $(this).serialize();
				$.ajax({
					url:"includes/submitMessage",
					method:"post",
					data:form_data,
					beforeSend:function(){
						$("#sendSpan").html('<span class="spinner-border"></span> Sending...');
					},
					success:function(data){
						successNow(data);
						$("#sendSpan").html("Send");
						$("#messageForm")[0].reset();
					}
				})
			})
		})
	</script>
<?php }?>
</body>
</html>
