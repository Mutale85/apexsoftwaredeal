<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php 
    		include("incs/header.php");

			if(isset($_GET['productID'])){
				$productID = base64_decode($_GET['productID']);

	    		$query = $connect->prepare("SELECT * FROM products WHERE id = ?");
	    		$query->execute([$productID]);
	    		$row = $query->fetch();
	    		$cover_image = $row['cover_image'];
	    		$src = $cover_image;
	    		$textarea = $row['description'];
			    	
			}
    	?>
    	<link href="summernote/summernote-lite.min.css" rel="stylesheet">
    	<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    	<script src="summernote/summernote-lite.min.js"></script>
		<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<section class="sectionOne">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12 text-center mb-5">
						<h4>Welcome <?php echo $_SESSION['username']?></h4>
					</div>
    				<div class="col-md-6">
    					<div class="border p-3">
	    					<h3 class=" text-center mb-5">List Your Product Free</h3>
	    					<hr style="width: 25%; margin: .5em auto; margin-bottom: 1em; height: 10px; background: gray; border-radius: .5em;">
	    					<form method="post" id="productForm" enctype="multipart/form-data">
								<div class="row">
		    						<div class="form-group mb-3 col-md-4">
		    							<label class="mb-2 label">Product Name <i class="bi bi-asterisk"></i></label>
		    							<input type="text" name="productname" id="productname" class="form-control" required>
		    							<input type="hidden" name="product_id" id="product_id">
		    						</div>	
		    						<div class="form-group col-md-4">
		    							<label class="mb-2 label">Product Category <i class="bi bi-asterisk"></i></label>
		    							<select class="form-control" name="category" id="category" required>
		    								<option value="">Select</option>
		    								<option value="Blog">Blog</option>
		    								<option value="Ecommerce">Ecommerce</option>
		    								<option value="Education">Education</option>
		    								<option value="Email Marketing">Email Marketing</option>
		    								<option value="Hosting">Hosting</option>
		    								<option value="Human Resource">Human Resource</option>
		    								<option value="Invoicing">Invoicing</option>
		    								<option value="Job Portal">Job Portal</option>
		    								<option value="Legal">Legal</option>
		    								<option value="Marketing">Marketing</option>
		    								<option value="Video Tutorial">Video Tutorial</option>
		    								<option value="Payroll">Payroll</option>
		    								<option value="Podcast">Podcast</option>
		    								<option value="Projetct Management">Projetct Management</option>
		    								<option value="PDF Document">PDF Document</option>
		    								<option value="SAAS">SAAS</option>
		    								<option value="Security">Security</option>
		    								<option value="Service">Service</option>
		    								<option value="Template">Template</option>
		    								<option value="Other">Other</option>
		    							</select>
		    						</div>
		    						<div class="form-group mb-3 col-md-4">
		    							<label class="mb-2 label">Website Url <i class="bi bi-asterisk"></i></label>
		    							<input type="url" name="website_url" id="website_url" class="form-control" required>
		    						</div>	
		    						<div class="form-group mb-3 col-md-12">
		    							<label class="mb-2 label">Description <i class="bi bi-asterisk"></i></label>
		    							<textarea class="form-control" name="description" id="description" rows="5"></textarea>
		    						</div>
		    						<div class="col-md-12 mb-5">
										Total word count: <span id="display_count">0</span> words. Words left: <span id="word_left">100</span>
									</div>
		    						
		    						<div class="form-group mb-3 col-md-6">
		    							<label class="mb-2 label"> Current Plan <i class="bi bi-asterisk"></i></label>
		    							<div class="input-group">
		    								<select class="form-control" required name="current_plan_currency" id="current_plan_currency">
		    									<option value="">Select Currency</option>
		    									<option value="USD">USD</option>
		    									<option value="EUR">EUR</option>
		    								</select>
		    								<input type="number" step="any" name="amount" id="amount" class="form-control" min="0">
		    							</div>
		    						</div>
		    						<div class="form-group mb-3 col-md-6">
		    							<label class="mb-2 label">Discounted Price</label>
		    							<div class="input-group">
		    								<select class="form-control" required name="selling_currency" id="selling_currency">
		    									<option value="">Select Currency</option>
		    									<option value="USD">USD</option>
		    									<option value="EUR">EUR</option>
		    								</select>
		    								<input type="number" step="any" name="selling_price" id="selling_price" class="form-control" min="0">
		    							</div>
		    						</div>
		    						<div class="form-group mb-3 col-md-6">
		    							<label class="mb-2 label">Price Validity</label>
		    							<div class="input-group">
		    								<select class="form-control" required name="price_period" id="price_period">
		    									<option value="">Select</option>
		    									<option value="1 Month">1 Month</option>
		    									<option value="3 Months">3 Months</option>
		    									<option value="6 Months">6 Months</option>
		    									<option value="9 Months">9 Months</option>
		    									<option value="12 Months">12 Months</option>
		    									<option value="Life Time">Life Time</option>
		    								</select>
		    							</div>
		    						</div>
		    						<!-- <div class="form-group mb-3 col-md-6 mb-3">
										<label class="mb-2">Cover Image</label> -->
										<input type="hidden" name="cover_image" id="cover_image" class="form-control" value="<?php echo $src?>">
									<!-- </div> -->
		    						<div class="form-group mb-3 col-md-6 mb-3">
										<label class="mb-2">Discount Link</label>
										<input type="url" name="discount_link" id="discount_link" class="form-control" required>
									</div>
								<?php if(isset($_SESSION['apex_email'])):?>
		    						<label>
										<input class="form-check-input mb-4" type="checkbox" name="terms" id="terms" required > I agree to <a href="terms-and-conditions" class="text-decoration-none">Terms and Conditions</a>
									</label>
		    						<div class="col-md-12">
		    							<button class="btn btn-outline-secondary shadow" id="submitBtn">Submit Product</span> </button>
		    						</div>
		    					<?php else:?>
		    						<div class="col-md-12">
		    							<a href="login" title="login" class="btn btn-secondary">Login </a> / <a href="register" title="register" class="btn btn-secondary">Create your account</a>
		    						</div>
		    					<?php endif;?>
		    					</div>
							</form>
	    				</div>
    				</div>
    				
    				<div class="col-md-6">
	    				<div class="forBigScreen border p-3">
							<h3 class=" text-center mb-3">Product Preview</h3>
		    				<hr style="width: 10%; margin: .2em auto; margin-bottom: 1em; height: 7px; background: orangered; border-radius: .5em;">
							<div class="card" style="width: 100%;">
		  						<div class="expandedImg mb-3">
		  							<img src="<?php echo $src?>" id="expandedImg" class="card-img-top" width="640" height="426" alt="<?php echo $src?>">
		  						</div>
		  						<div class="card-body">
		    						<h4 class="card-title border-bottom pb-3 mb-3"><span id="productname_span" class="text-center"> </span> </h4>
		    						<p class="card-text text-dark fs-6" >Category: <span id="category_span" class="float-end"> </span></p>
		    						<p class="card-text text-dark fs-6" >Website: <span id="website_url_span" class="float-end"> </span></p>
		    						<p class="card-text">Description: <span id="description_span" class="float-end"></span></p>
		    						<p>Current Price: <span class="float-end"><span id="current_plan_currency_span"></span> <span id="amount_span"></span></span></p>
		    						<p>Discounted Price: <span class="float-end"><span id="selling_currency_span"></span> <span id="selling_price_span"></span></span></p>
		    						<p>Duration: <span id="price_period_span" class="float-end"></span> </p>
		    						<p>Discount link <span id="discount_link_span" class="float-end"></span></p>
		  						</div>
							</div>
						</div>
	    			</div>
    			</div>
    		</div>
    	</section>
    	
    	<script>
    		$(function(){
  			$("#description").keyup(function(){
  				var message = $(this).val();
		    	var words = 0;

			    if ((this.value.match(/\S+/g)) != null) {
			      	words = this.value.match(/\S+/g).length;

			      	localStorage.setItem("wordCount", words);
					document.getElementById("display_count").innerHTML = localStorage.getItem("wordCount");
					localStorage.setItem("wordsLeft", 100-words);
					document.getElementById("word_left").innerHTML = localStorage.getItem("wordsLeft");
			    }

			    if (words > 100) {
			      	var trimmed = $(this).val().split(/\s+/, 100).join(" ");
			      	$(this).val(trimmed + " ");
			      	// alert("Your max words are used up");
			    }else {
			      	$('#display_count').text(words);
			      	$('#word_left').text(100-words);
			      	document.getElementById("display_count").innerHTML = words;
			      	document.getElementById("word_left").innerHTML = 100-words;
			    }
  			})
  			document.getElementById("display_count").innerHTML = localStorage.getItem("wordCount");
			document.getElementById("word_left").innerHTML = localStorage.getItem("wordsLeft");

  			// ============================= 
  			$("#productname").keyup(function(){
				var productname = $(this).val();
				if( productname !== ""){
					localStorage.setItem("productname", productname);
					document.getElementById("productname_span").innerHTML = localStorage.getItem("productname");
				}else{
					document.getElementById("productname_span").innerHTML = 'Apex Software Deal';
				}
			})
			// document.getElementById("productname").value = localStorage.getItem("productname");
			document.getElementById("productname_span").innerHTML = localStorage.getItem("productname");

			$("#category").change(function(){
				var category = $(this).val();
				if( category !== ""){
					localStorage.setItem("category", this.value);
					document.getElementById("category_span").innerHTML = localStorage.getItem("category");
				}
			});

			document.getElementById("category_span").innerHTML = localStorage.getItem("category");
			if(localStorage.getItem('category')){
		        // $('#category').val(localStorage.getItem('category'));
		    }

		    $("#website_url").keyup(function(){
				var website_url = $(this).val();
				if( website_url !== ""){
					localStorage.setItem("website_url", website_url);
					document.getElementById("website_url_span").innerHTML = localStorage.getItem("website_url");
				}else{
					document.getElementById("website_url_span").innerHTML = '';
				}
			})

			// document.getElementById("website_url").value = localStorage.getItem("website_url");
			document.getElementById("website_url_span").innerHTML = localStorage.getItem("website_url");

			$("#description").keyup(function(){
				var description = $(this).val();
				if( description !== ""){
					localStorage.setItem("description", description);
					document.getElementById("description_span").innerHTML = localStorage.getItem("description");
				}else{
					document.getElementById("description_span").innerHTML = '';
				}
			})
			// document.getElementById("description").value = localStorage.getItem("description");
			document.getElementById("description_span").innerHTML = localStorage.getItem("description");

			$("#price_period").change(function(){
				var price_period = $(this).val();
				if( price_period !== ""){
					localStorage.setItem("price_period", this.value);
					document.getElementById("price_period_span").innerHTML = localStorage.getItem("price_period");
				}
			});

			document.getElementById("price_period_span").innerHTML = localStorage.getItem("price_period");
			if(localStorage.getItem('price_period')){
		        $('#price_period').val(localStorage.getItem('price_period'));
		    }

			$("#current_plan_currency").change(function(){
				var current_plan_currency = $(this).val();
				if( current_plan_currency !== ""){
					localStorage.setItem("current_plan_currency", this.value);
					document.getElementById("current_plan_currency_span").innerHTML = localStorage.getItem("current_plan_currency");
				}
			});

			document.getElementById("current_plan_currency_span").innerHTML = localStorage.getItem("current_plan_currency");
			if(localStorage.getItem('current_plan_currency')){
		        $('#current_plan_currency').val(localStorage.getItem('current_plan_currency'));
		    }

		    $("#amount").keyup(function(){
				var amount = $(this).val();
				if( amount !== ""){
					localStorage.setItem("amount", amount);
					document.getElementById("amount_span").innerHTML = localStorage.getItem("amount");
				}else{
					document.getElementById("amount_span").innerHTML = '';
				}
			})
			// document.getElementById("amount").value = localStorage.getItem("amount");
			document.getElementById("amount_span").innerHTML = localStorage.getItem("amount");

			$("#selling_currency").change(function(){
				var selling_currency = $(this).val();
				if( selling_currency !== ""){
					localStorage.setItem("selling_currency", this.value);
					document.getElementById("selling_currency_span").innerHTML = localStorage.getItem("selling_currency");
				}
			});

			document.getElementById("selling_currency_span").innerHTML = localStorage.getItem("selling_currency");
			if(localStorage.getItem('selling_currency')){
		        $('#selling_currency').val(localStorage.getItem('selling_currency'));
		    }

		    $("#selling_price").keyup(function(){
				var selling_price = $(this).val();
				if( selling_price !== ""){
					localStorage.setItem("selling_price", selling_price);
					document.getElementById("selling_price_span").innerHTML = localStorage.getItem("selling_price");
				}else{
					document.getElementById("selling_price_span").innerHTML = '';
				}
			})
			// document.getElementById("selling_price").value = localStorage.getItem("selling_price");
			document.getElementById("selling_price_span").innerHTML = localStorage.getItem("selling_price");

			$("#discount_link").keyup(function(){
				var discount_link = $(this).val();
				if( discount_link !== ""){
					localStorage.setItem("discount_link", discount_link);
					document.getElementById("discount_link_span").innerHTML = localStorage.getItem("discount_link");
				}else{
					document.getElementById("discount_link_span").innerHTML = '';
				}
			})
			// document.getElementById("discount_link").value = localStorage.getItem("discount_link");
			document.getElementById("discount_link_span").innerHTML = localStorage.getItem("discount_link");
			

			$("#productForm").submit(function(e){
				if(document.getElementById('terms').checked === true){
					e.preventDefault();
					var productForm = document.getElementById('productForm');
					var data = new FormData(productForm);
					var url = 'parsers/submitProduct';
					$.ajax({
						url:url+'?<?php echo time()?>',
						method:"post",
						data:data,
						cache : false,
						processData: false,
						contentType: false,
						beforeSend:function(){
							$("#submitBtn").html("<i class='spinner-grow spinner-grow-sm'></i> Processing...");
						},
						success:function(data){
							successNow(data);								
							$("#submitBtn").html('Submit Product');
						}
					})
				}else{
					errorNow("Please Agree to Terms");
					return false;
				}
			})
  		})
        
		var expandImg = document.getElementById('expandedImg');
		expandImg.style.display = "block";

			function loadFile(event) {
			    var expandImg = document.getElementById('expandedImg');
			    expandImg.style.display = "block";
			    expandImg.src = URL.createObjectURL(event.target.files[0]);
			    expandImg.onload = function() {
			      URL.revokeObjectURL(expandImg.src) // free memory
			    }
			};

			function myFunction(imgs) {
				var imgText = document.getElementById("imgtext");
				expandImg.src = imgs.src;
				imgText.innerHTML = imgs.alt;

				expandImg.parentElement.style.display = "block";
			}


		function editData(){
			var product_id = '<?php echo $productID ?>';
			$.ajax({
				url:"parsers/editData",
				method:"post",
				data:{product_id:product_id},
				dataType:"JSON", 
				success:function(data){
					$("#product_id").val(data.id);
					$("#productname").val(data.productname);
					$("#category").val(data.category);
					$("#website_url").val(data.website_url);
					$("#description").html(data.description);
					$("#monthly_currency").val(data.monthly_currency);
					$("#amount").val(data.amount);
					$("#selling_currency").val(data.selling_currency);
					$("#selling_price").val(data.selling_price);
					$("#discount_link").val(data.discount_link);
					
				}
			})
		}
		editData();
    	</script>
    </body>
</html>