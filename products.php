<base href="https://apexsoftwaredeals.com/">
<!-- <base href="http://localhost/apexsoftwaredeals.com/"> -->
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
			    						<li class="list-group-item">Discount link <span id="discount_link_span" class="float-end"><?php echo url_to_clickable_link($discount_link) ?></span></li>
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
							<button class="btn btn-secondary w-100" type="button">BUY NOW</button>
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

						<!-- Button trigger modal -->


						<!-- Offer Modal -->
						<!-- <div class="modal fade" id="offerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="exampleModalLabel">Offer Form</h5>
						        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      		</div>
						      		<div class="modal-body">
						      			<form method="post" id="websiteOfferForm">
						      				<div class="form-group mb-3">
						      					<label class="mb-2">Your Offer</label>
						      					<div class="input-group">
						      						<span class="input-group-text">USD</span>
						      						<input type="hidden" name="offer_currency" id="offer_currency" class="form-control" value="USD">
						      						<input type="number" step="any" name="offer_amount" id="offer_amount" class="form-control" min="0">
						      					</div>
						      					<input type="hidden" name="website_id" id="website_id" value="<?php echo $website_id?>">
						      					<input type="hidden" name="website_url" id="website_url" value="<?php echo $website_url?>">
						      					<input type="hidden" name="seller_id" id="seller_id" value="<?php echo $user_id?>">
						      					<input type="hidden" name="seller_email" id="seller_email" value="<?php echo getUserEmail($connect, $user_id)?>">
						      				</div>
						      				<div class="form-group mb-3">
						      					<label class="mb-2">Your Message</label>
						      					<div class="input-group">
						      						<span class="input-group-text"><i class="bi bi-circle"></i></span>
						      						<textarea class="form-control" name="message" id="message"></textarea>
						      						<input type="hidden" name="buyer_id" id="buyer_id" value="<?php echo $_SESSION['user_id']?>">
						      						<input type="hidden" name="buyer_email" id="buyer_email" value="<?php echo $_SESSION['user_email_job_portal']?>">
						      					</div>
						      				</div>
						      				<div class="form-group">
						      					<button class="btn btn-outline-secondary" id="offerBtn" type="submit">Submit Offer</button>
						      				</div>
						      			</form>
						      			<div class="text-white border-top p-3 bg-secondary">
						      				<h4>Seling Price: <?php echo $selling_currency ?> <?php echo  $selling_price ?></h4>
							      			<p>The owner will be mailed your offer.</p>
							      		</div>
						      		</div>
							      	<div class="modal-footer">
							      		
							      	</div>
						    	</div>
						  	</div>
						</div> -->
						<!-- Contact Modal -->
						<!-- <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  	<div class="modal-dialog">
						    	<div class="modal-content">
						      		<div class="modal-header">
						        		<h5 class="modal-title" id="exampleModalLabel">Contact <?php echo getUserName($connect, getUserEmail($connect, $user_id)); ?></h5>
						        		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						      		</div>
						      		<div class="modal-body">
						      			<form method="post" id="messageForm">
						      				<div class="form-group mb-3">
						      					
						      					<input type="hidden" name="website_id" id="website_id" value="<?php echo $website_id?>">
						      					<input type="hidden" name="website_url" id="website_url" value="<?php echo $website_url?>">
						      					<input type="hidden" name="receiver_id" id="receiver_id" value="<?php echo $user_id?>">
						      					<input type="hidden" name="receiver_email" id="receiver_email" value="<?php echo getUserEmail($connect, $user_id)?>">
						      				</div>
						      				<div class="form-group mb-3">
						      					<label class="mb-2"><b>Your Message</b></label>
						      					<div class="input-group">
						      						<span class="input-group-text"><i class="bi bi-circle"></i></span>
						      						<textarea class="form-control" name="message" id="message" rows="5"></textarea>
						      						<input type="hidden" name="sender_id" id="sender_id" value="<?php echo $_SESSION['user_id']?>">
						      						<input type="hidden" name="sender_email" id="sender_email" value="<?php echo $_SESSION['user_email_job_portal']?>">
						      					</div>
						      				</div>
						      				<div class="form-group">
						      					<button type="submit" id="sendBtn" class="sendBtn">
												  	<div class="svg-wrapper-1">
												    	<div class="svg-wrapper">
												      		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
												        		<path fill="none" d="M0 0h24v24H0z"></path>
												        		<path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
												      		</svg>
												    	</div>
												  	</div>
												  	<span id="sendSpan">Send</span>
												</button>
						      				</div>
						      			</form>
						      			<div class="text-white border-top p-3 bg-secondary">
						      				<p>
						      					We encourage you to communicate withing the app so that we can help incase of any miscommunication
						      				</p>
							      		</div>
						      		</div>
							      	<div class="modal-footer">
							      		
							      	</div>
						    	</div>
						  	</div>
						</div> -->
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
