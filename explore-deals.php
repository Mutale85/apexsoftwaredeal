<!DOCTYPE html>
<html lang="en">
  	<head>
    	<?php include("incs/header.php") ?>
  	</head>
  	<body>
    	<?php include("incs/nav.php")?>
    	<div class="container">
    		<div class="row">
    			<div class="row">
					<!-- <div class="col-md-2 mt-5 mb-5 categoryList">
						<h4 class="mb-5"> product Category</h4>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Blog"> Blog
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Ecommerce"> Ecommerce
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Education"> Education
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Hosting"> Hosting
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Human Resource"> Human Resource
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Legal"> Legal
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Education"> Education
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Marketing"> Marketing
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Podcast"> Podcast
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Projetct Management"> Projetct Management
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="SAAS"> SAAS
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Security"> Security
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Service"> Service
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Template"> Template
						</label><br>
						<label>
							<input type="checkbox" name="category" id="category" class="form-check-input" value="Other"> Other
						</label><br>
					</div> -->
					<div class="col-md-12 col-sm-12 mt-5 mb-5">
						<h3 class="mb-5 text-center">Discounted Products</h3>
						<div class="row">
							<?php
								$query = $connect->prepare("SELECT * FROM `products` ORDER BY id DESC ");
						        $query->execute();
						        if ($query->rowCount() > 0) {
						            foreach($query->fetchAll() as $row){
						                extract($row);
						                if ($posted == 0) {
						                	
						                	$post_status = '<span class="text-primary"><i class="bi bi-clipboard"></i> inReview </span>';
						                }else{
						                	$post_status = '<span class="text-success"><i class="bi bi-clipboard-check"></i> Posted</span>';
						                }
							?>
								<div class="col-md-3 col-sm-12 mb-3">
									<div class="cards">
									  	<img src="uploads/<?php echo $cover_image ?>" class="card-img-top" alt="<?php echo $cover_image ?>">
									  	<div class="card-body">
									    	<h4 class="card-title"><a href="products/<?php echo preg_replace("#[^a-zA-Z_&()0-9-]#", "-", strtolower($productname)) ?>" class="productID" id="<?php echo $id?>"> <?php echo $productname?></a></h4>
									    	<p class="card-text">
									    		<?php
													echo countWords($description).'...';
									    		?>
									    	</p>
									    	<p class="card-text">Current Price: <span class="float-end text-danger"><b><del><?php echo $monthly_currency?>  <?php echo $amount?></b></del></span></p>
									    	<p class="card-text">Selling Price: <span class="float-end text-success"><b><?php echo $selling_currency ?> <?php echo $selling_price;?></b></p>
									    	<p class="card-text">Views: <span class="float-end"><b><?php echo countWebClick($connect, $user_id, $id)?></b></p>
									    	<a href="products/<?php echo preg_replace("#[^a-zA-Z0-9]#", "-", strtolower($productname));?>" id="<?php echo $id?>" class="learn-more">
	  											<span class="circle" aria-hidden="true">
	  												<span class="icon arrow"></span>
	  											</span>
	  											<span class="button-text">See More</span>
											</a>
									  	</div>
									</div>
								</div>
								
							<?php 
									}
								}
							?>
						</div>	
					</div>
				</div>
    		</div>
    	</div>
  	</body>
  	<script>
  		$(function(){
			$(document).on("click", ".learn-more, .productID", function(e){
				e.preventDefault();
				var siteID = $(this).attr("id");
				setCookie('productCookied', siteID, 30);
				window.location = $(this).attr("href");
			})
		})

		function setCookie(cName, cValue, expDays) {
		    let date = new Date();
		    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
		    const expires = "expires=" + date.toUTCString();
		    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
		}
  	</script>
</html>