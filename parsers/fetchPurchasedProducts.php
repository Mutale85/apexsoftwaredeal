<?php 
	include '../includes/db.php';
	if(isset($_POST['action'])){
		$customer_email = $_POST['customer_email'];
?>
		<div class="row">
			
			<?php
			function productDetails($connect, $product_id) {
				$query = $connect->prepare("SELECT * FROM products WHERE id = ? ");
				$query->execute(array($product_id));
				$row = $query->fetch();
				extract($row);
				?>
				<div class="card">
					<img src="<?php echo $cover_image ?>" class="card-img-top" alt="<?php echo $cover_image ?>">
					<div class="card-body">
						<h4 class="text-center"><a href="products/<?php echo preg_replace("#[^a-zA-Z_&()0-9-]#", "-", strtolower($productname)) ?>" class="websiteData" id="<?php echo $id?>"> <?php echo $productname?></a></h4>
						<ul class="list-group">
							<li class="list-group-item">Discount Code: <span class="float-end"><?php echo $discount_code ?></span></li>
							<li class="list-group-item">Link <span class="float-end"><?php echo url_to_clickable_link($website_url);?></span></li>
							<!-- <li class="list-group-item">Link <span class="float-end"><?php echo date("d F, Y", strtotime($date_posted));?></span></li> -->
						</ul>
					</div>
				</div>
			<?php
			}
				$query = $connect->prepare("SELECT * FROM product_sells WHERE customer_email = ? ");
		        $query->execute(array($customer_email));
		        if ($query->rowCount() > 0) {
		            foreach($query->fetchAll() as $row){
		                extract($row);
		    ?>
		    		<div class="col-md-4">
		    			<?php echo productDetails($connect, $product_id);?>
		    			<ul class="list-group">
		    				<li class="list-group-item">Amount Paid: <span class="float-end"><?php echo $currency?> <?php echo $totalAmount ?></span></li>
		    			</ul>
		    		</div>
		    <?php 
					}
				}else{
					echo '<h4 class="text-center">You haven\'t bought any thing yet. <a href="explore-deals">See available deals</a></h4> ';
				}
			?>
		</div>
		
<?php
	}
?>